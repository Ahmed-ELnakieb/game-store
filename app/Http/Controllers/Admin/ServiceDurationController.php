<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceDuration;
use Illuminate\Http\Request;

class ServiceDurationController extends Controller
{
    public function index()
    {
        $durations = ServiceDuration::orderBy('sort_order', 'ASC')->get();
        return view('admin.service_duration.index', compact('durations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'days' => 'required|integer|min:1',
            'code' => 'required|string|max:10|unique:service_durations,code',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        ServiceDuration::create([
            'name' => $request->name,
            'days' => $request->days,
            'code' => $request->code,
            'sort_order' => $request->sort_order ?? 99,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Duration created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'days' => 'required|integer|min:1',
            'code' => 'required|string|max:10|unique:service_durations,code,' . $id,
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $duration = ServiceDuration::findOrFail($id);
        $duration->update([
            'name' => $request->name,
            'days' => $request->days,
            'code' => $request->code,
            'sort_order' => $request->sort_order ?? $duration->sort_order,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Duration updated successfully');
    }

    public function destroy($id)
    {
        $duration = ServiceDuration::findOrFail($id);
        
        // Check if duration is being used
        if ($duration->pricings()->count() > 0) {
            return back()->with('error', 'Cannot delete duration that is being used in pricing');
        }

        $duration->delete();
        return back()->with('success', 'Duration deleted successfully');
    }

    public function statusChange($id)
    {
        $duration = ServiceDuration::findOrFail($id);
        $duration->status = !$duration->status;
        $duration->save();

        return back()->with('success', 'Duration status updated successfully');
    }
}
