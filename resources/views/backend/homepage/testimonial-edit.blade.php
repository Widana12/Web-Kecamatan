@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Homepage Setting</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.homepage.testimonials') }}">Data Testimonial</a></li>
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
                    <form action="{{ route('dashboard.homepage.testimonial.update', $testimonial->token) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Lengkap"
                                    value="{{ old('name', $testimonial->name) }}" autofocus>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sub_name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Divisi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('sub_name') is-invalid @enderror" name="sub_name" id="sub_name" placeholder="Divisi"
                                    value="{{ old('sub_name', $testimonial->sub_name) }}">
                                @error('sub_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nip</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Nip"
                                    value="{{ old('content', $testimonial->content) }}">
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Foto</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="image" id="image" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 200px -- 200px</small>
                                @error('image')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldImage" value="{{ $testimonial->image }}">
                                <img src="{{ asset('upload/' . $testimonial->image) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Foto">
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
            $('#image').dropify();
        });
    </script>
@endpush
