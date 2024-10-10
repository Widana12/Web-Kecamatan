@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">User Management</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.permissions.index') }}">Data Permission</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Tambah Data</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.permissions.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nama Permission</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Permission" value="{{ old('name') }}"
                                    autofocus>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                            <a href="{{ route('dashboard.permissions.index') }}" class="btn btn-secondary fw-bolder">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
