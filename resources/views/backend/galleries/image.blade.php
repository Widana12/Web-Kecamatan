@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Galeri Foto</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.gallery.index') }}">Data Galeri Foto</a></li>
            <li class="breadcrumb-item">{{ Illuminate\Support\Str::limit($gallery->title, 30) }}</li>
            <li class="breadcrumb-item active" aria-current="page">Data Foto</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Foto</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.gallery.images.upload', $gallery->slug) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="image" data-preview="holder" class="btn btn-secondary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="image" class="form-control" type="text" name="image">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($gallery_images as $gallery_image)
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card me-3">
                    <img src="{{ asset('storage/photos/shares/' . $gallery_image->image) }}" class="card-img-top mb-2" alt="...">
                    <form action="{{ route('dashboard.gallery.images.delete', [$gallery->slug, $gallery_image->token]) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')">
                        @method('DELETE')
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger" title="HAPUS DATA">
                                <i data-feather="x-square"></i>
                                Hapus Foto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        var route_prefix = "/dashboard/filemanager";

        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>
@endpush
