@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Berita & Artikel</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.post.index') }}">Data Berita & Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Illuminate\Support\Str::limit($post->title, 30) }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ Illuminate\Support\Str::limit($post->title, 30) }}</h3>
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
                                            : {{ $post->post_category->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Dibuat Oleh</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $post->user_create->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tanggal Dibuat</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}
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
                                            : {{ $post->isPublish == '0' ? 'Belum Publish' : 'Publish' }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Publish Oleh</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $post->publish_by != null ? $post->user_publish->name : '' }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tanggal Publish</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $post->publish_at != null ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_at)->isoFormat('DD MMMM Y HH:mm:ss') : '' }}
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
                        @can('post-publish')
                            @if ($post->isPublish == '0')
                                <a href="{{ route('dashboard.post.publish', [$post->slug, auth()->user()->token]) }}" class="btn btn-primary btn-icon-text mb-md-0 mb-1">
                                    <i class="btn-icon-prepend" data-feather="file-plus"></i>
                                    Publish Berita / Artikel
                                </a>
                            @else
                                <a href="{{ route('dashboard.post.notPublish', [$post->slug, auth()->user()->token]) }}" class="btn btn-primary btn-icon-text mb-md-0 mb-1">
                                    <i class="btn-icon-prepend" data-feather="file-minus"></i>
                                    Batal Publish Berita / Artikel
                                </a>
                            @endif
                        @endcan
                        @can('post-edit')
                            <a href="{{ route('dashboard.post.edit', $post->slug) }}" class="btn btn-warning btn-icon-text">
                                <i class="btn-icon-prepend" data-feather="edit"></i>
                                Ubah Berita / Artikel
                            </a>
                        @endcan
                        @can('post-delete')
                            <form action="{{ route('dashboard.post.delete', $post->slug) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')">
                                @method('DELETE')
                                @csrf
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="x-square"></i>
                                        Hapus Berita / Artikel
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
                    <div class="content__wrapper">
                        {!! $post->content !!}
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
                                <img src="{{ asset('upload/' . $post->image) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Gambar Utama">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
