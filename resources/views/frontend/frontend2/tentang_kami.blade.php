@extends('layouts.frontend_3.app')

@section('title')
    Tentang Kami
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url(assets/images/inner-banner.jpg);">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">@yield('title')</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <section class="about-section about-page-section">
        <div class="about-service-wrap">
            <div class="container">
                <div class="section-heading">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <h5 class="dash-style">GALERI KAMI</h5>
                            <h2>HELLO. PESONA PLESIRAN INDONESIA</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-disc">
                                <p>Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                                    menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi,
                                    Destinasi, Restoran Transportasi, Travel dan MICE se Indonesia.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-service-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-service">
                                <div class="about-service-icon">
                                    <img src="{{ asset('frontend/assets3/images/icon16.png') }}" alt="">
                                </div>
                                <div class="about-service-content">
                                    <h4>DESTINATION</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-service">
                                <div class="about-service-icon">
                                    <img src="{{ asset('frontend/assets3/images/icon17.png') }}" alt="">
                                </div>
                                <div class="about-service-content">
                                    <h4>PERSONAL SERVICE</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-video-wrap" style="background-image: url({{ asset('frontend/assets3/images/img25.jpg') }});">
                    <div class="video-button">
                        <a id="video-container" data-video-id="IUN664s7N-c">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- client section html start -->
        <div class="client-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="section-heading text-center">
                            <h5 class="dash-style">ASOSIASI KAMI</h5>
                            <h2>MITRA DAN KLIEN</h2>
                            {{-- <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit,
                                blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime
                                curae placeat.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="client-wrap client-slider">
                    <div class="client-item">
                        <figure>
                            <img src="assets/images/logo7.png" alt="">
                        </figure>
                    </div>
                    <div class="client-item">
                        <figure>
                            <img src="assets/images/logo8.png" alt="">
                        </figure>
                    </div>
                    <div class="client-item">
                        <figure>
                            <img src="assets/images/logo9.png" alt="">
                        </figure>
                    </div>
                    <div class="client-item">
                        <figure>
                            <img src="assets/images/logo10.png" alt="">
                        </figure>
                    </div>
                    <div class="client-item">
                        <figure>
                            <img src="assets/images/logo11.png" alt="">
                        </figure>
                    </div>
                    <div class="client-item">
                        <figure>
                            <img src="assets/images/logo8.png" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- client html end -->
        <!-- callback section html start -->
        <div class="fullwidth-callback" style="background-image: url(assets/images/img26.jpg);">
            <div class="container">
                <div class="section-heading section-heading-white text-center">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            {{-- <h5 class="dash-style">CALLBACK FOR MORE</h5> --}}
                            <h2>PESONA PLESIRAN INDONESIA</h2>
                        </div>
                    </div>
                </div>
                <div class="callback-counter-wrap">
                    <div class="counter-item">
                        <div class="counter-item-inner">
                            <div class="counter-icon">
                                <img src="{{ asset('frontend/assets3/images/icon1.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter-no">
                                    <span class="counter">0</span>K+
                                </span>
                                <span class="counter-text">
                                    Mitra
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-item-inner">
                           <div class="counter-icon">
                             <img src="{{ asset('frontend/assets3/images/icon2.png') }}" alt="">
                           </div>
                           <div class="counter-content">
                              <span class="counter-no">
                                 <span class="counter">0</span>K+
                              </span>
                              <span class="counter-text">
                                 Awards Achieve
                              </span>
                           </div>
                        </div>
                     </div>
                    <div class="counter-item">
                        <div class="counter-item-inner">
                            <div class="counter-icon">
                                <img src="{{ asset('frontend/assets3/images/icon3.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter-no">
                                    <span class="counter">0</span>K+
                                </span>
                                <span class="counter-text">
                                    Anggota Aktif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-item-inner">
                            <div class="counter-icon">
                                <img src="{{ asset('frontend/assets3/images/icon4.png') }}" alt="">
                            </div>
                            <div class="counter-content">
                                <span class="counter-no">
                                    <span class="counter">0</span>K+
                                </span>
                                <span class="counter-text">
                                    Tujuan Wisata
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- callback html end -->
    </section>
@endsection
