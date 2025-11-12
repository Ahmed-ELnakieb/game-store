@extends(template().'layouts.user')
@section('title',trans('File Authentication'))
@section('content')
    <div class="pagetitle">
        <h3 class="mb-1">@lang('File Authentication Required')</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('Home')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.downloads') }}">@lang('Downloads')</a></li>
                <li class="breadcrumb-item active">@lang('Authentication')</li>
            </ol>
        </nav>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class="fa fa-lock fa-4x text-warning mb-3"></i>
                        <h4>@lang('Protected File')</h4>
                        <p class="text-muted">@lang('This file requires authentication to download')</p>
                    </div>

                    <div class="file-info mb-4 p-3" style="background: rgba(255,255,255,0.05); border-radius: 8px;">
                        <h5 class="mb-2">{{ $file->name }}</h5>
                        @if($file->version)
                            <p class="mb-1"><strong>@lang('Version'):</strong> {{ $file->version }}</p>
                        @endif
                        @if($file->description)
                            <p class="mb-1"><strong>@lang('Description'):</strong> {{ $file->description }}</p>
                        @endif
                        @if($file->card)
                            <p class="mb-0"><strong>@lang('Game'):</strong> {{ $file->card->name }}</p>
                        @endif
                    </div>

                    <form action="{{ route('user.downloads.authenticate', $file->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">@lang('Username')</label>
                            <input type="text" 
                                   class="form-control @error('username') is-invalid @enderror" 
                                   id="username" 
                                   name="username" 
                                   value="{{ old('username') }}"
                                   required 
                                   autofocus>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">@lang('Password')</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i>
                            @lang('Enter the credentials provided to you to access this file')
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-unlock"></i> @lang('Authenticate & Download')
                            </button>
                            <a href="{{ route('user.downloads') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-left"></i> @lang('Back to Downloads')
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .file-info {
        border-left: 4px solid var(--primary-color, #6366f1);
    }
</style>
@endpush
