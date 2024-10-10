@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Homepage Setting</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.homepage.sliders') }}">Data Headmaster</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Headmaster</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.homepage.headmaster.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="headmaster_name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nama Kepala Camat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('headmaster_name') is-invalid @enderror" name="headmaster_name" id="headmaster_name" placeholder="Nama kepala Camat"
                                    value="{{ old('headmaster_name', $headmaster->headmaster_name) }}" autofocus>
                                @error('headmaster_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="headmaster_image" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Foto Kepala Camat</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="headmaster_image" id="headmaster_image" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 370px -- 440px</small>
                                @error('headmaster_image')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldHeadmasterImage" value="{{ $headmaster->headmaster_image }}">
                                <img src="{{ asset('upload/' . $headmaster->headmaster_image) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Foto Kepala Sekolah">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="headmaster_content" class="col-sm-2 col-form-label fw-bolder text-uppercase">Isi Sambutan</label>
                            <div class="col-md-12">
                                <textarea class="form-control @error('headmaster_content') is-invalid @enderror" name="headmaster_content" rows="10">{{ old('headmaster_content', $headmaster->headmaster_content) }}</textarea>
                                @error('headmaster_content')
                                    <span class="text-danger">{{ $message }}</span>
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
            $('#headmaster_image').dropify();
            CKEDITOR.replace('headmaster_content', {
                filebrowserImageBrowseUrl: '/dashboard/filemanager?type=Images',
                filebrowserImageUploadUrl: '/dashboard/filemanager/upload?type=Images&_token={{ csrf_token() }}',
                filebrowserBrowseUrl: '/dashboard/filemanager?type=Files',
                filebrowserUploadUrl: '/dashboard/filemanager/upload?type=Files&_token={{ csrf_token() }}',
                height: 300
            });
        });
    </script>
@endpush
