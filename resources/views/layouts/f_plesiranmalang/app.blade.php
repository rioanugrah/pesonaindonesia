<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="author" content="Plesiran Malang">
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')">
    <link rel="shortlink" href="{{ route('plesiranmalang.home') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="Biro Perjalanan">
    <meta property="og:title" content="Plesiran Malang">
    <meta property="og:url" content="{{ route('plesiranmalang.home') }}">
    <meta property="og:site_name" content="Plesiran Malang">
    <meta property="og:description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    <?php $assets = asset('plesiran_malang/'); ?>
    <link rel="stylesheet" href="{{ $assets }}/styles/plugins.css">
    <link rel="stylesheet" href="{{ $assets }}/styles/main.css">

    @yield('css')
</head>

<body class="rlr-body">
    @include('layouts.f_plesiranmalang.header')
    <main id="rlr-main" class="rlr-main--fixed-top">
        @yield('content')
    </main>

    @include('layouts.f_plesiranmalang.footer')

    <script src="{{ $assets }}/vendors/navx/js/navigation.min.js" defer></script>
    <script src="{{ $assets }}/js/main.js" defer></script>
    @yield('script')
</body>

</html>
