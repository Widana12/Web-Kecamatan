@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.contact') }}">Kontak Kecamatan Payangan</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Kontak Kecamatan Payangan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.contact.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label fw-bolder text-uppercase">Alamat Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Alamat Kecamatan"
                                    value="{{ old('address', $contact->address) }}" autofocus>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Google Maps</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('address_link') is-invalid @enderror" name="address_link" id="address_link" placeholder="Link Google Maps"
                                    value="{{ old('address_link', $contact->address_link) }}" autofocus>
                                @error('address_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label fw-bolder text-uppercase">Alamat Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Alamat Email"
                                    value="{{ old('email', $contact->email) }}" autofocus>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone1" class="col-sm-2 col-form-label fw-bolder text-uppercase">No. Telepon Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" id="phone1" placeholder="No. Telepon Kecamatan"
                                    value="{{ old('phone1', $contact->phone1) }}" autofocus>
                                @error('phone1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label for="phone2" class="col-sm-2 col-form-label fw-bolder text-uppercase">No. Handphone Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" id="phone2" placeholder="No. Handphone Sekolah"
                                    value="{{ old('phone2', $contact->phone2) }}" autofocus>
                                @error('phone2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div> -->
                        <hr>
                        <div class="row">
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
                                <input type="hidden" name="oldBackground" value="{{ $contact->background }}">
                                <img src="{{ asset('upload/' . $contact->background) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Background">
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
