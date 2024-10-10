@extends('backend.layouts.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">DASHBOARD {{ auth()->user()->getRoleNames()->first() }} - {{ auth()->user()->name }}</h3>
        </div>
    </div>

    <div class="row">
        @hasanyrole('Super Administrator|Administrator')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-uppercase fw-bolder mb-3">General Setting</h4>
                        <ul class="nav nav-pills nav-fill text-uppercase fw-bolder">
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.web-setting') }}">Web Setting</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.header-setting') }}">Header Setting</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.footer-setting') }}">Footer Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard.links.index') }}">Link Setting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endhasanyrole
        @hasanyrole('Super Administrator|Administrator')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-uppercase fw-bolder mb-3">Homepage</h4>
                        <ul class="nav nav-pills nav-fill text-uppercase fw-bolder">
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.homepage.sliders') }}">Sliders</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.homepage.opening') }}">Opening</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.homepage.headmaster') }}">Headmaster</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard.homepage.testimonials') }}">Testimonials</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endhasanyrole
        @hasanyrole('Super Administrator|Administrator')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-uppercase fw-bolder mb-3">Tentang Kecamatan</h4>
                        <ul class="nav nav-pills nav-fill text-uppercase fw-bolder">
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.about.profile') }}">Profil Kecamatan</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.about.history') }}">Sejarah Kecamatan</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.about.vision-mission.index') }}">Visi & Misi</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.about.serviam.index') }}">Informasi Pelayanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard.about.entrepreneurship') }}">Struktur Organisasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endhasanyrole
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-uppercase fw-bolder mb-3">Berita & Galeri</h4>
                    <ul class="nav nav-pills nav-fill text-uppercase fw-bolder">
                        <li class="nav-item me-3">
                            <a class="nav-link active" href="{{ route('dashboard.post.index') }}">Data Berita & Artikel</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" href="{{ route('dashboard.post.category.index') }}">Kategori Berita & Artikel</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link active" href="{{ route('dashboard.gallery.index') }}">Data Galeri Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard.gallery.category.index') }}">Kategori Galeri Foto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @hasanyrole('Super Administrator|Administrator')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-uppercase fw-bolder mb-3">Pengaturan Lainnya</h4>
                        <ul class="nav nav-pills nav-fill text-uppercase fw-bolder">
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.facilities') }}">Fasilitas Kecamatan</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.school-activity.index') }}">Kegiatan Kecamatan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard.contact') }}">Kontak Kecamatan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endhasanyrole
        @hasanyrole('Super Administrator|Administrator')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-uppercase fw-bolder mb-3">User Management</h4>
                        <ul class="nav nav-pills nav-fill text-uppercase fw-bolder">
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.users.index') }}">Data User</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" href="{{ route('dashboard.roles.index') }}">Data Role</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard.permissions.index') }}">Data Permission</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endhasanyrole
    </div>
@endsection
