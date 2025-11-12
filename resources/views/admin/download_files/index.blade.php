@extends('admin.layouts.app')
@section('page_title', __('Download Files Management'))
@section('content')
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">@lang('Download Files')</h4>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addFileModal">
                    <i class="fa fa-plus"></i> @lang('Add New File')
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>@lang('ID')</th>
                            <th>@lang('Game/Card')</th>
                            <th>@lang('File Name')</th>
                            <th>@lang('Type')</th>
                            <th>@lang('Auth Required')</th>
                            <th>@lang('Downloads')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($files as $file)
                            <tr>
                                <td>{{ $file->id }}</td>
                                <td>
                                    @if($file->card)
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $file->card->preview_image }}" alt="{{ $file->card->name }}" 
                                                 style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; margin-right: 10px;">
                                            <span>{{ $file->card->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $file->name }}</strong>
                                    @if($file->version)
                                        <br><small class="text-muted">v{{ $file->version }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($file->file_type)
                                        <span class="badge bg-info">{{ ucfirst($file->file_type) }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($file->requires_auth)
                                        <span class="badge bg-warning">
                                            <i class="fa fa-lock"></i> Yes
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            <i class="fa fa-lock-open"></i> No
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $file->download_count }}</td>
                                <td>
                                    @if($file->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary editBtn"
                                            data-id="{{ $file->id }}"
                                            data-card_id="{{ $file->card_id }}"
                                            data-name="{{ $file->name }}"
                                            data-description="{{ $file->description }}"
                                            data-file_url="{{ $file->file_url }}"
                                            data-auth_username="{{ $file->auth_username }}"
                                            data-auth_password="{{ $file->auth_password }}"
                                            data-requires_auth="{{ $file->requires_auth }}"
                                            data-file_type="{{ $file->file_type }}"
                                            data-icon="{{ $file->icon }}"
                                            data-file_size="{{ $file->file_size }}"
                                            data-version="{{ $file->version }}"
                                            data-status="{{ $file->status }}"
                                            data-bs-toggle="modal" data-bs-target="#editFileModal">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger deleteBtn"
                                            data-id="{{ $file->id }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">@lang('No download files found')</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $files->links() }}
        </div>
    </div>

    <!-- Add File Modal -->
    <div class="modal fade" id="addFileModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.downloadFiles.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Add Download File')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Select Game/Card') *</label>
                                <select name="card_id" class="form-select" required>
                                    <option value="">@lang('Select Game')</option>
                                    @foreach(\App\Models\Card::where('status', 1)->get() as $card)
                                        <option value="{{ $card->id }}">{{ $card->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('File Name') *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('Version')</label>
                                <input type="text" name="version" class="form-control" placeholder="e.g., 1.0.0">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Description')</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Download URL') *</label>
                                <input type="url" name="file_url" class="form-control" required placeholder="https://example.com/file.zip">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('File Type')</label>
                                <select name="file_type" class="form-select">
                                    <option value="">@lang('Select Type')</option>
                                    <option value="game">Game</option>
                                    <option value="hack">Hack</option>
                                    <option value="tool">Tool</option>
                                    <option value="guide">Guide</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('File Size (bytes)')</label>
                                <input type="number" name="file_size" class="form-control" placeholder="e.g., 1048576">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Icon (Font Awesome class)')</label>
                                <input type="text" name="icon" class="form-control" placeholder="e.g., fa-file-download">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="requires_auth" id="requires_auth_add" value="1" checked>
                                    <label class="form-check-label" for="requires_auth_add">
                                        @lang('Requires Authentication')
                                    </label>
                                </div>
                            </div>
                            <div id="authFieldsAdd">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Auth Username')</label>
                                    <input type="text" name="auth_username" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Auth Password')</label>
                                    <input type="text" name="auth_password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status_add" value="1" checked>
                                    <label class="form-check-label" for="status_add">
                                        @lang('Active')
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit File Modal -->
    <div class="modal fade" id="editFileModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="POST" id="editForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Edit Download File')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Select Game/Card') *</label>
                                <select name="card_id" id="edit_card_id" class="form-select" required>
                                    <option value="">@lang('Select Game')</option>
                                    @foreach(\App\Models\Card::where('status', 1)->get() as $card)
                                        <option value="{{ $card->id }}">{{ $card->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('File Name') *</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('Version')</label>
                                <input type="text" name="version" id="edit_version" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Description')</label>
                                <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Download URL') *</label>
                                <input type="url" name="file_url" id="edit_file_url" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('File Type')</label>
                                <select name="file_type" id="edit_file_type" class="form-select">
                                    <option value="">@lang('Select Type')</option>
                                    <option value="game">Game</option>
                                    <option value="hack">Hack</option>
                                    <option value="tool">Tool</option>
                                    <option value="guide">Guide</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">@lang('File Size (bytes)')</label>
                                <input type="number" name="file_size" id="edit_file_size" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">@lang('Icon (Font Awesome class)')</label>
                                <input type="text" name="icon" id="edit_icon" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="requires_auth" id="edit_requires_auth" value="1">
                                    <label class="form-check-label" for="edit_requires_auth">
                                        @lang('Requires Authentication')
                                    </label>
                                </div>
                            </div>
                            <div id="authFieldsEdit">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Auth Username')</label>
                                    <input type="text" name="auth_username" id="edit_auth_username" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">@lang('Auth Password')</label>
                                    <input type="text" name="auth_password" id="edit_auth_password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="edit_status" value="1">
                                    <label class="form-check-label" for="edit_status">
                                        @lang('Active')
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    @include('admin.delete-modal')
@endsection

@push('script')
<script>
    'use strict';
    
    $(document).on('click', '.editBtn', function() {
        let data = $(this).data();
        $('#editForm').attr('action', '{{ route("admin.downloadFiles.update", ":id") }}'.replace(':id', data.id));
        $('#edit_card_id').val(data.card_id);
        $('#edit_name').val(data.name);
        $('#edit_description').val(data.description);
        $('#edit_file_url').val(data.file_url);
        $('#edit_auth_username').val(data.auth_username);
        $('#edit_auth_password').val(data.auth_password);
        $('#edit_requires_auth').prop('checked', data.requires_auth == 1);
        $('#edit_file_type').val(data.file_type);
        $('#edit_icon').val(data.icon);
        $('#edit_file_size').val(data.file_size);
        $('#edit_version').val(data.version);
        $('#edit_status').prop('checked', data.status == 1);
    });

    $(document).on('click', '.deleteBtn', function() {
        let id = $(this).data('id');
        $('#deleteForm').attr('action', '{{ route("admin.downloadFiles.destroy", ":id") }}'.replace(':id', id));
    });

    // Toggle auth fields
    $('#requires_auth_add').on('change', function() {
        if($(this).is(':checked')) {
            $('#authFieldsAdd').show();
        } else {
            $('#authFieldsAdd').hide();
        }
    });

    $('#edit_requires_auth').on('change', function() {
        if($(this).is(':checked')) {
            $('#authFieldsEdit').show();
        } else {
            $('#authFieldsEdit').hide();
        }
    });
</script>
@endpush
