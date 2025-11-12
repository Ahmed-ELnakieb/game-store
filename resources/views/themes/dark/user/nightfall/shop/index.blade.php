@extends(template().'layouts.user')
@section('title',trans('Shop Hacks'))
@section('content')
    <div class="pagetitle">
        <h3 class="mb-1">@lang('Shop Hacks')</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('Home')</a></li>
                <li class="breadcrumb-item active">@lang('Shop')</li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">@lang('Categories')</h5>
                </div>
                <div class="card-body">
                    <div class="categories-list">
                        <a href="{{ route('user.shop') }}" class="category-link {{ !request()->category ? 'active' : '' }}">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fa-regular fa-grid"></i>
                                @lang('All Categories')
                            </div>
                        </a>
                        @foreach($categories as $cat)
                            <a href="{{ route('user.shop', ['category' => $cat->id]) }}" 
                               class="category-link {{ request()->category == $cat->id ? 'active' : '' }}">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="{{ $cat->icon }}"></i>
                                    {{ $cat->name }}
                                </div>
                                <span class="badge bg-primary">{{ $cat->active_children }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <h5 class="mb-0">{{ str_pad($cards->count(), 2, '0', STR_PAD_LEFT) }} @lang('Hacks Available')</h5>
                        <form method="get" action="{{ route('user.shop') }}" class="d-flex align-items-center gap-2">
                            @if(request()->category)
                                <input type="hidden" name="category" value="{{ request()->category }}">
                            @endif
                            <span>@lang('Sort By')</span>
                            <select class="form-select form-select-sm" name="filter" onchange="this.form.submit()" style="width: auto;">
                                <option value="all">@lang('All Type')</option>
                                <option value="1" {{ (request()->filter == '1') ? 'selected' : '' }}>@lang('Popular')</option>
                                <option value="2" {{ (request()->filter == '2') ? 'selected' : '' }}>@lang('Latest')</option>
                                <option value="3" {{ (request()->filter == '3') ? 'selected' : '' }}>@lang('Trending')</option>
                                <option value="4" {{ (request()->filter == '4') ? 'selected' : '' }}>@lang('Date')</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse($cards as $item)
                            <div class="col-md-6 col-xl-4">
                                <a href="{{ route('user.shop.details', $item->slug) }}" class="hack-card">
                                    <div class="hack-card-img">
                                        <img src="{{ $item->preview_image }}" alt="{{ $item->name ?? ' ' }}" />
                                    </div>
                                    <div class="hack-card-body">
                                        <div class="hack-card-title">{{ $item->name ?? ' ' }}</div>
                                        <p class="hack-card-region">{{ $item->region }}</p>
                                        <div class="hack-card-rating">
                                            {!! displayStarRating(@$item->avg_rating) !!}
                                            <span class="ms-2">{{ $item->total_review }} @lang('reviews')</span>
                                        </div>
                                        <div class="hack-card-footer">
                                            <div class="hack-card-price">
                                                @lang('From') <strong>{{ userCurrencyPosition($item->serviceWithLowestPrice()->price) }}</strong>
                                            </div>
                                            <div class="hack-card-sales">
                                                <i class="fa-regular fa-shopping-cart"></i> {{ formatNumber($item->sell_count) }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                @include('empty')
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="mt-3">
                {{ $cards->appends(request()->query())->links(template().'partials.pagination') }}
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .categories-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .category-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        border-radius: 8px;
        background: var(--card-bg, #1a1d29);
        color: var(--text-color, #fff);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .category-link:hover,
    .category-link.active {
        background: var(--primary-color, #6366f1);
        color: #fff;
        transform: translateX(5px);
    }
    
    .hack-card {
        display: block;
        background: var(--card-bg, #1a1d29);
        border-radius: 12px;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .hack-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .hack-card-img {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }
    
    .hack-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .hack-card:hover .hack-card-img img {
        transform: scale(1.1);
    }
    
    .hack-card-body {
        padding: 15px;
    }
    
    .hack-card-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--text-color, #fff);
    }
    
    .hack-card-region {
        font-size: 13px;
        color: var(--text-muted, #8b92a7);
        margin-bottom: 10px;
    }
    
    .hack-card-rating {
        display: flex;
        align-items: center;
        font-size: 13px;
        margin-bottom: 12px;
        color: var(--text-muted, #8b92a7);
    }
    
    .hack-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 12px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    
    .hack-card-price {
        font-size: 14px;
        color: var(--text-muted, #8b92a7);
    }
    
    .hack-card-price strong {
        color: var(--primary-color, #6366f1);
        font-size: 16px;
    }
    
    .hack-card-sales {
        font-size: 13px;
        color: var(--text-muted, #8b92a7);
    }
</style>
@endpush
