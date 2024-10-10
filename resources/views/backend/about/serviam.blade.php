@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Tentang Kecamatan Payangan</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.about.serviam.index') }}">Informasi Pelayanan</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Informasi Pelayanan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-line nav-fill" id="lineTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bolder" id="description-line-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
                                DESKRIPSI
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder" id="value-line-tab" data-bs-toggle="tab" href="#value" role="tab" aria-controls="value" aria-selected="false">PELAYANAN</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-line-tab">
                            <form action="{{ route('dashboard.about.serviam.description.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="name" value="{{ $serviamDescription->name }}">
                                <div class="row mb-4">
                                    <label for="background" class="fw-bolder text-uppercase mb-2">Background</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="background" id="background" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                        <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                        <small>* Width -- Height : 1920px -- 950px</small>
                                        @error('background')
                                            <br><small class="text-danger">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" name="oldBackground" value="{{ $serviamDescription->background }}">
                                        <img src="{{ asset('upload/' . $serviamDescription->background) }}" class="card-img-top w-100" style="border-radius: 0px;" alt="Background">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label for="content" class="fw-bolder text-uppercase mb-2">Konten</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="10">{{ old('content', $serviamDescription->content) }}</textarea>
                                        @error('content')
                                            <small class="text-danger">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="value" role="tabpanel" aria-labelledby="value-line-tab">
                            @can('serviam-value-create')
                                <div class="d-grid text-nowrap flex-wrap gap-2">
                                    <a href="{{ route('dashboard.about.serviam.value.create') }}" class="btn btn-primary btn-icon-text mb-md-0 mb-2">
                                        <i class="btn-icon-prepend" data-feather="plus-square"></i>
                                        Tambah Pelayanan
                                    </a>
                                </div>
                            @endcan
                            <hr>
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Nama</th>
                                            <!-- <th>Deskripsi</th> -->
                                            @canany(['serviam-value-edit', 'serviam-value-delete'])
                                                <th width="50px">Aksi</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($serviamValues as $serviamValue)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $serviamValue->name }}</td>
                                                <!-- <td>{{ $serviamValue->content }}</td> -->
                                                @canany(['serviam-value-edit', 'serviam-value-delete'])
                                                    <td>
                                                        @can('serviam-value-edit')
                                                            <a href="{{ route('dashboard.about.serviam.value.edit', $serviamValue->token) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        @endcan
                                                        @can('serviam-value-delete')
                                                            <form action="{{ route('dashboard.about.serviam.value.delete', $serviamValue->token) }}" method="POST" class="d-inline">
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
    <script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script src="{{ asset('vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $(function() {
            'use strict'

            $('#background').dropify();

            CKEDITOR.replace('content', {
                filebrowserImageBrowseUrl: '/dashboard/filemanager?type=Images',
                filebrowserImageUploadUrl: '/dashboard/filemanager/upload?type=Images&_token={{ csrf_token() }}',
                filebrowserBrowseUrl: '/dashboard/filemanager?type=Files',
                filebrowserUploadUrl: '/dashboard/filemanager/upload?type=Files&_token={{ csrf_token() }}',
                height: 300
            });
        });

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
