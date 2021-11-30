<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="Pesona Plesiran Indonesia">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <link href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/scroll.css') }}">

    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet" />
    @yield('css')
</head>
<body data-base-url="{{url('/')}}">
    <script src="{{ asset('backend/assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        @include('layouts.backend.sidebar')
        <div class="page-wrapper">
        @include('layouts.backend.header')
        <div class="page-content">
            @yield('content')
        </div>
        @include('layouts.backend.footer')
        </div>
    </div>
</body>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    @yield('js')
</html>