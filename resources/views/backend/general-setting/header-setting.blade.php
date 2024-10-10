@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Header Setting</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Header Setting</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.header-setting.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="header_logo_white" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Header] Logo Versi Putih</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="header_logo_white" id="header_logo_white" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff"
                                    data-min-width="189" data-max-width="191" data-min-height="29" data-max-height="31" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 190px -- 30px</small>
                                @error('header_logo_white')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldHeaderLogoWhite" value="{{ $general_setting->header_logo_white }}">
                                <img src="{{ asset('upload/' . $general_setting->header_logo_white) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: black;"
                                    alt="Header Logo Versi Putih">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="header_logo_black" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Header] Logo Versi Hitam</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="header_logo_black" id="header_logo_black" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff"
                                    data-min-width="189" data-max-width="191" data-min-height="29" data-max-height="31" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                <small>* Width -- Height : 190px -- 30px</small>
                                @error('header_logo_black')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldHeaderLogoBlack" value="{{ $general_setting->header_logo_black }}">
                                <img src="{{ asset('upload/' . $general_setting->header_logo_black) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Header Logo Versi Hitam">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="psb_name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tombol</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('psb_name') is-invalid @enderror" name="psb_name" id="psb_name" placeholder="Tombol"
                                    value="{{ old('psb_name', $general_setting->psb_name) }}">
                                @error('psb_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="psb_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tombol Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('psb_link') is-invalid @enderror" name="psb_link" id="psb_link" placeholder="Tombol Link"
                                    value="{{ old('psb_link', $general_setting->psb_link) }}">
                                @error('psb_link')
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
            $('#header_logo_white').dropify();
            $('#header_logo_black').dropify();
        });
    </script>
@endpush
