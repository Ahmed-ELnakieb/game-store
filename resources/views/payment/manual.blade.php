@extends($extends)
@section('title')
    {{ 'Pay with '.optional($deposit->gateway)->name ?? '' }}
@endsection
@section('content')
    @php
        $containerClass = (str_ends_with($extends, 'user') && auth()->user()->active_dashboard == 'daybreak')
            ? 'container'
            : (str_ends_with($extends, 'user') ? '' : 'main-content');
    @endphp
    <div class="{{ $containerClass }}">
        @if(str_ends_with($extends, 'user') && auth()->user()->active_dashboard == 'daybreak')
            <div class="pagetitle mt-20">
                <h4 class="mb-1">{{ optional($deposit->gateway)->name }}</h4>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">{{ optional($deposit->gateway)->name }}</li>
                    </ol>
                </nav>
            </div>
        @elseif(str_ends_with($extends, 'user') && auth()->user()->active_dashboard == 'nightfall')
            <div class="pagetitle">
                <h3 class="mb-1">{{ optional($deposit->gateway)->name }}</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">{{ optional($deposit->gateway)->name }}</li>
                    </ol>
                </nav>
            </div>
        @endif
        @php
            $extraParams = json_decode($deposit->gateway->extra_parameters ?? '{}', true);
            $instructionImages = $extraParams['instruction_images'] ?? [];
        @endphp

        <div class="checkout-container">
            <!-- Back Navigation -->
            <div class="payment-navigation mb-4">
                <a href="{{ route('user.add.fund') }}" class="back-link">
                    <i class="fa fa-arrow-left me-2"></i>@lang('Back to Payment Methods')
                </a>
                <div class="payment-steps">
                    <span class="step completed">@lang('Select Method')</span>
                    <i class="fa fa-chevron-right mx-2"></i>
                    <span class="step active">@lang('Payment')</span>
                    <i class="fa fa-chevron-right mx-2"></i>
                    <span class="step">@lang('Confirmation')</span>
                </div>
            </div>

            <div class="row g-4">
                <!-- Left Column: Payment Details Form -->
                <div class="col-lg-7">
                    <div class="checkout-section">
                        <h2 class="checkout-title">@lang('Payment Details')</h2>
                        
                        <!-- Payment Instructions -->
                        <div class="payment-info-box mb-4">
                            <h6 class="info-title text-uppercase">@lang('Payment Instructions')</h6>
                            <div class="payment-description">
                                <?php echo optional($deposit->gateway)->note; ?>
                            </div>
                        </div>

                        <!-- Payment Form -->
                        <form action="{{route('addFund.fromSubmit',$deposit->trx_id)}}" method="post"
                              enctype="multipart/form-data" class="payment-form-clean">
                            @csrf

                            @if(optional($deposit->gateway)->parameters)
                                @foreach($deposit->gateway->parameters as $k => $v)
                                    @if($v->type == "text" || $v->type == "number" || $v->type == "date")
                                        <div class="form-group-clean mb-4">
                                            <label class="form-label-clean text-uppercase">
                                                {{trans($v->field_label)}}
                                            </label>
                                            <input type="{{$v->type}}" 
                                                   name="{{$k}}" 
                                                   class="form-input-clean" 
                                                   placeholder="{{trans($v->field_label)}}"
                                                   {{$v->validation == "required" ? 'required':''}}>
                                            @if ($errors->has($k))
                                                <span class="error-text">{{ trans($errors->first($k)) }}</span>
                                            @endif
                                        </div>
                                    @elseif($v->type == "textarea")
                                        <div class="form-group-clean mb-4">
                                            <label class="form-label-clean text-uppercase">
                                                {{trans($v->field_label)}}
                                            </label>
                                            <textarea class="form-input-clean" 
                                                      name="{{$k}}" 
                                                      rows="4"
                                                      placeholder="{{trans($v->field_label)}}"
                                                      {{$v->validation == "required" ? 'required':''}}></textarea>
                                            @if ($errors->has($k))
                                                <span class="error-text">{{ trans($errors->first($k)) }}</span>
                                            @endif
                                        </div>
                                    @elseif($v->type == "file")
                                        <div class="form-group-clean mb-4">
                                            <label class="form-label-clean text-uppercase">
                                                {{trans($v->field_label)}}
                                            </label>
                                            <div class="file-upload-clean">
                                                <div class="file-preview-box">
                                                    <img id="preview-{{$k}}" 
                                                         src="{{getFile('dummy','dummy')}}" 
                                                         alt="Preview">
                                                </div>
                                                <div class="file-upload-info">
                                                    <label for="file-{{$k}}" class="file-upload-btn">
                                                        @lang('Choose File')
                                                    </label>
                                                    <input type="file" 
                                                           name="{{$k}}" 
                                                           id="file-{{$k}}" 
                                                           class="d-none"
                                                           accept="image/jpeg,image/jpg,image/png"
                                                           onchange="previewImageTwo(event, 'preview-{{$k}}')"
                                                           {{$v->validation == "required" ? 'required':''}}>
                                                    <small class="file-hint">@lang('JPG, JPEG, PNG. Max 1MB')</small>
                                                </div>
                                            </div>
                                            @error($k)
                                            <span class="error-text">@lang($message)</span>
                                            @enderror
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <button type="submit" class="submit-btn-clean">
                                @lang('SUBMIT PAYMENT') {{getAmount($deposit->payable_amount)}} {{$deposit->payment_method_currency}}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="col-lg-5">
                    <div class="order-summary-section">
                        <h6 class="summary-header text-uppercase">@lang('Your Order')</h6>
                        
                        <!-- Payment Amount Card -->
                        <div class="order-item-card">
                            <div class="order-item-icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <div class="order-item-details">
                                <h6 class="order-item-title">{{ optional($deposit->gateway)->name }}</h6>
                                <p class="order-item-subtitle">@lang('Manual Payment Gateway')</p>
                            </div>
                            <div class="order-item-amount">
                                {{getAmount($deposit->payable_amount)}} {{$deposit->payment_method_currency}}
                            </div>
                        </div>

                        <!-- Summary Totals -->
                        <div class="summary-totals">
                            <div class="summary-row">
                                <span class="summary-label">@lang('Requested Amount')</span>
                                <span class="summary-value">{{currencyPosition($deposit->amount_in_base)}}</span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label">@lang('Processing Fee')</span>
                                <span class="summary-value">{{currencyPosition($deposit->payable_amount - $deposit->amount_in_base)}}</span>
                            </div>
                            <div class="summary-row total-row">
                                <span class="summary-label">@lang('Total')</span>
                                <span class="summary-value">{{getAmount($deposit->payable_amount)}} {{$deposit->payment_method_currency}}</span>
                            </div>
                        </div>

                        <!-- Instruction Images -->
                        @if(!empty($instructionImages))
                            <div class="instruction-guide mt-4">
                                <h6 class="guide-title text-uppercase">@lang('Visual Guide')</h6>
                                <div class="instruction-images-grid">
                                    @foreach($instructionImages as $index => $image)
                                        <div class="instruction-img-item" data-bs-toggle="modal" data-bs-target="#imageModal{{ $index }}">
                                            <img src="{{ getFile($deposit->gateway->driver, $image, true) }}" 
                                                 alt="Step {{ $index + 1 }}">
                                            <span class="step-number">{{ $index + 1 }}</span>
                                        </div>

                                        <!-- Image Modal -->
                                        <div class="modal fade" id="imageModal{{ $index }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">@lang('Step') {{ $index + 1 }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ getFile($deposit->gateway->driver, $image, true) }}" 
                                                             alt="Step {{ $index + 1 }}" 
                                                             class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        function previewImageTwo(event, imgId) {
            const fileInput = event.target;
            const previewImg = document.getElementById(imgId);

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endpush

@push('style')
    <style>
        /* Checkout Container */
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Payment Navigation */
        .payment-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            background: var(--bg-color2);
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            padding: 0.625rem 1.25rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-color);
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background: rgba(255,255,255,0.1);
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateX(-3px);
        }

        .back-link i {
            transition: transform 0.3s ease;
        }

        .back-link:hover i {
            transform: translateX(-3px);
        }

        .payment-steps {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .payment-steps .step {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-color);
            opacity: 0.4;
            transition: all 0.3s ease;
        }

        .payment-steps .step.completed {
            opacity: 0.7;
            color: var(--primary-color);
        }

        .payment-steps .step.active {
            opacity: 1;
            color: var(--primary-color);
            position: relative;
        }

        .payment-steps .step.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .payment-steps i {
            font-size: 0.7rem;
            color: var(--text-color);
            opacity: 0.3;
        }

        /* Checkout Section (Left Column) */
        .checkout-section {
            background: var(--bg-color2);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .checkout-title {
            font-size: 2rem;
            font-weight: 300;
            color: var(--text-color);
            margin-bottom: 2rem;
            letter-spacing: -0.5px;
        }

        /* Payment Info Box */
        .payment-info-box {
            background: rgba(255,255,255,0.05);
            padding: 1.5rem;
            border-radius: 8px;
            border-left: 3px solid var(--primary-color);
        }

        .info-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .payment-description {
            color: var(--text-color);
            font-size: 0.9rem;
            line-height: 1.7;
            opacity: 0.9;
        }

        .payment-description p {
            margin-bottom: 0.75rem;
        }

        .payment-description ul,
        .payment-description ol {
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }

        /* Clean Form Styling */
        .payment-form-clean {
            margin-top: 2rem;
        }

        .form-group-clean {
            margin-bottom: 1.5rem;
        }

        .form-label-clean {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .form-input-clean {
            width: 100%;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            color: var(--text-color);
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-input-clean:focus {
            outline: none;
            border-color: var(--primary-color);
            background: rgba(255,255,255,0.08);
            box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.15);
        }

        .form-input-clean::placeholder {
            color: rgba(255,255,255,0.4);
        }

        textarea.form-input-clean {
            resize: vertical;
            min-height: 100px;
        }

        .error-text {
            display: block;
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        /* File Upload Clean */
        .file-upload-clean {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            padding: 1.5rem;
            background: rgba(255,255,255,0.05);
            border: 2px dashed rgba(255,255,255,0.2);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .file-upload-clean:hover {
            border-color: var(--primary-color);
            background: rgba(var(--primary-rgb), 0.1);
        }

        .file-preview-box {
            flex-shrink: 0;
        }

        .file-preview-box img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .file-upload-info {
            flex-grow: 1;
        }

        .file-upload-btn {
            display: inline-block;
            padding: 0.625rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-color);
            background: rgba(255,255,255,0.05);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .file-upload-btn:hover {
            background: var(--primary-color);
            color: #fff;
        }

        .file-hint {
            display: block;
            color: rgba(255,255,255,0.5);
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        /* Submit Button */
        .submit-btn-clean {
            width: 100%;
            padding: 1.125rem 2rem;
            font-size: 0.875rem;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-color) 100%);
            border: 3px solid #d4af37;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4), 0 0 30px rgba(212, 175, 55, 0.2);
        }

        .submit-btn-clean::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn-clean:hover {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-color) 100%);
            border-color: #ffd700;
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(212, 175, 55, 0.6), 0 0 40px rgba(255, 215, 0, 0.4);
        }

        .submit-btn-clean:hover::before {
            left: 100%;
        }

        .submit-btn-clean:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.5);
        }

        /* Order Summary Section (Right Column) */
        .order-summary-section {
            background: var(--bg-color2);
            padding: 2rem;
            border-radius: 12px;
            position: sticky;
            top: 20px;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .summary-header {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        /* Order Item Card */
        .order-item-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        .order-item-card:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.2);
        }

        .order-item-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            border-radius: 8px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.3);
        }

        .order-item-icon i {
            font-size: 1.5rem;
            color: #fff;
        }

        .order-item-details {
            flex-grow: 1;
        }

        .order-item-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.25rem;
        }

        .order-item-subtitle {
            font-size: 0.8rem;
            color: var(--text-color);
            margin: 0;
            opacity: 0.6;
        }

        .order-item-amount {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-color);
            white-space: nowrap;
        }

        /* Summary Totals */
        .summary-totals {
            padding: 1.5rem 0;
            border-top: 1px solid rgba(255,255,255,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-label {
            font-size: 0.9rem;
            color: var(--text-color);
            opacity: 0.7;
        }

        .summary-value {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .total-row {
            padding-top: 1rem;
            margin-top: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .total-row .summary-label {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-color);
            opacity: 1;
        }

        .total-row .summary-value {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        /* Instruction Guide */
        .instruction-guide {
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .guide-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .instruction-images-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .instruction-img-item {
            position: relative;
            cursor: pointer;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 4/3;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .instruction-img-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            border-color: var(--primary-color);
        }

        .instruction-img-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .step-number {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        /* Modal Styling */
        .modal-content {
            background: var(--bg-color);
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding: 1.25rem 1.5rem;
        }

        .modal-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-body img {
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .checkout-container {
                padding: 1rem;
            }

            .payment-navigation {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .payment-steps {
                width: 100%;
                justify-content: center;
            }

            .checkout-section {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .order-summary-section {
                position: static;
                padding: 1.5rem;
            }

            .checkout-title {
                font-size: 1.5rem;
            }

            .file-upload-clean {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .payment-navigation {
                padding: 0.875rem;
            }

            .payment-steps {
                font-size: 0.75rem;
            }

            .payment-steps .step {
                font-size: 0.75rem;
            }

            .payment-steps i {
                font-size: 0.6rem;
            }

            .checkout-section,
            .order-summary-section {
                padding: 1.25rem;
            }

            .order-item-card {
                flex-wrap: wrap;
            }

            .order-item-amount {
                width: 100%;
                text-align: right;
                margin-top: 0.5rem;
            }

            .instruction-images-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

