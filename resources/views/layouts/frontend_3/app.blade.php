<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="Pesona Plesiran Indonesia">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords"
        content="tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia, pesona indonesia">
    <title>@yield('title')</title>
    <?php $css = asset('frontend/assets3/'); ?>
    <link href="{{ url('frontend/assets3/images/favicon.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ $css . '/vendors/bootstrap/css/bootstrap.min.css' }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/vendors/fontawesome/css/all.min.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/vendors/jquery-ui/jquery-ui.min.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/vendors/modal-video/modal-video.min.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/vendors/lightbox/dist/css/lightbox.min.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/vendors/slick/slick.css' }}">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/vendors/slick/slick-theme.css' }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ $css . '/style.css' }}">
    <link rel="stylesheet" href="{{ url('frontend/assets3/css/whatsapp.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets3/css/scroll.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets3/css/button.css') }}">
    
    @yield('css')
</head>
<?php $asset = asset('frontend/assets3/'); ?>

<body class="{{ Request::is('/') ? 'home' : '' }}">
    <div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            {{-- <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg> --}}
            <img src="{{ $asset . '/images/loader1.gif' }}" alt="">
        </div>
    </div>
    <div id="page" class="full-page">
        @if (Request::is('partnership'))
        @include('layouts.frontend_3.headerPartner')
        {{-- <h2>Partnership</h2> --}}
        @else
        @include('layouts.frontend_3.header')
        @endif
        <main id="content" class="site-main">
            
            @yield('content')         
        </main>
        @if (!Request::is('partnership'))
        @include('layouts.frontend_3.footer')
        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp['nomor'] }}&text={{ $whatsapp['message'] }}" class="float" target="_blank">
            <i class="fab fa-whatsapp my-float"></i>
        </a>
        <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
        </a>
        @endif
    </div>
</body>
<?php $js = asset('frontend/assets3/'); ?>
<script src="{{ $js . '/js/jquery.js' }}""></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{ $js . '/vendors/bootstrap/js/bootstrap.min.js' }}"></script>
<script src="{{ $js . '/vendors/jquery-ui/jquery-ui.min.js' }}"></script>
<script src="{{ $js . '/vendors/countdown-date-loop-counter/loopcounter.js' }}"></script>
<script src="{{ $js . '/js/jquery.counterup.js' }}"></script>
<script src="{{ $js . '/vendors/modal-video/jquery-modal-video.min.js' }}"></script>
<script src="{{ $js . '/vendors/masonry/masonry.pkgd.min.js' }}"></script>
<script src="{{ $js . '/vendors/lightbox/dist/js/lightbox.min.js' }}"></script>
<script src="{{ $js . '/vendors/slick/slick.min.js' }}"></script>
<script src="{{ $js . '/js/jquery.slicknav.js' }}"></script>
<script src="{{ $js . '/js/custom.min.js' }}"></script>
@yield('js')
</html>
