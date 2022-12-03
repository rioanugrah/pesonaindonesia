<footer style="background-color: #1b1b1b" class="footer footer-fixed">
{{-- <footer style="background-image: url({{ $asset.'/img/bg.jpg' }})" class="footer footer-fixed"> --}}
    <div class="container">
        <div class="row pb-100 pb-md-40">
            <!-- widget footer-->
            <div class="col-md-3 col-sm-3 mb-sm-30">
                <div class="logo-soc clearfix">
                    <div class="footer-logo"><a href="{{ url('/') }}"><img src="{{ $asset . '/img/logo_plesiran_new_white.png' }}"
                                data-at2x="{{ $asset . '/img/logo_plesiran_new_white.png' }}" width="220" alt></a></div>
                </div>
                <h4>PARTNER PEMBAYARAN</h4>
                <br class="mb-sm-30">
                <div class="grid-payment">
                    <img src="{{ $asset.'/img/logo_payment/bca.webp' }}" class="item1" alt="" srcset="">
                    <img src="{{ $asset.'/img/logo_payment/bni.webp' }}" class="item2" alt="" srcset="">
                    <img src="{{ $asset.'/img/logo_payment/bri.webp' }}" class="item3" alt="" srcset="">
                    <img src="{{ $asset.'/img/logo_payment/mandiri.webp' }}" class="item4" alt="" srcset="">
                    {{-- <img src="{{ $asset.'/img/logo_payment/jenius.webp' }}" class="item5" alt="" srcset=""> --}}
                </div>
                {{-- <p class="color-g2 mt-10" style="text-align: justify">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                    menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi,
                    Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p> --}}
                <!-- social-->
                <a href="{{ route('frontend.partnership') }}" class="button-btn fourth mt-sm-30"><img src="{{ asset('frontend/assets4/img/team.png') }}" alt="" srcset=""></a>
            </div>
            <div class="col-md-3 col-sm-3 mb-sm-30">
                <div class="widget-footer">
                    <h4>CONTACT PERSON</h4>
                    <ul class="text-white">
                        <li class="text-white">
                            <a href="tel:081331126991"><i class="fas fa-phone-alt"></i> 0813-3112-6991</a>
                        </li>
                        <li class="text-white">
                            <a href="mailto:business@plesiranindonesia.com"><i class="fas fa-envelope"></i> business@plesiranindonesia.com</a>
                        </li>
                        <li class="text-white">
                            <i class="fas fa-map-marker-alt"></i> Jl. Raya Tlogowaru No. 3, Tlogowaru
                            Kec. Kedungkandang, Kota Malang,
                            Jawa Timur
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 mb-sm-30">
                <div class="widget-footer">
                    <h4>PERUSAHAAN</h4>
                    <ul class="text-white">
                        <li class="text-white">
                            <a href="{{ route('tentang_kami') }}">Tentang Kami</a>
                        </li>
                        <li class="text-white">
                            <a href="{{ route('tim_kami') }}">Our Team</a>
                        </li>
                        <li class="text-white">
                            <a href="{{ route('kontak') }}">Kontak Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 mb-sm-30">
                <div class="widget-footer">
                    <h4>PRODUK</h4>
                    <ul class="text-white">
                        <li class="text-white">
                            <a href="{{ route('frontend.paket') }}">Paket Wisata</a>
                        </li>
                        {{-- <li class="text-white">
                            <a href="{{ route('frontend.hotel') }}">Hotel</a>
                        </li> --}}
                        {{-- <li class="text-white">
                            <a href="{{ route('frontend.wisata') }}">Wisata</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="widget-footer">
                    <h4>LAINNYA</h4>
                    <ul class="text-white">
                        <li class="text-white">
                            <a href="{{ route('frontend.blog') }}">Blog</a>
                        </li>
                        <li class="text-white">
                            <a href="{{ route('frontend.kebijakan_privasi') }}">Kebijakan Privasi</a>
                        </li>
                        <li class="text-white">
                            <a href="#">Syarat & Ketentuan</a>
                        </li>
                        <li class="text-white">
                            <a href="{{ route('frontend.tracking') }}">Cek Tiket</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end widget footer-->
        </div>
    </div>
    <!-- copyright-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Copyright © @if (date('Y')<2021)
                        2021
                        @else
                        2021 - {{ date('Y') }}
                        @endif
                        <span>CV Pesona Plesiran Indonesia</span> &nbsp;&nbsp;|&nbsp;&nbsp; All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright-->
    <!-- scroll top-->
</footer>