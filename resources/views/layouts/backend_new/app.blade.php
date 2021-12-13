<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="Pesona Plesiran Indonesia">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{ asset('backend/assets_new/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets_new/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets_new/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets_new/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body data-sidebar="dark">
    @include('layouts.backend_new.header')
    @include('layouts.backend_new.sidebar')
    <div class="main-content">
        <div class="page-content">
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Upzet.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
    <script src="{{ asset('backend/assets_new/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets_new/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('backend/assets_new/js/app.js') }}"></script>
    @yield('js')
</html>
