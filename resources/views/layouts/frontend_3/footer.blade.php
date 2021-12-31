<footer id="colophon" class="site-footer footer-primary">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_text">
                        <h3 class="widget-title">
                            TENTANG KAMI
                        </h3>
                        <div class="textwidget widget-text">
                            Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                            menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi,
                            Destinasi, Restoran Transportasi, Travel dan MICE se Indonesia.
                        </div>
                        <div class="award-img">
                            <a href="#"><img src="assets/images/logo6.png" alt=""></a>
                            <a href="#"><img src="assets/images/logo2.png" alt=""></a>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_text">
                        <h3 class="widget-title">CONTACT PERSON</h3>
                        <div class="textwidget widget-text">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-phone-alt"></i>
                                        -
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:business@plesiranindonesia.com">
                                        <i class="fas fa-envelope"></i>
                                        business@plesiranindonesia.com
                                    </a>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    Jl. Raya Tlogowaru No. 3, Tlogowaru
                                    Kec. Kedungkandang, Kota Malang,
                                    Jawa Timur
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_text">
                        <h3 class="widget-title">PERUSAHAAN</h3>
                        <div class="textwidget widget-text">
                            <ul>
                                <li>
                                    <a href="{{ route('tentang_kami') }}">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="{{ route('tim_kami') }}">Tim Kami</a>
                                </li>
                                <li>
                                    <a href="{{ route('visi_misi') }}">Visi & Misi</a>
                                </li>
                                <li>
                                    <a href="{{ route('kontak') }}">Kontak Kami</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.partnership') }}" class="button-btn fourth"><img src="{{ asset('frontend/assets3/images/team.png') }}" width="185" alt="" srcset=""></a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_text">
                        <h3 class="widget-title">LAINNYA</h3>
                        <div class="textwidget widget-text">
                            <ul>
                                <li>
                                    <a href="#">Kebijakan Privasi</a>
                                    <a href="#">Syarat & Ketentuan</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="buttom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="footer-menu">
                        <ul>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Term & Condition</a>
                            </li>
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="footer-logo">
                        <a href="{{ url('/') }}"><img src="{{ $asset . '/images/logo_plesiran_new_white.png' }}" alt=""></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="copy-right text-right">
                        Copyright © @if (date('Y')>2021)
                        2021
                        @else
                        2021 - {{ date('Y') }}
                        @endif
                        CV Pesona Plesiran Indonesia</div>
                </div>
            </div>
        </div>
    </div>
</footer>