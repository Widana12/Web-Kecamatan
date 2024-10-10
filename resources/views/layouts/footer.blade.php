<footer>
    <div class="footer__area footer-bg">
        <div class="footer__top pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <div class="footer__logo">
                                    <a href="{{ route('index') }}">
                                        <img src="{{ asset('upload/' . $setting->footer_logo) }}" alt="Logo Footer">
                                    </a>
                                </div>
                            </div>
                            <div class="footer__widget-body">
                                <p>
                                    {!! $setting->footer_content !!}
                                </p>
                                <div class="footer__social">
                                    <ul>
                                        <li><a href="{{ $setting->facebook_link }}" class="facebook" target="__blank"><i class="social_facebook"></i></a></li>
                                        <li><a href="{{ $setting->instagram_link }}" class="instagram" target="__blank"><i class="social_instagram"></i></a></li>
                                        <li><a href="{{ $setting->youtube_link }}" class="youtube" target="__blank"><i class="social_youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Tentang Kecamatan</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="{{ route('profil') }}">Profil Kecamatan</a></li>
                                        <li><a href="{{ route('sejarah') }}">Sejarah Kecamatan</a></li>
                                        <li><a href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                                        <li><a href="{{ route('serviam') }}">Informasi Pelayanan</a></li>
                                        <li><a href="{{ route('entrepreneurship') }}">Struktur Organisasi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-sm-1 col-sm-5 col-xs-12">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Link Terkait</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        @foreach ($links as $link)
                                            <li><a href="{{ $link->web_link }}" target="__blank">{{ $link->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="footer__copyright text-center">
                            <p>
                                © {{ date('Y') }} Kantor Kecamatan Payangan | Developed By <a href="https://santaursula-bdg.sch.id/" target="__blank">IT YPB</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
