<!-- @extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Web Setting</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Web Setting</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.web-setting.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="meta_description" class="col-sm-2 col-form-label fw-bolder text-uppercase">Meta Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" id="meta_description" placeholder="Meta Description"
                                    value="{{ old('meta_description', $general_setting->meta_description) }}" autofocus>
                                @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="meta_keywords" class="col-sm-2 col-form-label fw-bolder text-uppercase">Meta Keywords</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords"
                                    value="{{ old('meta_keywords', $general_setting->meta_keywords) }}">
                                @error('meta_keywords')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="meta_author" class="col-sm-2 col-form-label fw-bolder text-uppercase">Meta Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('meta_author') is-invalid @enderror" name="meta_author" id="meta_author" placeholder="Meta Author"
                                    value="{{ old('meta_author', $general_setting->meta_author) }}">
                                @error('meta_author')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="modal_active" class="col-sm-2 col-form-label fw-bolder text-uppercase">Modal Aktif</label>
                            <div class="col-sm-10">
                                <select class="js-single form-select" name="modal_active" id="modal_active" data-width="100%">
                                    <option value="1" {{ $general_setting->modal_active == 1 ? 'selected' : '' }}>AKTIF</option>
                                    <option value="0" {{ $general_setting->modal_active == 0 ? 'selected' : '' }}>TIDAK AKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="modal_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Modal Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('modal_link') is-invalid @enderror" name="modal_link" id="modal_link" placeholder="Modal Link"
                                    value="{{ old('modal_link', $general_setting->modal_link) }}">
                                @error('modal_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="modal_image" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Modal Image</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="modal_image" id="modal_image" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small>
                                @error('modal_image')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldModalImage" value="{{ $general_setting->modal_image }}">
                                <img src="{{ asset('upload/' . $general_setting->modal_image) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: black;" alt="Modal Image">
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
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $(function() {
            'use strict'
            if ($(".js-single").length) {
                $(".js-single").select2();
            }
            $('#modal_image').dropify();
        });
    </script>
@endpush -->
