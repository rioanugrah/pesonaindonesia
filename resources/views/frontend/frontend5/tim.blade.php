@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>

@section('title')
    Tim Kami
@endsection

@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $asset }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ $asset }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Tim Kami</h1>
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
<section class="our-team pb-6">
    <div class="container">
          
        <div class="section-title mb-6 w-75 mx-auto text-center">
            <h2 class="mb-1">Tim <span class="theme">Kami</span></h2>
        </div>  
        <div class="team-main">
            <div class="row shop-slider">
                @foreach ($teams as $team)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="team-list rounded">
                        <div class="team-image">
                            <img src="{{ asset('frontend/assets4/img/team/'.$team['image']) }}" alt="team">
                        </div>
                        <div class="team-content text-center p-3 bg-theme">
                           <h4 class="mb-0 white">{{ $team['name'] }}</h4>
                            <p class="mb-0 white">{{ $team['posisi'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- <section class="about-us pt-6" style="background-image:url({{ $asset }}/images/background_pattern.png); background-position:bottom right;">
    <div class="container">
        @foreach ($teams as $team)
        <div class="col-md-4 col-sm-6 col-xs-6 mb-30">
            <div class="profile-item">
                <div class="profile-media"><img src="{{ asset('frontend/assets4/img/team/'.$team['image']) }}" data-at2x="{{ asset('frontend/assets4/img/team/'.$team['image']) }}" alt></div>
                <div class="title-wrap">
                    <h4 class="title" style="font-size: 14pt"><span>{{ $team['name'] }}</span></h4>
                    <div class="positions"><a href="#" class="font-4">{{ $team['posisi'] }}</a></div>
                </div>
                <div class="soc-links"><a href="#" class="cws-social fa fa-twitter"></a><a href="#"
                        class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="white-overlay"></div>
</section> --}}
@endsection