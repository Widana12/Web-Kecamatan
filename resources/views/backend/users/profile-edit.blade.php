@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Ubah Profil</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Ubah Profil [{{ $user->name }}]</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.users.profile.update', $user->token) }}" method="POST" class="forms-sample">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Lengkap"
                                    value="{{ old('name', $user->name) }}" autofocus>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label fw-bolder text-uppercase">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username"
                                    value="{{ old('username', $user->username) }}" readonly>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label fw-bolder text-uppercase">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="confirm_password" class="col-sm-2 col-form-label fw-bolder text-uppercase">Ulangi Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" placeholder="Ulangi Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-sm-2 col-form-label fw-bolder text-uppercase">Roles</label>
                            <div class="col-sm-10">
                                <select class="js-single form-select" name="role" id="role" data-width="100%" disabled>
                                    @foreach ($roles as $role)
                                        @if (old('role', $userRole) == $role->name)
                                            <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary fw-bolder">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
