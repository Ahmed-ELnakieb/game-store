<div class="modal fade" id="deleteCodeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('Delete Code')</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>@lang('Are you sure you want to delete this code? This action cannot be undone.')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">@lang('Cancel')</button>
                <a href="#" id="deleteCodeLink" class="btn btn-danger">@lang('Delete')</a>
            </div>
        </div>
    </div>
</div>
