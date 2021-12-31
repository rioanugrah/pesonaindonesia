@extends('layouts.frontend_3.app')

@section('title')
    Visi & Misi
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container"
            style="background-image: url({{ asset('frontend/assets3/images/wallpaper/team_business.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">@yield('title')</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="single-page-section">
        <div class="container">
            <div class="page-content">
                <h4>Visi</h4>
                <p>Menjadi Plesiran Malang sebagai pusat informasi dan reservasi industri pariwisata kreatif berbasis
                    Digital Marketing yang inovatif.</p>
                <h4>Misi</h4>
                <ol>
                    <li>Memberikan kemudahan dan kenyamanan bagi setiap pelanggan yang
                        membutuhkan informasi dan reservasi untuk kegiatan pariwisata.</li>
                    <li>Membuat platform digital marketing yang mudah digunakan oleh
                        pelanggan untuk mengetahui informasi dan reservasi hal-hal yang berhubungan dengan pariwisata.</li>
                    <li>Menjalin kerjasama pemasaran dan informasi dengan seluruh industri
                        pariwisata berskala lokal, nasional, dan internasional.</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
