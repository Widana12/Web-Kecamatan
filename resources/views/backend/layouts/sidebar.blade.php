<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard.index') }}" class="sidebar-brand">
            <h4>Kecamatan Payangan</h4>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item {{ active_class(['dashboard']) }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link" target="__blank">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Halaman Website</span>
                </a>
            </li>

            @hasanyrole('Super Administrator|Administrator')
                <li
                    class="nav-item {{ active_class(['dashboard/web-setting', 'dashboard/web-setting/*', 'dashboard/header-setting', 'dashboard/header-setting/*', 'dashboard/footer-setting', 'dashboard/footer-setting/*', 'dashboard/links', 'dashboard/links/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#general-setting" role="button" aria-expanded="false" aria-controls="general-setting">
                        <i class="link-icon" data-feather="layout"></i>
                        <span class="link-title">General Setting</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div id="general-setting"
                        class="collapse {{ show_class(['dashboard/web-setting', 'dashboard/web-setting/*', 'dashboard/header-setting', 'dashboard/header-setting/*', 'dashboard/footer-setting', 'dashboard/footer-setting/*', 'dashboard/links', 'dashboard/links/*']) }}">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.web-setting') }}" class="nav-link {{ active_class(['dashboard/web-setting', 'dashboard/web-setting/*']) }}">
                                    Web Setting
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.header-setting') }}" class="nav-link {{ active_class(['dashboard/header-setting', 'dashboard/header-setting/*']) }}">
                                    Header Setting
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.footer-setting') }}" class="nav-link {{ active_class(['dashboard/footer-setting', 'dashboard/footer-setting/*']) }}">
                                    Footer Setting
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.links.index') }}" class="nav-link {{ active_class(['dashboard/links', 'dashboard/links/*']) }}">
                                    Link Setting
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ active_class(['dashboard/homepage', 'dashboard/homepage/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#homepage" role="button" aria-expanded="false" aria-controls="homepage">
                        <i class="link-icon" data-feather="columns"></i>
                        <span class="link-title">Homepage</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div id="homepage" class="collapse {{ show_class(['dashboard/homepage', 'dashboard/homepage/*']) }}">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.homepage.sliders') }}" class="nav-link {{ active_class(['dashboard/homepage/sliders', 'dashboard/homepage/sliders/*']) }}">
                                    Sliders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.homepage.opening') }}" class="nav-link {{ active_class(['dashboard/homepage/opening', 'dashboard/homepage/opening/*']) }}">
                                    Opening
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.homepage.headmaster') }}" class="nav-link {{ active_class(['dashboard/homepage/headmaster', 'dashboard/homepage/headmaster/*']) }}">
                                    Headmaster
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.homepage.testimonials') }}" class="nav-link {{ active_class(['dashboard/homepage/testimonials', 'dashboard/homepage/testimonials/*']) }}">
                                    Testimonials
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ active_class(['dashboard/about', 'dashboard/about/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#about" role="button" aria-expanded="false" aria-controls="about">
                        <i class="link-icon" data-feather="table"></i>
                        <span class="link-title">Tentang Kecamatan</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div id="about" class="collapse {{ show_class(['dashboard/about', 'dashboard/about/*']) }}">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.about.profile') }}" class="nav-link {{ active_class(['dashboard/about/profile', 'dashboard/about/profile/*']) }}">
                                    Profil Kecamatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.about.history') }}" class="nav-link {{ active_class(['dashboard/about/history', 'dashboard/about/history/*']) }}">
                                    Sejarah Kecamatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.about.vision-mission.index') }}" class="nav-link {{ active_class(['dashboard/about/vision-mission', 'dashboard/about/vision-mission/*']) }}">
                                    Visi & Misi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.about.serviam.index') }}" class="nav-link {{ active_class(['dashboard/about/serviam', 'dashboard/about/serviam/*']) }}">
                                    Informasi Pelayanan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.about.entrepreneurship') }}"
                                    class="nav-link {{ active_class(['dashboard/about/entrepreneurship', 'dashboard/about/entrepreneurship/*']) }}">
                                    Struktur Organisasi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endhasanyrole

            <li class="nav-item {{ active_class(['dashboard/post', 'dashboard/post/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="post">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Berita & Artikel</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div id="post" class="collapse {{ show_class(['dashboard/post', 'dashboard/post/*']) }}">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.post.index') }}" class="nav-link {{ active_class(['dashboard/post']) }}">
                                Berita & Artikel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.post.category.index') }}" class="nav-link {{ active_class(['dashboard/post/category', 'dashboard/post/category/*']) }}">
                                Kategori
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ active_class(['dashboard/gallery', 'dashboard/gallery/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#gallery" role="button" aria-expanded="false" aria-controls="gallery">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Galeri Foto</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div id="gallery" class="collapse {{ show_class(['dashboard/gallery', 'dashboard/gallery/*']) }}">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.gallery.index') }}" class="nav-link {{ active_class(['dashboard/gallery']) }}">
                                Galeri Foto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.gallery.category.index') }}" class="nav-link {{ active_class(['dashboard/gallery/category', 'dashboard/gallery/category/*']) }}">
                                Kategori
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @hasanyrole('Super Administrator|Administrator')
                <li class="nav-item {{ active_class(['dashboard/facilities', 'dashboard/facilities/*']) }}">
                    <a href="{{ route('dashboard.facilities') }}" class="nav-link">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Fasilitas Kecamatan</span>
                    </a>
                </li>

                <li class="nav-item {{ active_class(['dashboard/school-activity', 'dashboard/school-activity/*']) }}">
                    <a href="{{ route('dashboard.school-activity.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="sun"></i>
                        <span class="link-title">Kegiatan Kecamatan</span>
                    </a>
                </li>

                <li class="nav-item {{ active_class(['dashboard/contact', 'dashboard/contact/*']) }}">
                    <a href="{{ route('dashboard.contact') }}" class="nav-link">
                        <i class="link-icon" data-feather="phone-call"></i>
                        <span class="link-title">Kontak Kecamatan</span>
                    </a>
                </li>

                <li class="nav-item {{ active_class(['dashboard/users', 'dashboard/users/*', 'dashboard/roles', 'dashboard/roles/*', 'dashboard/permissions', 'dashboard/permissions/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">User Management</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div id="users"
                        class="collapse {{ show_class(['dashboard/users', 'dashboard/users/*', 'dashboard/roles', 'dashboard/roles/*', 'dashboard/permissions', 'dashboard/permissions/*']) }}">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.users.index') }}" class="nav-link {{ active_class(['dashboard/users', 'dashboard/users/*']) }}">
                                    Data User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.roles.index') }}" class="nav-link {{ active_class(['dashboard/roles', 'dashboard/roles/*']) }}">
                                    Data Role
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.permissions.index') }}" class="nav-link {{ active_class(['dashboard/permissions', 'dashboard/permissions/*']) }}">
                                    Data Permission
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endhasanyrole
        </ul>
    </div>
</nav>
