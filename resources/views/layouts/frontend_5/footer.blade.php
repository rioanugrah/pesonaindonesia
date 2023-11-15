{{-- <?php
try {
    $fields = 'id,media_type,media_url,caption,username,timestamp';
    $accessToken = env('IG_TOKEN_PM');
    $limit = 9;
    $galleryLink = new HTTP_Request2();
    $galleryLink->setUrl('https://graph.instagram.com/me/media?fields=' . $fields . '&' . 'access_token=' . $accessToken . '&' . 'limit=' . $limit);
    $galleryLink->setMethod(HTTP_Request2::METHOD_GET);
    $galleryLink->setConfig([
        'follow_redirects' => true,
    ]);
    $response = $galleryLink->send();
    if ($response->getStatus() == 200) {
        $dataUrl = json_decode($response->getBody(), true);
        $plesiran_malangs = $dataUrl;
    } else {
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
                            {{-- <li class="white"><strong>Whatsapp Office:</strong> 0813-3112-6991</li>
                            <li class="white"><strong>Whatsapp Admin:</strong> 0858-6722-4494</li> --}}
                            <li class="white"><strong>Lokasi:</strong> Jl. Raya Tlogowaru No. 3, Tlogowaru Kec.
                                Kedungkandang, Kota Malang, Jawa Timur</li>
                            <li class="white"><strong>Email:</strong> business@plesiranindonesia.com</li>
                            <li>
                                <a href="https://wa.me/6281331126991">
                                    <strong><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="#ffffff" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg></strong>
                                    <span class="white">Office : 0813-3112-6991</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/6285867224494">
                                    <strong>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="#ffffff" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                        </svg>
                                    </strong>
                                    <span class="white">Admin : 0858-6722-4494</span>
                                </a>
                            </li>
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
                            <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                            <li><a href="{{ route('partnership') }}">Jadi Partner Kami</a></li>
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
                            <li><a href="#">Honeymoon</a></li>
                            {{-- <li><a href="{{ route('frontend.sewa_bus') }}">Sewa Bus / Bus Pariwisata</a></li> --}}
                            {{-- <li><a href="#">Rental Mobil</a></li> --}}
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
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/bca.webp" alt="bca"
                                width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/bni.webp" alt="bni"
                                width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/bri.webp" alt="bri"
                                width="80" style="filter: brightness(0) invert(1);" srcset=""></li>
                        <li class="me-2"><img src="{{ $assets }}/images/logo_payment/mandiri.webp"
                                alt="mandiri" width="80" style="filter: brightness(0) invert(1);" srcset="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                <div class="copyright-text">
                    <p class="m-0 white">Copyright © @if (date('Y') < 2021)
                            2021
                        @else
                            2021 - {{ date('Y') }}
                        @endif Pesona Plesiran Indonesia. All rights reserved.</p>
                </div>
                <div class="social-links">
                    <ul>
                        <li><a href="https://www.instagram.com/pesonaplesiranid.official/"><i class="fab fa-instagram"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</footer>
