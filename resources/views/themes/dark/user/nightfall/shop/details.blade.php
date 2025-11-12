@extends(template().'layouts.user')
@section('title', $card->name)
@section('content')
    <div class="pagetitle">
        <h3 class="mb-1">{{ $card->name }}</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('Home')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.shop') }}">@lang('Shop')</a></li>
                <li class="breadcrumb-item active">{{ $card->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <!-- Product Info Card -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="product-image">
                                <img src="{{ getFile($card->image->image_driver,$card->image->image) }}" 
                                     alt="{{$card->name}}" 
                                     class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h4 class="mb-3">{{$card->name}}</h4>
                            <div class="product-meta">
                                @if($card->instant_delivery)
                                    <span class="badge bg-success me-2">
                                        <i class="fa-regular fa-timer"></i> @lang('Instant Delivery')
                                    </span>
                                @endif
                                @if($card->region)
                                    <span class="badge bg-info">
                                        <i class="fa-regular fa-earth-americas"></i> {{ $card->region }}
                                    </span>
                                @endif
                            </div>
                            @if($card->note)
                                <div class="alert alert-warning mt-3">
                                    <h6 class="mb-2"><i class="fa-solid fa-notes"></i> @lang('Important Note:')</h6>
                                    <p class="mb-0">@lang($card->note)</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services and Pricing -->
        <div class="col-lg-8">
            @if(!empty($card->activeServices))
                @foreach($card->activeServices as $key => $service)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{$service->imagePath()}}" 
                                     alt="{{$service->name}}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                <div>
                                    <h5 class="mb-1">{{ $service->name }}</h5>
                                    @if($service->activePricings->count() > 0)
                                        <small class="text-muted">@lang('Available in') {{ $service->activePricings->count() }} @lang('durations')</small>
                                    @else
                                        <small class="text-danger">@lang('No pricing available')</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($service->description)
                                <div class="service-description mb-3">
                                    <p class="text-muted">{!! nl2br(e($service->description)) !!}</p>
                                </div>
                            @endif

                            @if($service->activePricings->count() > 0)
                                <div class="row g-3">
                                    @foreach($service->activePricings as $pricingKey => $pricing)
                                        @php
                                            $finalPrice = $pricing->getFinalPrice();
                                            $hasStock = $pricing->stock_count > 0;
                                        @endphp
                                        <div class="col-md-6 col-lg-4">
                                            <div class="duration-card {{$key == 0 && $pricingKey == 0 ? 'active':''}} {{!$hasStock ? 'out-of-stock':''}}"
                                                 data-service-id="{{$service->id}}"
                                                 data-pricing-id="{{$pricing->id}}"
                                                 data-duration-id="{{$pricing->duration_id}}"
                                                 data-symbol="{{basicControl()->currency_symbol}}"
                                                 data-price="{{$finalPrice}}"
                                                 data-original-price="{{$pricing->price}}"
                                                 data-discount="{{$pricing->discount}}"
                                                 data-discount-type="{{$pricing->discount_type}}"
                                                 data-stock="{{$pricing->stock_count}}"
                                                 {{!$hasStock ? 'style="cursor: not-allowed; opacity: 0.6;"':'style="cursor: pointer;"'}}>
                                                <div class="duration-header">
                                                    <strong>{{ $pricing->duration->name }}</strong>
                                                    <small class="d-block text-muted">{{ $pricing->duration->days }} @lang('days')</small>
                                                </div>
                                                <div class="duration-pricing">
                                                    <div class="price-main">{{userCurrencyPosition($finalPrice)}}</div>
                                                    @if($pricing->discount > 0)
                                                        <div class="price-original">{{userCurrencyPosition($pricing->price)}}</div>
                                                        <span class="discount-tag">
                                                            @if($pricing->discount_type == 'percentage')
                                                                -{{$pricing->discount}}%
                                                            @else
                                                                -{{userCurrencyPosition($pricing->discount)}}
                                                            @endif
                                                        </span>
                                                    @endif
                                                </div>
                                                @if(!$hasStock)
                                                    <div class="stock-status out">@lang('Out of Stock')</div>
                                                @elseif($pricing->stock_count < 10)
                                                    <div class="stock-status low">@lang('Only') {{$pricing->stock_count}} @lang('left')</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Order Summary Sidebar -->
        <div class="col-lg-4">
            <div class="card sticky-top" style="top: 20px;">
                <div class="card-header">
                    <h5 class="mb-0">@lang('Order Summary')</h5>
                </div>
                <div class="card-body">
                    <div class="order-summary">
                        <div class="quantity-selector mb-3">
                            <label class="form-label">@lang('Quantity')</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" onclick="quantityBtn(-1)">
                                    <i class="fa-regular fa-minus"></i>
                                </button>
                                <input type="number" class="form-control text-center" id="quantityNumber" value="1" min="1" max="10" readonly>
                                <button class="btn btn-outline-secondary" type="button" onclick="quantityBtn(1)">
                                    <i class="fa-regular fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="price-breakdown">
                            <div class="d-flex justify-content-between mb-2">
                                <span>@lang('Price')</span>
                                <strong id="showPrice">-</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>@lang('Discount')</span>
                                <strong class="text-success" id="showDiscount">-</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">@lang('Total')</h5>
                                <h5 class="mb-0 text-primary" id="showTotal">-</h5>
                            </div>
                        </div>

                        <button type="button" onclick="buyNow()" class="btn btn-primary w-100 mb-2">
                            <i class="fa-regular fa-shopping-cart"></i> @lang('Buy Now')
                        </button>
                        <button type="button" onclick="addToCart()" class="btn btn-outline-primary w-100">
                            <i class="fa-regular fa-cart-plus"></i> @lang('Add to Cart')
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .product-image img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .product-meta .badge {
        padding: 8px 12px;
        font-size: 13px;
    }
    
    .service-description {
        padding: 15px;
        background: rgba(255,255,255,0.05);
        border-radius: 8px;
    }
    
    .duration-card {
        padding: 15px;
        border: 2px solid rgba(255,255,255,0.1);
        border-radius: 12px;
        transition: all 0.3s ease;
        background: rgba(255,255,255,0.02);
    }
    
    .duration-card:not(.out-of-stock):hover {
        border-color: var(--primary-color, #6366f1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
    }
    
    .duration-card.active {
        border-color: var(--primary-color, #6366f1);
        background: rgba(99, 102, 241, 0.1);
    }
    
    .duration-card.out-of-stock {
        opacity: 0.5;
        cursor: not-allowed !important;
    }
    
    .duration-header strong {
        font-size: 16px;
        color: var(--text-color, #fff);
    }
    
    .duration-pricing {
        margin-top: 10px;
    }
    
    .price-main {
        font-size: 20px;
        font-weight: 700;
        color: var(--primary-color, #6366f1);
    }
    
    .price-original {
        font-size: 14px;
        text-decoration: line-through;
        color: var(--text-muted, #8b92a7);
    }
    
    .discount-tag {
        display: inline-block;
        padding: 2px 8px;
        background: #ef4444;
        color: #fff;
        border-radius: 4px;
        font-size: 12px;
        margin-left: 5px;
    }
    
    .stock-status {
        margin-top: 8px;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        text-align: center;
    }
    
    .stock-status.out {
        background: #ef4444;
        color: #fff;
    }
    
    .stock-status.low {
        background: #f59e0b;
        color: #fff;
    }
    
    .order-summary {
        padding: 10px 0;
    }
    
    .quantity-selector .input-group {
        max-width: 150px;
    }
    
    .price-breakdown {
        padding: 15px;
        background: rgba(255,255,255,0.05);
        border-radius: 8px;
    }
</style>
@endpush

@push('script')
<script>
    'use strict';
    var activeDuration = $('.duration-card.active:not(.out-of-stock)');
    var initialPrice = activeDuration.length > 0 ? parseFloat(activeDuration.data('price')) : 0;
    var price = initialPrice;
    var serviceId = activeDuration.length > 0 ? activeDuration.data('service-id') : null;
    var pricingId = activeDuration.length > 0 ? activeDuration.data('pricing-id') : null;
    var durationId = activeDuration.length > 0 ? activeDuration.data('duration-id') : null;
    var discount = activeDuration.length > 0 ? parseFloat(activeDuration.data('discount')) || 0 : 0;
    var discountType = activeDuration.length > 0 ? activeDuration.data('discount-type') : 'flat';
    var newValue = 1;
    var currencySymbol = '{{ session()->get('currency_symbol', basicControl()->currency_symbol) }}';

    showOrderInfo();

    $(document).on("click", ".duration-card:not(.out-of-stock)", function () {
        $('.duration-card').removeClass('active');
        $(this).addClass('active');
        
        initialPrice = parseFloat($(this).data('price'));
        price = initialPrice;
        serviceId = $(this).data('service-id');
        pricingId = $(this).data('pricing-id');
        durationId = $(this).data('duration-id');
        discount = parseFloat($(this).data('discount')) || 0;
        discountType = $(this).data('discount-type');
        
        quantityBtn(0);
    });

    function quantityBtn(change) {
        const quantityElement = $('#quantityNumber');
        let currentValue = parseInt(quantityElement.val(), 10);
        newValue = currentValue + change;

        if (newValue < 1) {
            newValue = 1;
        } else if (newValue > 10) {
            newValue = 10;
        }

        quantityElement.val(newValue);
        price = (initialPrice * newValue).toFixed(2);
        showOrderInfo();
    }

    function showOrderInfo() {
        let discountAmount = 0;
        if (discount > 0) {
            if (discountType === 'percentage') {
                discountAmount = ((initialPrice * discount) / 100) * newValue;
            } else {
                discountAmount = discount * newValue;
            }
        }

        let total = price - discountAmount;
        
        $('#showPrice').text(`${currencySymbol}${price}`);
        $('#showDiscount').text(`-${currencySymbol}${discountAmount.toFixed(2)}`);
        $('#showTotal').text(`${currencySymbol}${total.toFixed(2)}`);
    }

    function addToCart() {
        if (!serviceId || !pricingId) {
            Notiflix.Notify.failure('Please select a duration');
            return 0;
        }
        
        Notiflix.Loading.circle();
        axios.post("{{route('cart.user.addCart')}}", {
            serviceId: serviceId,
            pricingId: pricingId,
            durationId: durationId,
            quantity: newValue,
            type: 'card',
        })
            .then(function (response) {
                Notiflix.Loading.remove();
                if (response.data.status) {
                    Notiflix.Notify.success('Added to Cart');
                    if (typeof cartCount === 'function') {
                        cartCount();
                    }
                } else {
                    Notiflix.Notify.failure(response.data.message);
                }
            })
            .catch(function (error) {
                Notiflix.Loading.remove();
                Notiflix.Notify.failure('Something went wrong');
            });
    }

    function buyNow() {
        if (!serviceId || !pricingId) {
            Notiflix.Notify.failure('Please select a duration');
            return 0;
        }

        Notiflix.Loading.circle();
        axios.post("{{route('card.user.singleOrder')}}", {
            serviceId: serviceId,
            pricingId: pricingId,
            durationId: durationId,
            quantity: newValue,
        })
            .then(function (response) {
                Notiflix.Loading.remove();
                if (response.data.status) {
                    window.location.href = response.data.route;
                } else {
                    Notiflix.Notify.failure(response.data.message);
                }
            })
            .catch(function (error) {
                Notiflix.Loading.remove();
                Notiflix.Notify.failure('Something went wrong');
            });
    }
</script>
@endpush
