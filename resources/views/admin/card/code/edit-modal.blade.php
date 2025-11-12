<div class="modal fade" id="editCodeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editCodeForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h3>@lang('Edit Code')</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($durations->isNotEmpty())
                    <div class="mb-3">
                        <label class="form-label">@lang('Duration') <span class="text-danger">*</span></label>
                        <select name="duration_id" id="edit_duration_id" class="form-select" required>
                            <option value="">@lang('Select Duration')</option>
                            @foreach($durations as $pricing)
                                <option value="{{$pricing->duration_id}}">
                                    {{$pricing->duration->name}} - {{ basicControl()->currency_symbol }}{{formatAmount($pricing->price)}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <label class="form-label">@lang('Pass Code') <span class="text-danger">*</span></label>
                        <input type="text" name="passcode" id="edit_passcode" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">@lang('Expiry Message')</label>
                        <textarea name="expiry_message" id="edit_expiry_message" class="form-control" rows="3" placeholder="@lang('Message shown to user when key expires...')"></textarea>
                        <small class="text-muted">@lang('This message will be displayed to the user when their key expires. Leave empty for default message.')</small>
                    </div>

                    <div id="current_expiry_info" class="alert alert-info d-none mb-3">
                        <strong>@lang('Current Expiration:')</strong> <span id="current_expiry_date"></span><br>
                        <strong>@lang('Time Left:')</strong> <span id="current_time_left"></span>
                    </div>

                    <div class="mb-3" id="time_control_section">
                        <label class="form-label">@lang('Modify Expiration Time')</label>
                        
                        <div class="btn-group w-100 mb-2" role="group">
                            <input type="radio" class="btn-check" name="time_action" id="time_action_add" value="add" checked>
                            <label class="btn btn-outline-success" for="time_action_add">
                                <i class="bi-plus-circle me-1"></i> @lang('Add Time')
                            </label>

                            <input type="radio" class="btn-check" name="time_action" id="time_action_subtract" value="subtract">
                            <label class="btn btn-outline-warning" for="time_action_subtract">
                                <i class="bi-dash-circle me-1"></i> @lang('Reduce Time')
                            </label>

                            <input type="radio" class="btn-check" name="time_action" id="time_action_set" value="set">
                            <label class="btn btn-outline-primary" for="time_action_set">
                                <i class="bi-calendar-check me-1"></i> @lang('Set Exact Date')
                            </label>
                        </div>

                        <div id="time_modify_inputs">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" name="modify_days" id="edit_modify_days" class="form-control" placeholder="Days" min="0" value="0">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="modify_hours" id="edit_modify_hours" class="form-control" placeholder="Hours" min="0" value="0">
                                </div>
                            </div>
                            <small class="text-muted" id="time_action_hint">@lang('Add extra time to the current expiration')</small>
                        </div>

                        <div id="exact_date_input" class="d-none">
                            <input type="datetime-local" name="exact_expiry" id="edit_exact_expiry" class="form-control">
                            <small class="text-muted">@lang('Set exact expiration date and time')</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary btn-sm">@lang('Update')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
