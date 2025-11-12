@extends('admin.layouts.app')
@section('page_title','Order Settings')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">@lang('Order Management Settings')</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Auto Complete Orders -->
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">@lang('Auto-Complete Orders')</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.orderSettings.update') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="auto_complete_orders" 
                                           id="autoCompleteOrders" value="1" 
                                           {{ $basicControl->auto_complete_orders ? 'checked' : '' }}>
                                    <label class="form-check-label" for="autoCompleteOrders">
                                        <strong>@lang('Enable Auto-Complete Orders')</strong>
                                    </label>
                                </div>
                                <small class="text-muted">
                                    @lang('When enabled, orders will be automatically completed after successful payment. Codes will be assigned instantly without manual intervention.')
                                </small>
                            </div>

                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="use_queue_for_orders" 
                                           id="useQueueForOrders" value="1" 
                                           {{ $basicControl->use_queue_for_orders ? 'checked' : '' }}>
                                    <label class="form-check-label" for="useQueueForOrders">
                                        <strong>@lang('Use Queue Jobs')</strong>
                                    </label>
                                </div>
                                <small class="text-muted">
                                    @lang('When enabled, order processing uses queue jobs (requires queue worker). When disabled, orders are processed immediately.')
                                </small>
                            </div>

                            <div class="alert alert-info">
                                <i class="bi-info-circle me-2"></i>
                                <strong>@lang('How it works:')</strong>
                                <ul class="mb-0 mt-2">
                                    <li>@lang('User completes payment successfully')</li>
                                    <li>@lang('System automatically assigns codes from inventory')</li>
                                    <li>@lang('User receives codes instantly')</li>
                                    <li>@lang('No manual admin action required')</li>
                                </ul>
                            </div>

                            <div class="alert alert-warning">
                                <i class="bi-exclamation-triangle me-2"></i>
                                <strong>@lang('Queue Jobs:')</strong>
                                <ul class="mb-0 mt-2">
                                    <li><strong>Enabled:</strong> @lang('Better for high traffic, requires queue worker or QUEUE_CONNECTION=sync')</li>
                                    <li><strong>Disabled:</strong> @lang('Simpler, executes immediately, good for low/medium traffic')</li>
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi-check-circle me-1"></i> @lang('Save Settings')
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Statistics -->
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">@lang('Order Statistics')</h4>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="text-body">@lang('Total Orders')</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-soft-primary text-primary">{{ $totalOrders }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="text-body">@lang('Pending Orders')</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-soft-warning text-warning">{{ $pendingOrders }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="text-body">@lang('Completed Orders')</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-soft-success text-success">{{ $completedOrders }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulk Delete Orders -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title text-danger">
                            <i class="bi-exclamation-triangle me-2"></i>@lang('Danger Zone')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h5>@lang('Bulk Delete Orders')</h5>
                        <p class="text-muted">@lang('Permanently delete multiple orders at once. This action cannot be undone.')</p>

                        <form action="{{ route('admin.orderSettings.deleteAll') }}" method="POST" 
                              onsubmit="return confirm('@lang('Are you absolutely sure? This will permanently delete the selected orders and cannot be undone!')')">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Select Order Type')</label>
                                    <select name="order_type" class="form-select" required>
                                        <option value="">@lang('Choose...')</option>
                                        <option value="all">@lang('All Orders') ({{ $totalOrders }})</option>
                                        <option value="pending">@lang('Pending Orders Only') ({{ $pendingOrders }})</option>
                                        <option value="completed">@lang('Completed Orders Only') ({{ $completedOrders }})</option>
                                        <option value="refund">@lang('Refunded Orders Only')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-warning">
                                <i class="bi-exclamation-triangle me-2"></i>
                                <strong>@lang('Warning:')</strong>
                                @lang('Deleting completed orders will release all assigned codes back to inventory.')
                            </div>

                            <button type="submit" class="btn btn-danger">
                                <i class="bi-trash me-1"></i> @lang('Delete Selected Orders')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
