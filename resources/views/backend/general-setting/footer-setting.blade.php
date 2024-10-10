@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Footer Setting</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Footer Setting</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.footer-setting.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="footer_logo" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Footer] Logo</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="footer_logo" id="footer_logo" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff"data-max-width="1901"
                                    data-max-height="301" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 1900px -- 300px</small>
                                @error('footer_logo')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldFooterLogo" value="{{ $general_setting->footer_logo }}">
                                <img src="{{ asset('upload/' . $general_setting->footer_logo) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: black;" alt="Footer Logo">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="footer_content" class="col-sm-2 col-form-label fw-bolder text-uppercase">[Footer] Konten</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('footer_content') is-invalid @enderror" name="footer_content" id="footer_content" rows="3">{{ old('footer_content', $general_setting->footer_content) }}</textarea>
                                @error('footer_content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="facebook_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('facebook_link') is-invalid @enderror" name="facebook_link" id="facebook_link" placeholder="Link Facebook"
                                    value="{{ old('facebook_link', $general_setting->facebook_link) }}">
                                @error('facebook_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instagram_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Instagram</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link" id="instagram_link" placeholder="Link Instagram"
                                    value="{{ old('instagram_link', $general_setting->instagram_link) }}">
                                @error('instagram_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="youtube_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Youtube</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" id="youtube_link" placeholder="Link Youtube"
                                    value="{{ old('youtube_link', $general_setting->youtube_link) }}">
                                @error('youtube_link')
                                    <small class="text-danger">{{ $message }}</small>
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
@endpush

@push('custom-js')
    <script>
        $(function() {
            'use strict'
            $('#footer_logo').dropify();
        });
    </script>
@endpush
