@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Homepage Setting</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.homepage.sliders') }}">Data Slider</a></li>
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
                    <form action="{{ route('dashboard.homepage.slider.update', $slider->token) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="sub_title1" class="col-sm-2 col-form-label fw-bolder text-uppercase">Sub Judul 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('sub_title1') is-invalid @enderror" name="sub_title1" id="sub_title1" placeholder="Sub Judul 1"
                                    value="{{ old('sub_title1', $slider->sub_title1) }}" autofocus>
                                @error('sub_title1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label fw-bolder text-uppercase">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul"
                                    value="{{ old('title', $slider->title) }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sub_title2" class="col-sm-2 col-form-label fw-bolder text-uppercase">Sub Judul 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('sub_title2') is-invalid @enderror" name="sub_title2" id="sub_title2" placeholder="Sub Judul 2"
                                    value="{{ old('sub_title2', $slider->sub_title2) }}" autofocus>
                                @error('sub_title2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label for="button_name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nama Tombol</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('button_name') is-invalid @enderror" name="button_name" id="button_name" placeholder="Nama Tombol"
                                    value="{{ old('button_name', $slider->button_name) }}" autofocus>
                                @error('button_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="button_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Tombol</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('button_link') is-invalid @enderror" name="button_link" id="button_link" placeholder="Link Tombol"
                                    value="{{ old('button_link', $slider->button_link) }}" autofocus>
                                @error('button_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> -->
                        </div>
                        <div class="row mb-3">
                            <label for="background" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Background</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="background" id="background" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 1920px -- 950px</small>
                                @error('background')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldBackground" value="{{ $slider->background }}">
                                <img src="{{ asset('upload/' . $slider->background) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Background">
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
@endpush

@push('custom-js')
    <script>
        $(function() {
            'use strict'
            $('#background').dropify();
        });
    </script>
@endpush
