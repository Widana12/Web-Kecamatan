@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Tentang Kecamatan Payangan</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.about.serviam.index') }}">Informasi Pelayanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pelayanan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Tambah pelayanan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.about.serviam.value.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nama Pelayanan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Value" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label fw-bolder text-uppercase">Deskripsi Pelayanan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Deskripsi Value" value="{{ old('content') }}">
                                @error('content')
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
