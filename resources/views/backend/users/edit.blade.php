@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">User Management</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Ubah Data [{{ $user->name }}]</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.users.update', $user->token) }}" method="POST" class="forms-sample">
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
                            <label for="slug" class="col-sm-2 col-form-label fw-bolder text-uppercase">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Slug" value="{{ old('slug', $user->slug) }}"
                                    readonly>
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label fw-bolder text-uppercase">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username"
                                    value="{{ old('username', $user->username) }}">
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
                                <select class="js-single form-select" name="role" id="role" data-width="100%">
                                    @foreach ($roles as $role)
                                        @if (old('role', $userRole) == $role->name)
                                            @if (auth()->user()->getRoleNames()->first() != 'Super Administrator' && $role->name == 'Super Administrator')
                                                <option value="{{ $role->name }}" selected disabled>{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                            @endif
                                        @else
                                            @if (auth()->user()->getRoleNames()->first() != 'Super Administrator' && $role->name == 'Super Administrator')
                                                <option value="{{ $role->name }}" disabled>{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary fw-bolder">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $(function() {
            'use strict'
            if ($(".js-single").length) {
                $(".js-single").select2();
            }
        });

        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/users/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endpush
