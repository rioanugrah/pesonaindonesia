<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4">
    <title>@yield('title')</title>
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')">
    <link rel="shortlink" href="{{ url('/') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="Biro Perjalanan">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Pesona Plesiran Indonesia">
    <meta property="og:description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HJ8T1V4S3H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HJ8T1V4S3H');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ env('ADSENSE_CLIENT_ID') }}"
        crossorigin="anonymous"></script>
    <?php $assets = asset('frontend/assets5/'); ?>
    <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
    <link href="{{ url('frontend/assets4/img/favicon.png') }}" rel="shortcut icon">
    <link href="{{ $assets }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ $assets }}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ $assets }}/css/plugin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ $assets }}/fonts/line-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ $assets . '/css/scroll.css' }}">
    @yield('css')
    @yield('head')
    {!! Adsense::javascript() !!}
</head>

<body oncontextmenu="return false;">
    <div id="preloader">
        <div id="status"></div>
    </div>
    @include('layouts.frontend_5.header')
    @yield('content')
    {{-- <amp-auto-ads type="adsense" data-ad-client="{{ env('ADSENSE_CLIENT_ID') }}">
    </amp-auto-ads> --}}
    {!! Adsense::ads('ads_unit') !!}
    @include('layouts.frontend_5.footer')
    <div id="back-to-top">
        <a href="#"></a>
    </div>

    <script src="{{ $assets }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ $assets }}/js/bootstrap.min.js"></script>
    <script src="{{ $assets }}/js/particles.js"></script>
    <script src="{{ $assets }}/js/particlerun.js"></script>
    <script src="{{ $assets }}/js/plugin.js"></script>
    <script src="{{ $assets }}/js/main.js"></script>
    {{-- @guest
    <script>
        document.addEventListener("keydown", (e) => {
            if(e.ctrlKey || e.keyCode == 123){
                e.stopPropagation();
                e.preventDefault();
            }
        });
    </script>
    @else
        @if (auth()->user()->role != 1)
        <script>
            document.addEventListener("keydown", (e) => {
                if(e.ctrlKey || e.keyCode == 123){
                    e.stopPropagation();
                    e.preventDefault();
                }
            });
        </script>
        @endif
    @endguest --}}
    <script>
        var addHandler = function(element, type, handler) {
            if (element.addEventListener) {
                element.addEventListener(type, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent("on" + type, handler);
            } else {
                element["on" + type] = handler;
            }
        };

        var preventDefault = function(event) {
            if (event.preventDefault) {
                event.preventDefault();
            } else {
                event.returnValue = false;
            }
        };

        addHandler(window, "contextmenu", function(event) {
            preventDefault(event);
        });
        document.onkeydown = function(event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                return false;
            }
        };
    </script>
    <script src="{{ $assets }}/js/custom-swiper.js"></script>
    <script src="{{ $assets }}/js/custom-nav.js"></script>
    @yield('js')
</body>

</html>
