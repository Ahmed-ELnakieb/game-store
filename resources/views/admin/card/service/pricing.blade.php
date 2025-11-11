@extends('admin.layouts.app')
@section('page_title', $cardService->name . ' - Pricing Management')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('admin.card.list') }}">@lang('Games')</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('admin.cardService.list', ['card_id' => $cardService->card_id]) }}">{{ $cardService->card->name }} @lang('Hacks')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $cardService->name }} - @lang('Pricing')</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">{{ $cardService->name }} - @lang('Pricing Management')</h1>
                </div>
                <div class="col-sm-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPricingModal">
                        <i class="bi-plus"></i> @lang('Add Pricing')
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-header-title">@lang('Duration-Based Pricing')</h4>
            </div>
            <div class="card-body">
                @if($pricings->isEmpty())
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="bi-tags" style="font-size: 3rem; color: #ccc;"></i>
                        </div>
                        <p class="text-muted">@lang('No pricing configured yet. Add pricing for different durations.')</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>@lang('Duration')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Discount')</th>
                                    <th>@lang('Final Price')</th>
                                    <th>@lang('Stock')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pricings as $pricing)
                                    <tr>
                                        <td>
                                            <span class="badge bg-soft-primary text-primary">
                                                {{ $pricing->duration->name }}
                                            </span>
                                        </td>
                                        <td>{{ basicControl()->currency_symbol }}{{ formatAmount($pricing->price) }}</td>
                                        <td>
                                            @if($pricing->discount > 0)
                                                <span class="badge bg-soft-danger text-danger">
                                                    {{ $pricing->discount }}{{ $pricing->discount_type == 'percentage' ? '%' : ' ' . basicControl()->base_currency }}
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ basicControl()->currency_symbol }}{{ formatAmount($pricing->getFinalPrice()) }}</strong>
                                        </td>
                                        <td>
                                            @if($pricing->stock_count !== null)
                                                <span class="badge bg-soft-info text-info">{{ $pricing->stock_count }}</span>
                                            @else
                                                <span class="text-muted">@lang('Unlimited')</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pricing->status)
                                                <span class="badge bg-soft-success text-success">
                                                    <span class="legend-indicator bg-success"></span>@lang('Active')
                                                </span>
                                            @else
                                                <span class="badge bg-soft-danger text-danger">
                                                    <span class="legend-indicator bg-danger"></span>@lang('Inactive')
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-white btn-sm edit-pricing-btn"
                                                    data-id="{{ $pricing->id }}"
                                                    data-duration-id="{{ $pricing->duration_id }}"
                                                    data-price="{{ $pricing->price }}"
                                                    data-discount="{{ $pricing->discount }}"
                                                    data-discount-type="{{ $pricing->discount_type }}"
                                                    data-stock-count="{{ $pricing->stock_count }}"
                                                    data-status="{{ $pricing->status }}"
                                                    data-bs-toggle="modal" data-bs-target="#editPricingModal">
                                                    <i class="bi-pencil-fill me-1"></i> @lang('Edit')
                                                </button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="{{ route('admin.service.pricing.statusChange', $pricing->id) }}">
                                                            <i class="bi-toggle-{{ $pricing->status ? 'off' : 'on' }} dropdown-item-icon"></i>
                                                            @lang($pricing->status ? 'Deactivate' : 'Activate')
                                                        </a>
                                                        <form action="{{ route('admin.service.pricing.delete', $pricing->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('@lang('Are you sure you want to delete this pricing?')')">
                                                                <i class="bi-trash dropdown-item-icon"></i> @lang('Delete')
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Add Pricing Modal -->
    <div class="modal fade" id="addPricingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add Pricing')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.service.pricing.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="card_service_id" value="{{ $cardService->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="duration_id" class="form-label">@lang('Duration') <span class="text-danger">*</span></label>
                            <select class="form-select" name="duration_id" id="duration_id" required>
                                <option value="">@lang('Select Duration')</option>
                                @foreach($durations as $duration)
                                    <option value="{{ $duration->id }}">{{ $duration->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">@lang('Price') <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">{{ basicControl()->currency_symbol }}</span>
                                <input type="number" class="form-control" name="price" id="price" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="discount" class="form-label">@lang('Discount')</label>
                                <input type="number" class="form-control" name="discount" id="discount" step="0.01" min="0" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="discount_type" class="form-label">@lang('Discount Type')</label>
                                <select class="form-select" name="discount_type" id="discount_type">
                                    <option value="flat">@lang('Flat')</option>
                                    <option value="percentage">@lang('Percentage')</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="stock_count" class="form-label">@lang('Stock Count')</label>
                            <input type="number" class="form-control" name="stock_count" id="stock_count" min="0" placeholder="@lang('Leave empty for unlimited')">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">@lang('Status')</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="1">@lang('Active')</option>
                                <option value="0">@lang('Inactive')</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Add Pricing')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Pricing Modal -->
    <div class="modal fade" id="editPricingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Edit Pricing')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editPricingForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">@lang('Duration')</label>
                            <input type="text" class="form-control" id="edit_duration_name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_price" class="form-label">@lang('Price') <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">{{ basicControl()->currency_symbol }}</span>
                                <input type="number" class="form-control" name="price" id="edit_price" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_discount" class="form-label">@lang('Discount')</label>
                                <input type="number" class="form-control" name="discount" id="edit_discount" step="0.01" min="0" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_discount_type" class="form-label">@lang('Discount Type')</label>
                                <select class="form-select" name="discount_type" id="edit_discount_type">
                                    <option value="flat">@lang('Flat')</option>
                                    <option value="percentage">@lang('Percentage')</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_stock_count" class="form-label">@lang('Stock Count')</label>
                            <input type="number" class="form-control" name="stock_count" id="edit_stock_count" min="0" placeholder="@lang('Leave empty for unlimited')">
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="form-label">@lang('Status')</label>
                            <select class="form-select" name="status" id="edit_status" required>
                                <option value="1">@lang('Active')</option>
                                <option value="0">@lang('Inactive')</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Update Pricing')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    'use strict';
    $(document).ready(function() {
        // Edit pricing button click
        $('.edit-pricing-btn').on('click', function() {
            const id = $(this).data('id');
            const durationId = $(this).data('duration-id');
            const price = $(this).data('price');
            const discount = $(this).data('discount');
            const discountType = $(this).data('discount-type');
            const stockCount = $(this).data('stock-count');
            const status = $(this).data('status');
            
            // Find duration name
            const durationName = $(`#duration_id option[value="${durationId}"]`).text();
            
            // Set form action
            $('#editPricingForm').attr('action', `{{ route('admin.service.pricing') }}/update/${id}`);
            
            // Fill form fields
            $('#edit_duration_name').val(durationName);
            $('#edit_price').val(price);
            $('#edit_discount').val(discount);
            $('#edit_discount_type').val(discountType);
            $('#edit_stock_count').val(stockCount);
            $('#edit_status').val(status);
        });
    });
</script>
@endpush
