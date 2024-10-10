@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Galeri Foto</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.gallery.index') }}">Data Galeri Foto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Tambah Data</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.gallery.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="create_by" id="create_by" value="{{ auth()->user()->id }}">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label fw-bolder text-uppercase">Judul Galeri Foto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul Galeri Foto" value="{{ old('title') }}"
                                    autofocus>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slug" class="col-sm-2 col-form-label fw-bolder text-uppercase">Slug Berita / Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug Berita / Kategori"
                                    value="{{ old('slug') }}" readonly>
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="category_id" class="col-sm-2 col-form-label fw-bolder text-uppercase">Kategori Galeri Foto</label>
                            <div class="col-sm-10">
                                <select class="js-category form-select" name="category_id" id="category_id" data-width="100%">
                                    @foreach ($categories as $category)
                                        @if (old('category') == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-sm-2 col-form-label fw-bolder text-uppercase">Gambar Utama</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 1500px -- 900px</small>
                                @error('image')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/gallery/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        $(function() {
            'use strict'
            if ($(".js-category").length) {
                $(".js-category").select2();
            }

            $('#image').dropify();
        });
    </script>
@endpush
