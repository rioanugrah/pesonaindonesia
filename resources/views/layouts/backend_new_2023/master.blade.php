<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.backend_new_2023.title-meta')
    @include('layouts.backend_new_2023.head')
</head>
<body>
    @show
    <div id="layout-wrapper">
        @include('layouts.backend_new_2023.topbar')
        @include('layouts.backend_new_2023.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include('layouts.backend_new_2023.modalLoading')
                    @yield('content')
                </div>
            </div>
            @include('layouts.backend_new_2023.footer')
        </div>
    </div>
    @include('layouts.backend_new_2023.vendor-scripts')
</body>
{{-- @section('body')

<body>
    @show

    <div id="layout-wrapper">
        @include('layouts.backend_new_2023.topbar')
        @include('layouts.backend_new_2023.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.backend_new_2023.footer')
        </div>
    </div>
    @include('layouts.backend_new_2023.vendor-scripts')
</body> --}}

</html>
