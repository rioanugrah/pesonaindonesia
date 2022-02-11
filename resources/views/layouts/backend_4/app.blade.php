<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ff7b00">
    <title>@yield('title')</title>
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="Pesona Plesiran Indonesia">
    @include('layouts.backend_4.head')
</head>
<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-gradient-menu" data-col="2-columns">
    @include('layouts.backend_4.header')
    @include('layouts.backend_4.sidebar')

    <div id="main">
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
@include('layouts.backend_4.js')
</html>