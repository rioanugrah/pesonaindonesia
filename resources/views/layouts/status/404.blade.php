<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Page Not Be Found</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <?php $assets = asset('frontend/assets5/'); ?>
    <link href="{{ url('frontend/assets4/img/favicon.png') }}" rel="shortcut icon">
    <link href="{{ $assets }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ $assets }}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ $assets }}/css/plugin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ $assets }}/fonts/line-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ $assets . '/css/scroll.css' }}">
</head>
<body>
    
    <script src="{{ $assets }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ $assets }}/js/bootstrap.min.js"></script>
    <script src="{{ $assets }}/js/particles.js"></script>
    <script src="{{ $assets }}/js/particlerun.js"></script>
    <script src="{{ $assets }}/js/plugin.js"></script>
    <script src="{{ $assets }}/js/main.js"></script>
    <script src="{{ $assets }}/js/custom-swiper.js"></script>
    <script src="{{ $assets }}/js/custom-nav.js"></script>
</body>
</html>