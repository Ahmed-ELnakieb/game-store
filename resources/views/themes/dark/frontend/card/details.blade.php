@extends(template() . 'layouts.app')
@section('title',trans('Card Details'))
@section('content')

    <!-- Banner section start -->
    <div class="banner-section">
        <div class="container">
            <div class="row g-4 g-xxl-5">
                <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="{{ getFile($card->image->image_driver,$card->image->image) }}" alt="{{$card->name}}">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="text-box">
                        <h4 class="title">{{$card->name}}</h4>
                        @if($card->instant_delivery)
                            <div class="region mt-2"><i class="fa-regular fa-timer"></i>@lang('Instant Delivery')</div>
                        @endif
                        @if($card->region)
                            <div class="region mt-2"><i class="fa-regular fa-earth-americas"></i>{{ $card->region }}</div>
                        @endif
                        <div class="note-box mt-30">
                            <div class="icon-box"><i class="fa-solid fa-notes"></i></div>
                            <div class="text-box">
                                <h6 class="mb-1">@lang('Important Note:')</h6>
                                <p>@lang($card->note)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner section end -->


    <!-- Product details section start -->
    <section class="product-details-section">
        <div class="container">
            <div class="row g-4 g-xl-5">
                <div class="col-lg-8">
                    @if(!empty($card->activeServices))
                        <div class="row g-3">
                            @foreach($card->activeServices as $key => $service)
                                <div class="col-12">
                                    <div class="hack-type-section">
                                        <div class="hack-type-header">
                                            <div class="img-box">
                                                <img src="{{$service->imagePath()}}" alt="{{$service->name}}">
                                            </div>
                                            <div class="text-box">
                                                <h6 class="mb-1">{{ $service->name }}</h6>
                                                @if($service->activePricings->count() > 0)
                                                    <small class="text-muted">@lang('Available in') {{ $service->activePricings->count() }} @lang('durations')</small>
                                                @else
                                                    <small class="text-danger">@lang('No pricing available')</small>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        @if($service->activePricings->count() > 0)
                                            <div class="duration-options mt-3">
                                                <div class="row g-2">
                                                    @foreach($service->activePricings as $pricingKey => $pricing)
                                                        @php
                                                            $finalPrice = $pricing->getFinalPrice();
                                                            $hasStock = $pricing->stock_count > 0;
                                                        @endphp
                                                        <div class="col-lg-4 col-md-6">
                                                            <a href="javascript:void(0)" 
                                                               class="duration-box {{$key == 0 && $pricingKey == 0 ? 'active':''}} {{!$hasStock ? 'out-of-stock':''}}"
                                                               data-service-id="{{$service->id}}"
                                                               data-pricing-id="{{$pricing->id}}"
                                                               data-duration-id="{{$pricing->duration_id}}"
                                                               data-symbol="{{basicControl()->currency_symbol}}"
                                                               data-price="{{$finalPrice}}"
                                                               data-original-price="{{$pricing->price}}"
                                                               data-discount="{{$pricing->discount}}"
                                                               data-discount-type="{{$pricing->discount_type}}"
                                                               data-stock="{{$pricing->stock_count}}"
                                                               {{!$hasStock ? 'onclick="return false;"':''}}>
                                                                <div class="duration-info">
                                                                    <div class="duration-name">
                                                                        <strong>{{ $pricing->duration->name }}</strong>
                                                                        <small class="d-block text-muted">{{ $pricing->duration->days }} @lang('days')</small>
                                                                    </div>
                                                                    <div class="duration-price">
                                                                        <div class="price">{{userCurrencyPosition($finalPrice)}}</div>
                                                                        @if($pricing->discount > 0)
                                                                            <div class="original-price">{{userCurrencyPosition($pricing->price)}}</div>
                                                                            <span class="discount-badge">
                                                                                @if($pricing->discount_type == 'percentage')
                                                                                    -{{$pricing->discount}}%
                                                                                @else
                                                                                    -{{userCurrencyPosition($pricing->discount)}}
                                                                                @endif
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @if(!$hasStock)
                                                                    <div class="stock-badge">@lang('Out of Stock')</div>
                                                                @elseif($pricing->stock_count < 10)
                                                                    <div class="stock-badge low-stock">@lang('Only') {{$pricing->stock_count}} @lang('left')</div>
                                                                @endif
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget-area">
                        <div class="cmn-list2">
                            <div class="item">
                                <div class="list-label">@lang('Quantity')</div>
                                <div class="item-count">
                                    <button class="btn-inc-dec" data-decrease="data-decrease"
                                            onclick="quantityBtn(-1)"><i
                                            class="fa-regular fa-minus"></i></button>
                                    <input data-value="data-value" id="quantityNumber" type="number" value="1">
                                    <button class="btn-inc-dec" data-increase="data-increase"
                                            onclick="quantityBtn(1)"><i
                                            class="fa-regular fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget-area">
                        <div class="cmn-list2">
                            <div class="item">
                                <h5 class="mb-0">@lang('Total price')</h5>
                                <h5 class="mb-0" id="showPrice"></h5>
                            </div>
                            <hr class="cmn-hr3 m-0">
                            <div class="item">
                                <div class="list-label">@lang('Discount')</div>
                                <div id="showDiscount"></div>
                            </div>
                        </div>
                        <button type="button" onclick="buyNow()" class="cmn-btn w-100 mt-20"><span
                                class="btn-ring2"></span> @lang('Buy Now')</button>
                        <button type="button" onclick="addToCart()"
                                class="cmn-btn2 w-100  mt-20"><span
                                class="btn-ring"></span> @lang('Add to Cart')</button>
                    </div>
                </div>
            </div>
            @include(template() . 'frontend.card.review')
        </div>
    </section>
@endsection

@push('style')
    <style>
        .nav-link.active {
            color: #fff !important;
        }
    </style>
@endpush

@push('extra_scripts')
    <script>
        'use strict';
        var activeDuration = $('.duration-box.active:not(.out-of-stock)');
        var initialPrice = activeDuration.length > 0 ? parseFloat(activeDuration.data('price')) : 0;
        var price = initialPrice;
        var serviceId = activeDuration.length > 0 ? activeDuration.data('service-id') : null;
        var pricingId = activeDuration.length > 0 ? activeDuration.data('pricing-id') : null;
        var durationId = activeDuration.length > 0 ? activeDuration.data('duration-id') : null;
        var discount = activeDuration.length > 0 ? parseFloat(activeDuration.data('discount')) || 0 : 0;
        var discountType = activeDuration.length > 0 ? activeDuration.data('discount-type') : 'flat';
        var newValue = 1;
        var currencySymbol = '{{ session()->get('currency_symbol', basicControl()->currency_symbol) }}';
        var isLogin = "{{auth()->check()}}";

        showOrderInfo();

        $(document).on("click", ".duration-box:not(.out-of-stock)", function () {
            $('.duration-box').removeClass('active');
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

            $('#showPrice').text(`${currencySymbol}${price}`);
            $('#showDiscount').text(`${currencySymbol}${discountAmount.toFixed(2)}`);
        }

        function addToCart() {
            if (!serviceId || !pricingId) {
                Notiflix.Notify.failure('Please select a duration');
                return 0;
            }
            
            if (isLogin == false) {
                Notiflix.Notify.failure('Please Login before add to cart');
                return 0;
            }
            
            $(".btn-ring").show();
            axios.post("{{route('cart.user.addCart')}}", {
                serviceId: serviceId,
                pricingId: pricingId,
                durationId: durationId,
                quantity: newValue,
                type: 'card',
            })
                .then(function (response) {
                    $(".btn-ring").hide();
                    if (response.data.status) {
                        Notiflix.Notify.success('Added to Cart');
                        cartCount();
                    } else {
                        Notiflix.Notify.failure(response.data.message);
                    }
                })
                .catch(function (error) {
                    $(".btn-ring").hide();
                    Notiflix.Notify.failure('Something went wrong');
                });
        }

        function buyNow() {
            if (!serviceId || !pricingId) {
                Notiflix.Notify.failure('Please select a duration');
                return 0;
            }
            
            if (isLogin == false) {
                Notiflix.Notify.failure('Please Login before purchase');
                return 0;
            }

            $(".btn-ring2").show();
            axios.post("{{route('card.user.singleOrder')}}", {
                serviceId: serviceId,
                pricingId: pricingId,
                durationId: durationId,
                quantity: newValue,
            })
                .then(function (response) {
                    $(".btn-ring2").hide();
                    if (response.data.status) {
                        window.location.href = response.data.route;
                    } else {
                        Notiflix.Notify.failure(response.data.message);
                    }
                })
                .catch(function (error) {
                    $(".btn-ring2").hide();
                    Notiflix.Notify.failure('Something went wrong');
                });
        }

    </script>
@endpush
