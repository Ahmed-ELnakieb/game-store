<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Models\CardService;
use App\Models\ServiceDuration;
use App\Models\ServicePricing;
use Illuminate\Http\Request;

class ServicePricingController extends Controller
{
    public function index(Request $request)
    {
        $cardService = CardService::with('card')->findOrFail($request->service_id);
        $durations = ServiceDuration::active()->sort()->get();
        $pricings = ServicePricing::where('card_service_id', $request->service_id)
            ->with('duration')
            ->get();

        return view('admin.card.service.pricing', compact('cardService', 'durations', 'pricings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'card_service_id' => 'required|exists:card_services,id',
            'duration_id' => 'required|exists:service_durations,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'required|in:flat,percentage',
            'stock_count' => 'nullable|integer|min:0',
            'status' => 'required|boolean',
        ]);

        // Check if pricing already exists
        $exists = ServicePricing::where('card_service_id', $request->card_service_id)
            ->where('duration_id', $request->duration_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Pricing for this duration already exists');
        }

        ServicePricing::create($request->all());

        return back()->with('success', 'Pricing created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'required|in:flat,percentage',
            'stock_count' => 'nullable|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $pricing = ServicePricing::findOrFail($id);
        $pricing->update($request->all());

        return back()->with('success', 'Pricing updated successfully');
    }

    public function destroy($id)
    {
        $pricing = ServicePricing::findOrFail($id);
        
        // Check if there are codes for this pricing
        if ($pricing->codes()->count() > 0) {
            return back()->with('error', 'Cannot delete pricing that has activation keys');
        }

        $pricing->delete();
        return back()->with('success', 'Pricing deleted successfully');
    }

    public function statusChange($id)
    {
        $pricing = ServicePricing::findOrFail($id);
        $pricing->status = !$pricing->status;
        $pricing->save();

        return back()->with('success', 'Pricing status updated successfully');
    }
}
