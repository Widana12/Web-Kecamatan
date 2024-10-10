@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Link Setting</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Link Setting</h3>
        </div>
        <div class="d-flex align-items-center text-nowrap flex-wrap">
            <a href="{{ route('dashboard.links.create') }}" class="btn btn-primary btn-icon-text mb-md-0 mb-2">
                <i class="btn-icon-prepend" data-feather="plus-square"></i>
                Tambah Data
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
                                    <th width="50px">No</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th width="50px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $link->name }}</td>
                                        <td>{{ $link->web_link }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.links.edit', $link->token) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.links.destroy', $link->token) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-xs" title="HAPUS DATA">
                                                    <i data-feather="x-square"></i>
                                                </button>
                                            </form>
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
