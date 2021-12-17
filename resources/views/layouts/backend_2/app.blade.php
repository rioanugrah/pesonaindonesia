<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ff7b00">
    <title>@yield('title')</title>
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="Pesona Plesiran Indonesia">
    <link href="{{ asset('backend/assets2/images/favicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('backend/assets2/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets2/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets2/css/app.min.css') }}" id="app-style" rel="stylesheet">
    @yield('css')
</head>
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('layouts.backend_2.header')
        @include('layouts.backend_2.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                          Copyright © <script>document.write(new Date().getFullYear())</script> <span>Pesona Plesiran Indonesia</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
    <script src="{{ asset('backend/assets2/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets2/libs/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{ asset('backend/assets2/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('backend/assets2/js/app.js') }}"></script>

    @yield('js')
</html>