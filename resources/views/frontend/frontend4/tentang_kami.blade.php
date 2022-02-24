@extends('layouts.frontend_4.app')

@section('title')
    Tentang Kami
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('frontend') }}">home</a><i>/</i><a
                    href="{{ route('tentang_kami') }}" class="last"><span>Tentang Kami</span></a>
                <h2><span>Tentang Kami</span>
                </h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
<section class="small-section">
    <div class="container">
        <div class="row">
            <!-- counter blocks-->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-6 mt-20 mb-80">
                        <div class="counter-block"><i class="counter-icon flaticon-suntour-world"></i>
                            <div class="counter-name-wrap">
                                <div data-count="0" class="counter">0</div>
                                <div class="counter-name">Tours</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 mt-20 mb-80">
                        <div class="counter-block"><i class="counter-icon flaticon-suntour-fireworks"></i>
                            <div class="counter-name-wrap">
                                <div data-count="0" class="counter">0</div>
                                <div class="counter-name">Holidays</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 mb-80">
                        <div class="counter-block"><i class="counter-icon flaticon-suntour-hotel"></i>
                            <div class="counter-name-wrap">
                                <div data-count="{{ $jumlah_hotel }}" class="counter">{{ $jumlah_hotel }}</div>
                                <div class="counter-name">Hotels</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 mb-80">
                        <div class="counter-block"><i class="counter-icon flaticon-suntour-ship"></i>
                            <div class="counter-name-wrap">
                                <div data-count="0" class="counter">0</div>
                                <div class="counter-name">Cruises</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="counter-block"><i class="counter-icon flaticon-suntour-airplane"></i>
                            <div class="counter-name-wrap">
                                <div data-count="0" class="counter">0</div>
                                <div class="counter-name">Flights</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="counter-block"><i class="counter-icon fas fa-bullhorn"></i>
                            <div class="counter-name-wrap">
                                <div data-count="{{ $event }}" class="counter">{{ $event }}</div>
                                <div class="counter-name">Events</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ! counter blocks-->
            <!-- tabs-->
            <div class="col-md-6 mt-md-40">
                <div class="tabs">
                    <div class="block-tabs-btn clearfix">
                        <div data-tabs-id="tabs1" class="tabs-btn active">Tentang Kami</div>
                        <div data-tabs-id="tabs2" class="tabs-btn">Visi & Misi</div>
                    </div>
                    <!-- tabs keeper-->
                    <div class="tabs-keeper">
                        <!-- tabs container-->
                        <div data-tabs-id="cont-tabs1" class="container-tabs active">
                            <h6 class="trans-uppercase">Pesona Plesiran Indonesia</h6>
                            <p>Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p>
                        </div>
                        <!-- /tabs container-->
                        <!-- tabs container-->
                        <div data-tabs-id="cont-tabs2" class="container-tabs">
                            <h6 class="trans-uppercase">Visi</h6>
                            <p>Menjadi Plesiran Malang sebagai pusat informasi dan reservasi industri pariwisata kreatif berbasis Digital Marketing yang inovatif.</p>
                            <h6 class="trans-uppercase">Misi</h6>
                            <ul class="style-3">
                                <li>Memberikan kemudahan dan kenyamanan bagi setiap pelanggan yang membutuhkan informasi dan reservasi untuk kegiatan pariwisata.</li>
                                <li>Membuat platform digital marketing yang mudah digunakan oleh pelanggan untuk mengetahui informasi dan reservasi hal-hal yang berhubungan dengan pariwisata.</li>
                                <li>Menjalin kerjasama pemasaran dan informasi dengan seluruh industri pariwisata berskala lokal, nasional, dan internasional.</li>
                            </ul>
                        </div>
                        <!-- /tabs container-->
                    </div>
                    <!-- /tabs keeper-->
                </div>
            </div>
            <!-- /tabs-->
        </div>
    </div>
</section>
@endsection