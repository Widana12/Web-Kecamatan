@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Galeri Foto</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.gallery.index') }}">Data Galeri Foto</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Galeri Foto</h3>
        </div>
        @canany(['gallery-create', 'gallery-deleted'])
            <div class="d-flex align-items-center text-nowrap flex-wrap">
                @can('gallery-create')
                    <a href="{{ route('dashboard.gallery.create') }}" class="btn btn-primary btn-icon-text mb-md-0 me-2 mb-2">
                        <i class="btn-icon-prepend" data-feather="plus-square"></i>
                        Tambah Data
                    </a>
                @endcan
                @can('gallery-deleted')
                    <a href="{{ route('dashboard.gallery.deleted') }}" class="btn btn-danger btn-icon-text mb-md-0 mb-2">
                        <i class="btn-icon-prepend" data-feather="trash-2"></i>
                        Data Dihapus
                    </a>
                @endcan
            </div>
        @endcanany
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-line nav-fill" id="lineTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bolder" id="all-line-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">SEMUA DATA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder" id="publish-line-tab" data-bs-toggle="tab" href="#publish" role="tab" aria-controls="publish" aria-selected="false">PUBLISH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder" id="not-publish-line-tab" data-bs-toggle="tab" href="#not-publish" role="tab" aria-controls="not-publish" aria-selected="false">
                                BELUM PUBLISH
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Publish</th>
                                            <th>Publish Oleh</th>
                                            <th>Tanggal Publish</th>
                                            @canany(['post-edit', 'post-delete'])
                                                <th width="50px">Action</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galleries as $gallery)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('dashboard.gallery.show', $gallery->slug) }}">{{ $gallery->title }}</a></td>
                                                <td>{{ $gallery->gallery_category->name }}</td>
                                                <td>{{ $gallery->user_create->name }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
                                                <td>{{ $gallery->isPublish == '0' ? 'Belum Publish' : 'Publish' }}</td>
                                                <td>{{ $gallery->publish_by != null ? $gallery->user_publish->name : '--' }}</td>
                                                <td>{{ $gallery->publish_at != null ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->publish_at)->isoFormat('DD MMMM Y HH:mm:ss') : '--' }}</td>
                                                @canany(['gallery-edit', 'gallery-delete'])
                                                    <td>
                                                        @can('gallery-edit')
                                                            <a href="{{ route('dashboard.gallery.edit', $gallery->slug) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('gallery-delete')
                                                            <form action="{{ route('dashboard.gallery.delete', $gallery->slug) }}" method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-xs" title="HAPUS DATA">
                                                                    <i data-feather="x-square"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                @endcanany
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Publish Oleh</th>
                                            <th>Tanggal Publish</th>
                                            @canany(['post-edit', 'post-delete'])
                                                <th width="50px">Action</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($p_galleries as $gallery)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('dashboard.gallery.show', $gallery->slug) }}">{{ $gallery->title }}</a></td>
                                                <td>{{ $gallery->gallery_category->name }}</td>
                                                <td>{{ $gallery->user_create->name }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
                                                <td>{{ $gallery->publish_by != null ? $gallery->user_publish->name : '--' }}</td>
                                                <td>{{ $gallery->publish_at != null ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->publish_at)->isoFormat('DD MMMM Y HH:mm:ss') : '--' }}</td>
                                                @canany(['gallery-edit', 'gallery-delete'])
                                                    <td>
                                                        @can('gallery-edit')
                                                            <a href="{{ route('dashboard.gallery.edit', $gallery->slug) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('gallery-delete')
                                                            <form action="{{ route('dashboard.gallery.delete', $gallery->slug) }}" method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-xs" title="HAPUS DATA">
                                                                    <i data-feather="x-square"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                @endcanany
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="not-publish" role="tabpanel" aria-labelledby="not-publish-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Tanggal Dibuat</th>
                                            @canany(['post-edit', 'post-delete'])
                                                <th width="50px">Action</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($np_galleries as $gallery)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('dashboard.gallery.show', $gallery->slug) }}">{{ $gallery->title }}</a></td>
                                                <td>{{ $gallery->gallery_category->name }}</td>
                                                <td>{{ $gallery->user_create->name }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
                                                @canany(['gallery-edit', 'gallery-delete'])
                                                    <td>
                                                        @can('gallery-edit')
                                                            <a href="{{ route('dashboard.gallery.edit', $gallery->slug) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('gallery-delete')
                                                            <form action="{{ route('dashboard.gallery.delete', $gallery->slug) }}" method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-xs" title="HAPUS DATA">
                                                                    <i data-feather="x-square"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                @endcanany
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $(document).ready(function() {
            $("table.display").DataTable({
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"],
                ],
                iDisplayLength: 10,
                language: {
                    search: "",
                },
                "drawCallback": function(settings) {
                    feather.replace();
                }
            });
            $("table.display").each(function() {
                var datatable = $(this);
                var search_input = datatable
                    .closest(".dataTables_wrapper")
                    .find("div[id$=_filter] input");
                search_input.attr("placeholder", "Search");
                search_input.removeClass("form-control-sm");
                var length_sel = datatable
                    .closest(".dataTables_wrapper")
                    .find("div[id$=_length] select");
                length_sel.removeClass("form-control-sm");
            });
        });
    </script>
@endpush
