@extends('backend.layouts.master')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">User Management</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.users.index') }}">Data User</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data User</h3>
        </div>
        @can('user-create')
            <div class="d-flex align-items-center text-nowrap flex-wrap">
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary btn-icon-text mb-md-0 mb-2">
                    <i class="btn-icon-prepend" data-feather="plus-square"></i>
                    Tambah Data
                </a>
            </div>
        @endcan
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
                                    <th>Slug</th>
                                    <th>Username</th>
                                    <th>Last Login</th>
                                    <th>Roles</th>
                                    @canany(['user-edit', 'user-delete'])
                                        <th width="50px">Aksi</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->slug }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->last_login != null ? \Carbon\Carbon::createFromFormat('Y-m-d', $user->last_login)->isoFormat('DD MMMM Y') : '' }}</td>
                                        <td>
                                            @foreach ($user->getRoleNames() as $role)
                                                {{ $role }}
                                            @endforeach
                                        </td>
                                        @canany(['user-edit', 'user-delete'])
                                            <td>
                                                @can('user-edit')
                                                    @if (auth()->user()->getRoleNames()->first() != 'Super Administrator' && $role == 'Super Administrator')
                                                        <a href="{{ route('dashboard.users.edit', $user->token) }}" class="btn btn-warning btn-icon btn-xs me-1 disabled" aria-disabled="true" title="UBAH DATA">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('dashboard.users.edit', $user->token) }}" class="btn btn-warning btn-icon btn-xs me-1" title="UBAH DATA">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    @endif
                                                @endcan
                                                @can('user-delete')
                                                    <form action="{{ route('dashboard.users.destroy', $user->token) }}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        @if (auth()->user()->getRoleNames()->first() != 'Super Administrator' && $role == 'Super Administrator')
                                                            <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-xs" disabled title="HAPUS DATA">
                                                                <i data-feather="x-square"></i>
                                                            </button>
                                                        @else
                                                            <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-xs" title="HAPUS DATA">
                                                                <i data-feather="x-square"></i>
                                                            </button>
                                                        @endif
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
