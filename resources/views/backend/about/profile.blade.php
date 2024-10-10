@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Tentang Kecamatan Payangan</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.about.profile') }}">Profil Kecamatan Payangan</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Profil Kecamatan Payangan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.about.profile.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="name" value="{{ $profile->name }}">
                        <div class="row mb-4">
                            <label for="background" class="fw-bolder text-uppercase mb-2">Background</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="background" id="background" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 1920px -- 950px</small>
                                @error('background')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="oldBackground" value="{{ $profile->background }}">
                                <img src="{{ asset('upload/' . $profile->background) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Background">
                            </div>
                        </div>
                        <div class="row">
                            <label for="content" class="fw-bolder text-uppercase mb-2">Konten</label>
                            <div class="col-md-12">
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="10">{{ old('content', $profile->content) }}</textarea>
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
