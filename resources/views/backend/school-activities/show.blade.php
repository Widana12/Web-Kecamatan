@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Kegiatan Kecamatan Payangan</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.school-activity.index') }}">Data Kegiatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $school_activity->sub_name }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ Illuminate\Support\Str::limit($school_activity->title, 30) }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="content__wrapper">
                        {!! $school_activity->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-grid gap-3">
                        @can('school-activity-posted')
                            @if ($school_activity->isPublish == '0')
                                <a href="{{ route('dashboard.school-activity.publish', [$school_activity->slug, auth()->user()->token]) }}" class="btn btn-primary btn-icon-text mb-md-0 mb-1">
                                    <i class="btn-icon-prepend" data-feather="file-plus"></i>
                                    Publish Kegiatan
                                </a>
                            @else
                                <a href="{{ route('dashboard.school-activity.notPublish', [$school_activity->slug, auth()->user()->token]) }}" class="btn btn-primary btn-icon-text mb-md-0 mb-1">
                                    <i class="btn-icon-prepend" data-feather="file-minus"></i>
                                    Batal Publish Kegiatan
                                </a>
                            @endif
                        @endcan
                        @can('school-activity-edit')
                            <a href="{{ route('dashboard.school-activity.edit', $school_activity->slug) }}" class="btn btn-warning btn-icon-text">
                                <i class="btn-icon-prepend" data-feather="edit"></i>
                                Ubah Kegiatan
                            </a>
                        @endcan
                        @can('school-activity-delete')
                            <form action="{{ route('dashboard.school-activity.destroy', $school_activity->slug) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')">
                                @method('DELETE')
                                @csrf
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="x-square"></i>
                                        Hapus Kegiatan
                                    </button>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <span class="text-uppercase fw-bolder">Background</span>
                                <img src="{{ asset('upload/' . $school_activity->background) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Background">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4 grid-margin">

        </div>
    </div>
@endsection
