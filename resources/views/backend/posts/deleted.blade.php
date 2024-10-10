@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Berita & Artikel</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.post.index') }}">Data Berita & Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Dihapus</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Dihapus</h3>
        </div>
        <div class="d-flex align-items-center text-nowrap flex-wrap">
            <a href="{{ route('dashboard.post.restoreAll') }}" class="btn btn-primary btn-icon-text mb-md-0 me-2 mb-2">
                <i class="btn-icon-prepend" data-feather="corner-down-left"></i>
                Kembalikan Semua Data
            </a>
            <a href="{{ route('dashboard.post.deletePermanentAll') }}" class="btn btn-danger btn-icon-text mb-md-0 mb-2">
                <i class="btn-icon-prepend" data-feather="delete"></i>
                Hapus Permanen Semua Data
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-hover table-striped table-bordered display table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Dihapus</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->post_category->name }}</td>
                                        <td>{{ $post->user_create->name }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->deleted_at)->isoFormat('DD MMMM Y HH:mm:ss') }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.post.restore', $post->slug) }}" class="btn btn-warning btn-icon btn-xs me-1" title="KEMBALIKAN DATA">
                                                <i data-feather="corner-down-left"></i>
                                            </a>
                                            <a href="{{ route('dashboard.post.deletePermanent', $post->slug) }}" class="btn btn-danger btn-icon btn-xs me-1" title="HAPUS PERMANEN DATA">
                                                <i data-feather="delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
