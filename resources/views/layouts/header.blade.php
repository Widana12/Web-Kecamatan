<header>
    <div id="header-sticky"
        class="header__area {{ Request::segment(1) == 'berita-artikel' || Request::segment(1) == 'galeri-foto' ? 'header__padding-2 header__shadow' : 'header__transparent header__padding' }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="header__left d-flex">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img class="logo-white"
                                    src="{{ Request::segment(1) == 'berita-artikel' || Request::segment(1) == 'galeri-foto' ? asset('upload/' . $setting->header_logo_black) : asset('upload/' . $setting->header_logo_white) }}"
                                    alt="Logo White">
                                <img class="logo-black"
                                    src="{{ Request::segment(1) == 'berita-artikel' || Request::segment(1) == 'galeri-foto' ? asset('upload/' . $setting->header_logo_white) : asset('upload/' . $setting->header_logo_black) }}"
                                    alt="Logo Black">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 d-none d-xl-block">
                    <div class="main-menu {{ Request::segment(1) == 'berita-artikel' || Request::segment(1) == 'galeri-foto' ? 'main-menu' : 'main-menu-3' }}">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li class="has-dropdown">
                                    <a href="#" disabled="disabled">Tentang Kecamatan</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('profil') }}">Profil Kecamatan</a></li>
                                        <li><a href="{{ route('sejarah') }}">Sejarah Kecamatan</a></li>
                                        <li><a href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                                        <li><a href="{{ route('serviam') }}">Informasi Pelayanan</a></li>
                                        <li><a href="{{ route('entrepreneurship') }}">Struktur Organisasi</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('fasilitas') }}">Fasilitas</a></li>
                                <li class="has-dropdown">
                                    <a href="#" disabled="disabled">Berita & Galeri</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('posts') }}">Berita & Artikel</a></li>
                                        <li><a href="{{ route('galleries') }}">Galeri Foto</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#" disabled="disabled">Kegiatan Kecamatan</a>
                                    <ul class="submenu">
                                        @foreach ($school_activities as $activity)
                                            <li><a href="{{ route('school-activity', $activity->slug) }}">{{ $activity->sub_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('kontak') }}">Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-1 col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="header__right d-flex justify-content-end align-items-center">
                        <div class="sidebar__menu d-xl-none">
                            <div class="sidebar-toggle-btn {{ Request::segment(1) == 'berita-artikel' || Request::segment(1) == 'galeri-foto' ? 'sidebar-toggle-btn-black' : 'sidebar-toggle-btn-white' }} ml-30"
                                id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="sidebar__area">
    <div class="sidebar__wrapper">
        <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn">
                <span><i class="fal fa-times"></i></span>
                <span>Close</span>
            </button>
        </div>
        <div class="sidebar__content">
            <div class="mobile-menu fix mt-50"></div>
            <div class="sidebar__button p-relative d-grid mt-40">
                <a href="{{ $setting->psb_link }}" target="__blank">{{ $setting->psb_name }}</a>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
