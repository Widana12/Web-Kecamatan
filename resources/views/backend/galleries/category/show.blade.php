@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Berita & Artikel</li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.post.category.index') }}">Data Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ $category->name }}</h3>
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
                                    <th>Judul</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Status Publish</th>
                                    <th>Publish Oleh</th>
                                    <th>Tanggal Publish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gallery->title }}</td>
                                        <td>{{ $gallery->user_create->name }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                        <td>{{ $gallery->isPublish == 0 ? 'Belum Publish' : 'Publish' }}</td>
                                        <td>{{ $gallery->isPublish == 1 ? $gallery->user_publish->name : '--' }}</td>
                                        <td>{{ $gallery->isPublish == 1 ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gallery->publish_at)->isoFormat('DD MMMM Y HH:MM') : '--' }}</td>
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
