<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="google-site-verification" content="FINya1A7o0a-hHiPA1CXl0OFffJkaIeMdfwp_YNpFu0" />
    {{-- <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4" /> --}}
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')">
    <link rel="shortlink" href="{{ url('/') }}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard"/>
    {{-- <meta name="keywords"
        content="tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia, pesona indonesia"> --}}
    <?php $css = asset('frontend/assets4/'); ?>
    <link href="{{ url('frontend/assets4/img/favicon.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ $css . '/css/banner.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/reset.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/bootstrap.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/font-awesome.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/owl.carousel.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/jquery.fancybox.css' }}">
    <link rel="stylesheet" href="{{ $css . '/fonts/fi/flaticon.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/flexslider.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/payment.css' }}">
    <link rel="stylesheet" href="{{ $css . '/fontawesome/css/all.min.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/main.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/indent.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/whatsapp.css' }}">
    <link rel="stylesheet" href="{{ $css . '/rs-plugin/css/settings.css' }}">
    <link rel="stylesheet" href="{{ $css . '/rs-plugin/css/layers.css' }}">
    <link rel="stylesheet" href="{{ $css . '/rs-plugin/css/navigation.css' }}">
    <link rel="stylesheet" href="{{ $css . '/tuner/css/colorpicker.css' }}">
    <link rel="stylesheet" href="{{ $css . '/tuner/css/styles.css' }}">
    <link rel="stylesheet" href="{{ $css . '/css/button.css'}}">
    <link rel="stylesheet" href="{{ $css . '/css/scroll.css'}}">
    @yield('css')
</head>

<body>
    @include('layouts.frontend_4.header')
    <div class="content-body">
        @yield('content')
    </div>
    @include('layouts.frontend_4.footer')
        @if (!Request::is('partnership'))
        <a href="https://api.whatsapp.com/send?phone={{ $whatsapp['nomor'] }}&text={{ $whatsapp['message'] }}" class="float" target="_blank">
            <i class="fab fa-whatsapp my-float"></i>
        </a>
    @endif
    <div id="scroll-top"><i class="fa fa-angle-up"></i></div>
</body>
<?php $js = asset('frontend/assets4/'); ?>
<script type="text/javascript" src="{{ $js . '/js/jquery.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery-ui.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/bootstrap.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/owl.carousel.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.sticky.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/TweenMax.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/cws_parallax.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.fancybox.pack.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.fancybox-media.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/isotope.pkgd.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/imagesloaded.pkgd.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/masonry.pkgd.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/jquery.themepunch.tools.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/jquery.themepunch.revolution.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.slideanims.min.js' }}">
</script>
<script type="text/javascript"
src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.navigation.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.parallax.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.video.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.actions.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.kenburn.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/rs-plugin/js/extensions/revolution.extension.migration.min.js' }}">
</script>
<script type="text/javascript" src="{{ $js . '/js/jquery.validate.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.form.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/script.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/bg-video/cws_self_vimeo_bg.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/bg-video/jquery.vimeo.api.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/bg-video/cws_YT_bg.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.tweet.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.scrollTo.min.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/js/jquery.flexslider.js' }}"></script>
{{-- <script type="text/javascript" src="{{ $js . '/tuner/js/colorpicker.js' }}"></script>
<script type="text/javascript" src="{{ $js . '/tuner/js/scripts.js' }}"></script> --}}
<script type="text/javascript" src="{{ $js . '/js/retina.min.js' }}"></script>
@yield('js')

</html>
