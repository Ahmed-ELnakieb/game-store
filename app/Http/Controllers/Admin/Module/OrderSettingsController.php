<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Models\BasicControl;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderSettingsController extends Controller
{
    public function index()
    {
        $data['basicControl'] = basicControl();
        $data['totalOrders'] = Order::where('order_for', 'card')->count();
        $data['pendingOrders'] = Order::where('order_for', 'card')->where('status', 0)->count();
        $data['completedOrders'] = Order::where('order_for', 'card')->where('status', 1)->count();
        
        return view('admin.card.order.settings', $data);
    }

    public function updateSettings(Request $request)
    {
        try {
            $basicControl = BasicControl::first();
            $basicControl->auto_complete_orders = $request->has('auto_complete_orders') ? 1 : 0;
            $basicControl->use_queue_for_orders = $request->has('use_queue_for_orders') ? 1 : 0;
            $basicControl->save();

            return back()->with('success', 'Order settings updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteAllOrders(Request $request)
    {
        $request->validate([
            'order_type' => 'required|in:all,pending,completed,refund'
        ]);

        try {
            \DB::beginTransaction();

            $query = Order::where('order_for', 'card');

            if ($request->order_type == 'pending') {
                $query->where('status', 0);
            } elseif ($request->order_type == 'completed') {
                $query->where('status', 1);
            } elseif ($request->order_type == 'refund') {
                $query->where('status', 2);
            }

            $orders = $query->with('orderDetails')->get();
            $count = $orders->count();

            foreach ($orders as $order) {
                // Release codes if order is completed
                if ($order->status == 1) {
                    foreach ($order->orderDetails as $detail) {
                        if ($detail->card_codes) {
                            $codes = json_decode($detail->card_codes, true);
                            if ($codes) {
                                \App\Models\Code::whereIn('passcode', $codes)->update([
                                    'status' => 1,
                                    'user_id' => null,
                                    'activated_at' => null,
                                    'expires_at' => null
                                ]);
                            }
                        }
                    }
                }

                $order->orderDetails()->delete();
                $order->delete();
            }

            \DB::commit();

            return back()->with('success', "{$count} orders deleted successfully");
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
