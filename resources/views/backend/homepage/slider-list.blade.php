@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Homepage Setting</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.homepage.sliders') }}">Data Slider</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Slider</h3>
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
                                    <th>Sub Judul 1</th>
                                    <th>Judul</th>
                                    <th>Sub Judul 2</th>
                                    <th>Background</th>
                                    <!-- <th>Tombol</th> -->
                                    @can('slider-edit')
                                        <th width="50px">Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->sub_title1 }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->sub_title2 }}</td>
                                        <td><a href="{{ asset('upload/' . $slider->background) }}" target="__blank">BACKGROUND</a></td>
                                        <!-- <td><a href="{{ $slider->button_link }}" target="__blank">{{ $slider->button_name }}</a></td> -->
                                        @can('slider-edit')
                                            <td>
                                                <a href="{{ route('dashboard.homepage.slider.edit', $slider->token) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                    <i data-feather="edit"></i>
                                                </a>
                                            </td>
                                        @endcan
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
