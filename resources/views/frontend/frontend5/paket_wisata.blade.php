@extends('layouts.frontend_5.app')

@section('title')
    Paket Wisata
@endsection

@section('canonical')
    {{ url('paket') }}
@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $assets }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ $assets }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Paket Wisata</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paket Wisata</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<section class="trending pb-0 pt-6">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            {{-- <h4 class="mb-1 theme1">Top Destinations</h4> --}}
            <h2 class="mb-1">Jelajahi <span class="theme">Destinasi</span></h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p> --}}
        </div>
        <div class="row align-items-center">
            @forelse ($pakets as $paket)
            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="trend-item1">
                    <div class="trend-image position-relative rounded">
                        <img src="{{ asset('frontend/assets4/img/paket/'.$paket->images) }}" alt="image" style="width: 700px; height: 350px; object-fit: cover;">
                        <div class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                            <div class="trend-content-title">
                                <h5 class="mb-0"><a href="{{ route('frontend.paket.detail',['slug' => $paket->slug]) }}" class="theme1">Indonesia</a></h5>
                                <h3 class="mb-0 white"><a href="{{ route('frontend.paket.detail',['slug' => $paket->slug]) }}" class="white">{{ $paket->nama_paket }}</a></h3>
                            </div>
                            {{-- <span class="white bg-theme p-1 px-2 rounded">18 Tours</span> --}}
                        </div>
                        <div class="color-overlay"></div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
@endsection