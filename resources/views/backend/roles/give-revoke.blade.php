@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">User Management</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">Data Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">Give Revoke Permission</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Give Revoke Permission [{{ $role->name }}]</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            <form action="{{ route('dashboard.roles.revoke', [$role->id, $role_permission->id]) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="button" id="button-revoke" class="badge bg-dark text-light me-2 mb-2">
                                    <h5>{{ $role_permission->name }}</h5>
                                </button>
                            </form>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.roles.give', $role->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <select class="js-single form-select" name="permission" id="permission" data-width="100%">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-give" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
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
    </script>
@endpush
