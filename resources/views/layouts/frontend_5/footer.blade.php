{{-- <?php 
    try {
        $fields = 'id,media_type,media_url,caption,username,timestamp';
        $accessToken = env('IG_TOKEN_PM');
        $limit = 9;
        $galleryLink = new HTTP_Request2();
        $galleryLink->setUrl('https://graph.instagram.com/me/media?fields='.$fields.'&'.'access_token='.$accessToken.'&'.'limit='.$limit);
        $galleryLink->setMethod(HTTP_Request2::METHOD_GET);
        $galleryLink->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $response = $galleryLink->send();
        if ($response->getStatus() == 200) {
            $dataUrl = json_decode($response->getBody(),true);
            $plesiran_malangs = $dataUrl;
        }else {
            $plesiran_malangs = null;
        }
    } catch (\Throwable $th) {
        $plesiran_malangs['data'] = [];
    }
?> --}}
{{-- <footer class="pt-20 pb-4"  style="background-image: url({{ $assets }}/images/background_pattern.png);"> --}}
    <footer class="pt-20 pb-4">
    <div class="section-shape top-0" style="background-image: url({{ $assets }}/images/shape8.png);"></div>
    {{-- <div class="insta-main pb-10">
        <div class="container">
            <div class="insta-inner">
                <div class="follow-button">
                    <h5 class="m-0 rounded"><i class="fab fa-instagram"></i> Follow on Instagram plesiranmalang.id</h5>
                </div>
                <div class="row attract-slider">
                    @forelse ($plesiran_malangs['data'] as $pm)
                        @if ($pm['media_type'] == 'IMAGE')
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href="{{ $pm['media_url'] }}" target="_blank"><img src="{{ $pm['media_url'] }}" alt></a>
                            </div>
                        </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>    
        </div>
    </div> --}}
    <!-- Instagram ends -->
    <div class="footer-upper pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 pe-4">
                    <div class="footer-about">
                        <img src="{{ $assets }}/images/logo_plesiran_new_white.png" alt="">
                        {{-- <p class="mt-3 mb-3 white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque iaculis molestie sagittis maecenas aenean eget molestie sagittis.
                        </p> --}}
                        <ul class="mt-3 mb-3">
                            <li class="white"><strong>Whatsapp:</strong> 0813-3112-6991</li>
                            <li class="white"><strong>Location:</strong> Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota Malang, Jawa Timur</li>
                            <li class="white"><strong>Email:</strong> business@plesiranindonesia.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Perusahaan</h3>
                        <ul>
                            <li><a href="{{ route('tentang_kami') }}">Tentang Kami</a></li>
                            <li><a href="{{ route('tim_kami') }}">Our Team</a></li>
                            <li><a href="{{ route('kontak') }}">Kontak Kami</a></li>
                            <li><a href="{{ route('frontend.kebijakan_privasi') }}">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Lainnya</h3>
                        <ul>
                          <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                          <li><a href="javascript:void()">Jadi Partner Kami</a></li>
                          {{-- <li><a href="javascript:void()">Gallery</a></li>
                          <li><a href="javascript:void()">Syarat & Ketentuan</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Produk</h3>
                        <ul>
                          {{-- <li><a href="{{ route('frontend.paket') }}">Paket</a></li> --}}
                          <li><a href="{{ route('frontend.travelling') }}">Travelling</a></li>
                          {{-- <li><a href="javascript:void()">Gallery</a></li>
                          <li><a href="javascript:void()">Syarat & Ketentuan</a></li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Newsletter</h3>
                        <div class="newsletter-form ">
                            <p class="mb-3">Jin our community of over 200,000 global readers who receives emails filled with news, promotions, and other good stuff.</p>
                            <form action="#" method="get" accept-charset="utf-8" class="border-0 d-flex align-items-center">
                                <input type="text" placeholder="Email Address">
                                <button class="nir-btn ms-2">Subscribe</button>
                            </form>
                        </div> 
                    </div>  
                </div> --}}
            </div>
        </div>
    </div>

    <div class="footer-payment">
        <div class="container">
            <div class="row footer-pay align-items-center justify-content-between text-lg-start text-center">
                <div class="col-lg-8 footer-payment-nav mb-4">
                    <ul class="">
                        <li class="me-2">Payment Partner:</li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/bca.webp" alt="bca" width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/bni.webp" alt="bni" width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/bri.webp" alt="bri" width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/mandiri.webp" alt="mandiri" width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                    </ul>
                </div>
            </div>    
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                <div class="copyright-text">
                    <p class="m-0 white">Copyright © @if (date('Y')<2021)
                        2021
                        @else
                        2021 - {{ date('Y') }}
                        @endif Pesona Plesiran Indonesia. All rights reserved.</p>
                </div>
                <div class="social-links">
                    <ul>
                        <li><a href="https://www.instagram.com/pesonaplesiranid.official/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>    
        </div>
    </div>
    <div id="particles-js"></div>
</footer>