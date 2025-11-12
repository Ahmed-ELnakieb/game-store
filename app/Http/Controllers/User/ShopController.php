<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->theme = template();
    }

    public function index(Request $request)
    {
        $data['categories'] = Category::whereIn('type', ['card', 'game'])->active()->sort()
            ->get(['id', 'name', 'icon', 'type', 'active_children', 'status', 'sort_by']);

        $data['cards'] = Card::select(['id', 'category_id', 'region', 'status',
            'name', 'slug', 'image', 'total_review', 'avg_rating', 'sell_count'])
            ->where('status', 1)
            ->when(isset($request->category) && !empty($request->category), function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when(isset($request->filter) && !empty($request->filter), function ($query) use ($request) {
                if ($request->filter == 'all') {
                    $query->orderBy('sort_by', 'desc');
                } elseif ($request->filter == '1') {
                    $query->orderBy('sell_count', 'desc');
                } elseif ($request->filter == '2') {
                    $query->latest();
                } elseif ($request->filter == '3') {
                    $query->where('trending', 1);
                } elseif ($request->filter == '4') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->whereHas('activeServices')
            ->paginate(12);

        return view($this->theme . 'user.nightfall.shop.index', $data);
    }

    public function details($slug = null)
    {
        $data['card'] = Card::with([
            'activeServices',
            'activeServices.activeCodes',
            'activeServices.activePricings',
            'activeServices.activePricings.duration'
        ])->where(['status' => 1, 'slug' => $slug])->firstOrFail();

        return view($this->theme . 'user.nightfall.shop.details', $data);
    }
}
