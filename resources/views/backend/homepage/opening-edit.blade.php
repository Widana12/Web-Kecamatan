@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Homepage Setting</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.homepage.sliders') }}">Data Opening</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Opening</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.homepage.opening.update') }}" method="POST" class="forms-sample">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="opening_content" class="col-sm-2 col-form-label fw-bolder text-uppercase">Opening Konten</label>
                            <div class="col-md-12">
                                <textarea class="form-control @error('opening_content') is-invalid @enderror" name="opening_content" rows="10">{{ old('opening_content', $opening->opening_content) }}</textarea>
                                @error('opening_content')
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
@endpush

@push('custom-js')
    <script>
        $(function() {
            'use strict'
            CKEDITOR.replace('opening_content', {
                filebrowserImageBrowseUrl: '/dashboard/filemanager?type=Images',
                filebrowserImageUploadUrl: '/dashboard/filemanager/upload?type=Images&_token={{ csrf_token() }}',
                filebrowserBrowseUrl: '/dashboard/filemanager?type=Files',
                filebrowserUploadUrl: '/dashboard/filemanager/upload?type=Files&_token={{ csrf_token() }}',
                height: 300
            });
        });
    </script>
@endpush
