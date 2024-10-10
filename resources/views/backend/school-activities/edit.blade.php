@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Kegiatan Kecamatan Payangan</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.school-activity.index') }}">Data Kegiatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Ubah Data</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.school-activity.update', $school_activity->slug) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label fw-bolder text-uppercase">Judul Kegiatan </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul Kegiatan "
                                    value="{{ old('title', $school_activity->title) }}" autofocus>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slug" class="col-sm-2 col-form-label fw-bolder text-uppercase">Slug Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug Kegiatan"
                                    value="{{ old('slug', $school_activity->slug) }}" readonly>
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sub_name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Sub Judul Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('sub_name') is-invalid @enderror" name="sub_name" id="sub_name" placeholder="Sub Judul Kegiatan"
                                    value="{{ old('sub_name', $school_activity->sub_name) }}">
                                @error('sub_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="background" class="col-sm-2 col-form-label fw-bolder text-uppercase">Background</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" name="background" id="background" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 1920px -- 950px</small>
                                @error('background')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <input type="hidden" name="oldBackground" value="{{ $school_activity->background }}">
                                <img src="{{ asset('upload/' . $school_activity->background) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Background">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for="content" class="fw-bolder text-uppercase mb-2">Konten Kegiatan</label>
                            <div class="col-md-12">
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="10">{{ old('content', $school_activity->content) }}</textarea>
                                @error('content')
                                    <small class="text-danger">* {{ $message }}</small>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
@endpush

@push('custom-js')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/school-activity/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        $(function() {
            'use strict'
            $('#background').dropify();

            CKEDITOR.replace('content', {
                filebrowserImageBrowseUrl: '/dashboard/filemanager?type=Images',
                filebrowserImageUploadUrl: '/dashboard/filemanager/upload?type=Images&_token={{ csrf_token() }}',
                filebrowserBrowseUrl: '/dashboard/filemanager?type=Files',
                filebrowserUploadUrl: '/dashboard/filemanager/upload?type=Files&_token={{ csrf_token() }}',
                height: 1000
            });
        });
    </script>
@endpush
