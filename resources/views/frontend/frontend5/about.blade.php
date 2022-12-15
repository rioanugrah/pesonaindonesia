@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>

@section('title')
    Tentang Kami
@endsection

@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $asset }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ $asset }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Tentang Kami</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<section class="about-us pt-6" style="background-image:url({{ $asset }}/images/background_pattern.png); background-position:bottom right;">
    <div class="container">
        <div class="about-image-box">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-6 ps-4">
                    <div class="about-content text-center text-lg-start">
                        <h4 class="theme d-inline-block mb-0">Tentang Kami</h4>
                        <h2 class="border-b mb-2 pb-1">Pesona Plesiran Indonesia</h2>
                        <p class="border-b mb-2 pb-2">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 pe-4">
                    <div class="about-image" style="animation:none; background:transparent;">
                        <img src="{{ $asset }}/images/travels.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white-overlay"></div>
</section>
<section class="about-us pb-6" style="background-image:url({{ $asset }}/images/shape4.png); background-position:center;">
    <div class="container">
        
        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-1">Temukan <span class="theme">Kesempurnaan Perjalanan</span></h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p> --}}
        </div>

        <!-- why us starts -->
        <div class="why-us">
            <div class="why-us-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="icon-location-pin theme"></i>
                                </div>
                                <h4><a href="javascript:void()">Bagikan Lokasi Perjalanan Anda</a></h4>
                                <p class="mb-0 theme">100+ Reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="icon-directions theme"></i>
                                </div>
                                <h4><a href="javascript:void()">Bagikan Preferensi Perjalanan Anda</a></h4>
                                <p class="mb-0 theme">100+ Reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="icon-compass theme"></i>
                                </div>
                                <h4><a href="javascript:void()">Di Sini 100% Agen Tur Terpercaya</a></h4>
                                <p class="mb-0 theme">100+ Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- why us ends -->
    </div>
    <div class="white-overlay"></div>
</section>
@endsection