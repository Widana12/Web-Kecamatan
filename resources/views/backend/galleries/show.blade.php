@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Galeri Foto</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.gallery.index') }}">Data Galeri Foto</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Illuminate\Support\Str::limit($gallery->title, 30) }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ Illuminate\Support\Str::limit($gallery->title, 30) }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Kategori</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $gallery->gallery_category->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Dibuat Oleh</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $gallery->user_create->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tanggal Dibuat</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Publish</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $gallery->isPublish == '0' ? 'Belum Publish' : 'Publish' }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Publish Oleh</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $gallery->publish_by != null ? $gallery->user_publish->name : '' }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tanggal Publish</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $gallery->publish_at != null ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->publish_at)->isoFormat('DD MMMM Y HH:mm:ss') : '' }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-3">
                        @can('gallery-publish')
                            @if ($gallery->isPublish == '0')
                                <a href="{{ route('dashboard.gallery.publish', [$gallery->slug, auth()->user()->token]) }}" class="btn btn-primary btn-icon-text mb-md-0 mb-1">
                                    <i class="btn-icon-prepend" data-feather="file-plus"></i>
                                    Publish Galeri Foto
                                </a>
                            @else
                                <a href="{{ route('dashboard.gallery.notPublish', [$gallery->slug, auth()->user()->token]) }}" class="btn btn-primary btn-icon-text mb-md-0 mb-1">
                                    <i class="btn-icon-prepend" data-feather="file-minus"></i>
                                    Batal Publish Galeri Foto
                                </a>
                            @endif
                        @endcan
                        @can('gallery-image')
                            <a href="{{ route('dashboard.gallery.images', $gallery->slug) }}" class="btn btn-secondary btn-icon-text mb-md-0 mb-1">
                                <i class="btn-icon-prepend" data-feather="image"></i>
                                Data Foto
                            </a>
                        @endcan
                        @can('gallery-edit')
                            <a href="{{ route('dashboard.gallery.edit', $gallery->slug) }}" class="btn btn-warning btn-icon-text">
                                <i class="btn-icon-prepend" data-feather="edit"></i>
                                Ubah Galeri Foto
                            </a>
                        @endcan
                        @can('gallery-delete')
                            <form action="{{ route('dashboard.gallery.delete', $gallery->slug) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')">
                                @method('DELETE')
                                @csrf
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="x-square"></i>
                                        Hapus Galeri Foto
                                    </button>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($gallery_images as $gallery_image)
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card me-3">
                                    <img src="{{ asset('storage/photos/shares/' . $gallery_image->image) }}" class="card-img-top mb-2" alt="...">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <span class="text-uppercase fw-bolder">Gambar Utama</span>
                                <img src="{{ asset('upload/' . $gallery->image) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Gambar Utama">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
