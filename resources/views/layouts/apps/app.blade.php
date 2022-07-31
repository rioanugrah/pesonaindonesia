<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <?php $link = asset('apps/'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ $link }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $link }}/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ $link }}/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ $link }}/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"> --}}
    <link rel="stylesheet" href="{{ $link }}/css/solid.min.css">
    <link rel="stylesheet" href="{{ $link }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ $link }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ $link }}/css/nice-select.css">
    <link rel="stylesheet" href="{{ $link }}/css/style.css">
    <link href="{{ $link }}/img/logo/favicon.png" rel="shortcut icon">
</head>

<body>
    <!-- Preloader-->
    {{-- <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only"></div>
        </div>
    </div> --}}
    <!-- Header Area -->
    @include('layouts.apps.header')
    <!-- PWA Install Alert -->
    {{-- <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-delay="5000" data-bs-autohide="true">
        <div class="toast-body">
            <div class="content d-flex align-items-center mb-2"><img src="{{ $link }}/img/icons/icon-72x72.png" alt="">
                <h6 class="mb-0">Add to Home Screen</h6>
                <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div><span class="mb-0 d-block">Add Suha on your mobile home screen. Click the<strong class="mx-1">Add
                    to Home Screen</strong>button &amp; enjoy it like a regular app.</span>
        </div>
    </div> --}}
    <div class="page-content-wrapper">
        <!-- Search Form-->
        <!-- Search Form-->
        <div class="container">
            <div class="search-form pt-3 rtl-flex-d-row-r">
                <form action="#" method="">
                    <input class="form-control" type="search" placeholder="Search in Suha">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <!-- Alternative Search Options -->
                <div class="alternative-search-options">
                    <div class="dropdown"><a class="btn btn-danger dropdown-toggle" id="altSearchOption"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="fa-solid fa-sliders"></i></a>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="altSearchOption">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-microphone"> </i>Voice
                                    Search</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-image"> </i>Image
                                    Search</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Wrapper -->
        {{-- <div class="hero-wrapper">
            <div class="container">
                <div class="pt-3">
                    <!-- Hero Slides-->
                    <div class="hero-slides owl-carousel">
                        <!-- Single Hero Slide-->
                        <div class="single-hero-slide" style="background-image: url('{{ $link }}/img/bg-img/1.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">Amazon Echo</h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary"
                                        href="#" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Hero Slide-->
                        <div class="single-hero-slide" style="background-image: url('{{ $link }}/img/bg-img/2.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">Light Candle</h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">Now only $22</p><a class="btn btn-success"
                                        href="#" data-animation="fadeInUp" data-delay="500ms"
                                        data-duration="1000ms">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Hero Slide-->
                        <div class="single-hero-slide" style="background-image: url('{{ $link }}/img/bg-img/3.jpg')">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">Best Furniture</h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">3 years warranty</p><a class="btn btn-danger"
                                        href="#" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @yield('content')
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
        <div class="suha-footer-nav">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
                <li><a href="home.html"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="message.html"><i class="fa-solid fa-comment-dots"></i>Chat</a></li>
                <li><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i>Basket</a></li>
                <li><a href="settings.html"><i class="fa-solid fa-gear"></i>Settings</a></li>
                <li><a href="pages.html"><i class="fa-solid fa-heart"></i>Pages</a></li>
            </ul>
        </div>
    </div>

    <script src="{{ $link }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ $link }}/js/jquery.min.js"></script>
    <script src="{{ $link }}/js/waypoints.min.js"></script>
    <script src="{{ $link }}/js/jquery.easing.min.js"></script>
    <script src="{{ $link }}/js/owl.carousel.min.js"></script>
    <script src="{{ $link }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ $link }}/js/jquery.counterup.min.js"></script>
    <script src="{{ $link }}/js/jquery.countdown.min.js"></script>
    <script src="{{ $link }}/js/jquery.passwordstrength.js"></script>
    <script src="{{ $link }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ $link }}/js/theme-switching.js"></script>
    <script src="{{ $link }}/js/no-internet.js"></script>
    <script src="{{ $link }}/js/active.js"></script>
    <script src="{{ $link }}/js/pwa.js"></script>
</body>

</html>
