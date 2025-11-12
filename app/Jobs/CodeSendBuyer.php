<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CodeSendBuyer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $order = $this->order;
        $basicControl = basicControl();
        
        // Check if auto-complete is enabled
        if (!$basicControl->auto_complete_orders) {
            // If disabled, just mark order as pending (status = 0)
            $order->status = 0;
            $order->save();
            return;
        }
        
        // Auto-complete is enabled, assign codes automatically
        $orderStatus = 1;
        foreach ($order->orderDetails as $detail) {
            $service = $detail->detailable;
            if (!$service) {
                continue;
            }

            // Get available codes for this service and duration
            $codeLists = \App\Models\Code::where('codeable_type', \App\Models\CardService::class)
                ->where('codeable_id', $service->id)
                ->where('duration_id', $detail->duration_id)
                ->where('status', 1)
                ->take($detail->qty)
                ->get();
                
            $sendCodeList = $codeLists->pluck('passcode');
            $stock_short = max(0, $detail->qty - count($sendCodeList));

            $detail->card_codes = json_encode($sendCodeList->toArray());
            $detail->stock_short = $stock_short;
            $detail->status = ($stock_short == 0) ? 1 : 3;
            $detail->save();

            if ($stock_short) {
                $orderStatus = 3;
            }

            // Mark codes as sold and assign to user with expiration
            $codeLists->each(function ($code) use ($order) {
                $code->status = 0; // Mark as sold
                $code->user_id = $order->user_id;
                $code->activated_at = now();
                
                // Set expiration based on duration
                if ($code->duration) {
                    $code->expires_at = now()->addDays($code->duration->days);
                }
                
                $code->save();
            });

            $this->addedSellList($service->card()->select(['id', 'sell_count'])->first());
        }

        $order->status = $orderStatus;
        $order->save();
        
        // Send notification to user
        if ($orderStatus == 1) {
            $this->sendOrderCompleteNotification($order);
        }
    }
    
    protected function sendOrderCompleteNotification($order): void
    {
        try {
            $params = [
                'order_id' => $order->utr,
            ];

            $action = [
                "link" => route('user.cardOrder') . '?type=complete',
                "icon" => "fa fa-money-bill-alt text-white"
            ];

            // Send notifications (you can use your existing notification methods)
            // $this->sendMailSms($order->user, 'CARD_ORDER_COMPLETE', $params);
            // $this->userPushNotification($order->user, 'CARD_ORDER_COMPLETE', $params, $action);
        } catch (\Exception $e) {
            // Silent fail
        }
    }

    public function addedSellList($card): void
    {
        if ($card) {
            $card->sell_count += 1;
            $card->save();
        }
    }
}
