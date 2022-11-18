<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4">
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')">
    <link rel="shortlink" href="{{ url('/') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="agency">
    <meta property="og:title" content="Pesona Plesiran Indonesia">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Pesona Plesiran Indonesia">
    <meta property="og:description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    <link href="{{ url('frontend/assets4/img/favicon.png') }}" rel="shortcut icon">
    <link rel='stylesheet' id='gdlr-core-google-font-css' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.2.4' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/plugins/revslider/public/assets/css/settings.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/plugins/tourmaster/plugins/elegant-font/style.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/plugins/tourmaster/tourmaster.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/plugins/goodlayers-core/plugins/combine/style.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/plugins/goodlayers-core/include/css/page-builder.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/css/tourmaster-style-custom.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/css/style-core.css') }}' type='text/css' media='all'>
    <link rel='stylesheet' href='{{ asset('frontend/assets_new/css/traveltour-style-custom.css') }}' type='text/css' media='all'>
    @yield('css')
</head>
{!! Adsense::javascript() !!}
<body class="tour-template-default single single-tour postid-4643 gdlr-core-body tourmaster-body woocommerce-no-js traveltour-body traveltour-body-front traveltour-full  traveltour-with-sticky-navigation gdlr-core-link-to-lightbox">
    @include('layouts.frontend_2022.header_mobile')

    <div class="traveltour-body-outer-wrapper ">
        <div class="traveltour-body-wrapper clearfix  traveltour-with-frame">
            @include('layouts.frontend_2022.header')
            @yield('content')
            @include('layouts.frontend_2022.footer')
        </div>
    </div>
    <a href="#traveltour-top-anchor" class="traveltour-footer-back-to-top-button" id="traveltour-footer-back-to-top-button"><i class="fa fa-angle-up" ></i></a>
</body>
<?php $js = asset('frontend/assets4/'); ?>
<script type="text/javascript" src="{{ $js . '/js/jquery.min.js' }}"></script>
    {{-- <script type='text/javascript' src='{{ asset('frontend/assets_new/js/jquery/jquery.js') }}'></script> --}}
    {{-- <script type='text/javascript' src='{{ asset('frontend/assets_new/js/jquery/jquery-migrate.min.js') }}'></script> --}}
    <script type='text/javascript' src='{{ asset('frontend/assets_new/js/jquery/ui/core.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('frontend/assets_new/js/jquery/ui/datepicker.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('frontend/assets_new/js/jquery/ui/effect.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('frontend/assets_new/plugins/tourmaster/tourmaster.js') }}'></script>
    <script type='text/javascript' src='{{ asset('frontend/assets_new/js/plugins.js') }}'></script>
    <script type='text/javascript' src='{{ asset('frontend/assets_new/plugins/goodlayers-core/plugins/combine/script.js') }}'></script>
    <script type='text/javascript' src='{{ asset('frontend/assets_new/plugins/goodlayers-core/include/js/page-builder.js') }}'></script>
    @yield('js')
</html>