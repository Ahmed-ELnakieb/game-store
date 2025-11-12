@extends(template().'layouts.user')
@section('title',trans('Download Files'))
@section('content')
    <div class="pagetitle">
        <h3 class="mb-1">@lang('Download Files')</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('Home')</a></li>
                <li class="breadcrumb-item active">@lang('Downloads')</li>
            </ol>
        </nav>
    </div>

    @if($files->count() > 0)
        <div class="row g-3">
            @foreach($files as $file)
                <div class="col-md-6 col-lg-4">
                    <div class="download-card">
                        <div class="download-card-header">
                            <div class="d-flex align-items-center gap-2">
                                @if($file->icon)
                                    <i class="fa {{ $file->icon }} fa-2x text-primary"></i>
                                @else
                                    <i class="fa fa-file-download fa-2x text-primary"></i>
                                @endif
                                <div class="flex-grow-1">
                                    <h5 class="mb-0">{{ $file->name }}</h5>
                                    @if($file->version)
                                        <small class="text-muted">v{{ $file->version }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="download-card-body">
                            @if($file->card)
                                <div class="game-info mb-3">
                                    <img src="{{ $file->card->preview_image }}" alt="{{ $file->card->name }}" class="game-thumb">
                                    <span class="game-name">{{ $file->card->name }}</span>
                                </div>
                            @endif

                            @if($file->description)
                                <p class="file-description">{{ Str::limit($file->description, 100) }}</p>
                            @endif

                            <div class="file-meta">
                                @if($file->file_type)
                                    <span class="badge bg-info">{{ ucfirst($file->file_type) }}</span>
                                @endif
                                @if($file->file_size)
                                    <span class="badge bg-secondary">{{ $file->file_size_formatted }}</span>
                                @endif
                                @if($file->requires_auth)
                                    <span class="badge bg-warning">
                                        <i class="fa fa-lock"></i> Protected
                                    </span>
                                @endif
                            </div>

                            <div class="download-stats mt-3">
                                <small class="text-muted">
                                    <i class="fa fa-download"></i> {{ $file->download_count }} downloads
                                </small>
                            </div>
                        </div>
                        <div class="download-card-footer">
                            <a href="{{ route('user.downloads.access', $file->id) }}" class="btn btn-primary w-100">
                                <i class="fa fa-download"></i> @lang('Download')
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $files->links(template().'partials.pagination') }}
        </div>
    @else
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fa fa-download fa-4x text-muted mb-3"></i>
                <h5>@lang('No Download Files Available')</h5>
                <p class="text-muted">@lang('Purchase games to access their download files')</p>
                <a href="{{ route('user.shop') }}" class="btn btn-primary mt-3">
                    <i class="fa fa-shopping-cart"></i> @lang('Browse Shop')
                </a>
            </div>
        </div>
    @endif
@endsection

@push('style')
<style>
    .download-card {
        background: var(--card-bg, #1a1d29);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .download-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .download-card-header {
        padding: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .download-card-body {
        padding: 20px;
        flex-grow: 1;
    }

    .download-card-footer {
        padding: 15px 20px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .game-info {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background: rgba(255,255,255,0.05);
        border-radius: 8px;
    }

    .game-thumb {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
    }

    .game-name {
        font-size: 14px;
        font-weight: 600;
    }

    .file-description {
        font-size: 14px;
        color: var(--text-muted, #8b92a7);
        margin-bottom: 15px;
    }

    .file-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .download-stats {
        padding-top: 10px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
</style>
@endpush
