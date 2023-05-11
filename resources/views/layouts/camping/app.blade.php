<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="author" content="Camping Adventure">
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="camping">
    <meta property="og:title" content="Camping Adventure">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Camping Adventure">
    <meta property="og:description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    @yield('css')
    @php
        $assets = asset('frontend/camping/');
    @endphp
    <link rel="stylesheet" href="{{ $assets.'/css/scroll.css' }}">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ $assets }}/fonts/flaticon/flaticon_gowilds.css">
    <link rel="stylesheet" href="{{ $assets }}/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/magnific-popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/slick/slick.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="{{ $assets }}/vendor/animate.css">
    <link rel="stylesheet" href="{{ $assets }}/css/default.css">
    <link rel="stylesheet" href="{{ $assets }}/css/style.css">
    <link rel="shortcut icon" href="{{ $assets }}/images/favicon.jpg" type="image/png">

</head>
<body>
    {{-- <div class="preloader">
        <div class="loader">
            <div class="pre-shadow"></div>
            <div class="pre-box"></div>
        </div>
    </div> --}}

    <header class="header-area header-one transparent-header">

        <div class="header-navigation navigation-white">
            <div class="nav-overlay"></div>
            <div class="container-fluid">
                <div class="primary-menu">

                    <div class="site-branding">
                        <a href="{{ url('/') }}" class="brand-logo"><img src="{{ $assets }}/images/LogoCampingAdventure.png" alt="Logo Camping Adventure" width="250"></a>
                    </div>

                    <div class="nav-menu">

                        <div class="mobile-logo mb-30 d-block d-xl-none">
                            <a href="{{ url('/') }}" class="brand-logo"><img src="assets/images/logo/logo-black.png" alt="Logo Camping Adventure"></a>
                        </div>

                        {{-- <div class="nav-search mb-30 d-block d-xl-none ">
                            <form>
                                <div class="form_group">
                                    <input type="email" class="form_control" placeholder="Search Here" name="email" required>
                                    <button class="search-btn"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div> --}}

                        <nav class="main-menu">
                            <ul>
                                <li class="menu-item has-children"><a href="{{ url('/') }}">Beranda</a></li>
                                <li class="menu-item has-children"><a href="{{ url('/') }}">Paket Camping</a></li>
                                {{-- <li class="menu-item has-children"><a href="{{ url('/') }}">Beranda</a></li> --}}
                                {{-- <li class="menu-item has-children"><a href="#">Tours</a>
                                    <ul class="sub-menu">
                                        <li><a href="tour.html">Tours</a></li>
                                        <li><a href="tour-details.html">Tours Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#">Destination</a>
                                    <ul class="sub-menu">
                                        <li><a href="destination.html">Destination</a></li>
                                        <li><a href="destination-details.html">Destination Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-list.html">Blog List</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="gallery.html">Our Gallery</a></li>
                                        <li><a href="events.html">Our Events</a></li>
                                        <li><a href="shop.html">Our Shop</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item search-item">
                                    <div class="search-btn" data-bs-toggle="modal" data-bs-target="#search-modal"><i class="far fa-search"></i></div>
                                </li> --}}
                            </ul>
                        </nav>

                        {{-- <div class="menu-button mt-40 d-xl-none">
                            <a href="contact.html" class="main-btn secondary-btn">Book Now<i class="fas fa-paper-plane"></i></a>
                        </div> --}}
                    </div>

                    <div class="nav-right-item">
                        <div class="menu-button d-xl-block d-none">
                            <a href="javascript:void()" class="main-btn primary-btn">Login<i class="fas fa-lock"></i></a>
                        </div>
                        <div class="navbar-toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="hero-section">
        <div class="hero-wrapper black-bg">
            <div class="hero-slider-one">
                <div class="single-slider">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-6">
                                <div class="hero-content text-white">
                                    <h1 data-animation="fadeInDown" data-delay=".4s">
                                        It's Time for Adventure
                                    </h1>
                                    {{-- <div class="text-button d-flex align-items-center">
                                        <p data-animation="fadeInLeft" data-delay=".5s">Nunc et dui nullam aliquam eget
                                            velit. Consectetur nulla convallis
                                            viverra quisque eleifend</p>
                                        <div class="hero-button" data-animation="fadeInRight" data-delay=".6s"> 
                                            <a href="about.html" class="main-btn primary-btn">Explore More<i class="fas fa-paper-plane"></i></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="hero-image" data-animation="fadeInRight">
                                    <img src="{{ $assets }}/images/camp_slide_1.jpg" alt="Camping Slide 1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="about-section pt-100">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="about-content-box text-center mb-55 wow fadeInDown">
                        <div class="section-title mb-30">
                            <span class="sub-title">About Company</span>
                            <h2>We Are Most Funning Company
                                About Travel & Tours</h2>
                        </div>
                        <p>Sit amet consectetur. Velit integer eu tincidunt scelerisque. Sodales volutpat neque fermentum
                            malesuada scelerisque massa lacus. Ultrices eget leo cras odio blandit rhoncus eu. At feugiat
                            condimentum massa integer iaculis sit sit. Sagittis vitae quis sed vitae congue</p>
                    </div>
                </div>
            </div>
            <div class="slider-active-4-item wow fadeInUp">
                <div class="single-features-item mb-40">
                    <div class="img-holder">
                        <img src="assets/images/features/feat-1.jpg" alt="Features Image">
                        <div class="content">
                            <div class="text">
                                <h4 class="title">Tent Camping
                                    Services</h4>
                                <a href="#" class="icon-btn"><i class="far fa-arrow-right"></i></a>
                            </div>
                            <p>Set unde omnis estenatus voluptatem aperiae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="who-we-section pt-100 pb-50">
        <div class="container">
            <div class="row align-items-xl-center">
                <div class="col-xl-5 order-2 order-xl-1">
                    <div class="we-image-box text-center text-xl-left pr-lg-30 mb-50 wow fadeInLeft">
                        <img src="{{ $assets }}/images/69356-rinjani.jpg" class="radius-top-left-right-288" alt="What We Image">
                    </div>
                </div>
                <div class="col-xl-7 order-1 order-xl-2">
                    <div class="we-contnet-box mb-20 wow fadeInRight">
                        <div class="section-title mb-45">
                            {{-- <span class="sub-title">Who We Are</span> --}}
                            <h2>Peluang Besar Untuk Petualangan & Perjalanan</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-camping"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Berkemah</h5>
                                        {{-- <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-biking-mountain"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Bersepeda</h5>
                                        {{-- <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-fishing-2"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Fishing & Boat</h5>
                                        <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-three mb-30">
                                    <div class="icon">
                                        <i class="flaticon-caravan"></i>
                                    </div>
                                    <div class="text">
                                        <h5 class="title">Camping Trailer</h5>
                                        <a href="#" class="btn-link">Read More <i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-section gray-bg pt-100 pb-50">
        <div class="container">
            <div class="row align-items-xl-center">
                <div class="col-xl-7">
                    <div class="choose-content-box pr-lg-70">
                        <div class="section-title mb-45 wow fadeInDown">
                            {{-- <span class="sub-title">Why Choose Us</span> --}}
                            <h2>Mengapa Memilih Petualangan Perjalanan Kami</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-rabbit"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Keamanan Terbaik</h4>
                                        <p>Kualitas keamanan terjamin</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-rabbit"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Toilet</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-wifi-router"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Free Internet</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-solar-energy"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Solar Energy</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fancy-icon-box-four mb-45 wow fadeInUp">
                                    <div class="icon">
                                        <i class="flaticon-cycling"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="title">Mountain Biking</h4>
                                        <p>We denounce with righteous
                                            indignation and dislike</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="experience-box text-center text-xl-right mb-50 wow fadeInRight">
                        <img src="assets/images/features/years.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partners-section black-dark-bg">
        <div class="container">
            <div class="partner-slider-one pt-80 pb-70 wow fadeInUp">
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="{{ $assets }}/images/partner/logo_plesiran_new_white.png" alt="Partner Image"></a>
                    </div>
                </div>
                {{-- <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-7.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-8.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-9.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-10.png" alt="Partner Image"></a>
                    </div>
                </div>
                <div class="single-partner-item">
                    <div class="partner-img">
                        <a href="#"><img src="assets/images/partner/partner-7.png" alt="Partner Image"></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <footer class="main-footer black-bg pt-100">
        <div class="container">
            <div class="footer-cta pt-80 pb-40">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-cta-item pr-lg-60 mb-40 wow fadeInLeft">
                            <div class="icon">
                                <img src="{{ $assets }}/images/support.png">
                            </div>
                            <div class="content">
                                <h3 class="title">Butuh Dukungan Untuk Camping ?</h3>
                                <a href="javascript:void()" class="icon-btn"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-cta-item pl-lg-60 mb-40 wow fadeInRight">
                            <div class="icon">
                                <img src="{{ $assets }}/images/travel.png">
                            </div>
                            <div class="content">
                                <h3 class="title">Siap Memulai Liburan!</h3>
                                <a href="javascript:void()" class="icon-btn"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-top pt-40 wow fadeInUp">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-info-item mb-40">
                            <div class="icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <span class="title">Alamat</span>
                                <p>Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota Malang, Jawa Timur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-info-item mb-40">
                            <div class="icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <div class="info">
                                <span class="title">Email</span>
                                <p><a href="mailto:business@plesiranindonesia.com">business@plesiranindonesia.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-info-item mb-40">
                            <div class="icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <span class="title">Telp / Whatsapp</span>
                                <p><a href="tel:081331126991">0813-3112-6991</a></p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="social-box mb-40 float-lg-end">
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="footer-widget-area pt-75 pb-30">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget about-company-widget mb-40 wow fadeInUp">
                            {{-- <h4 class="widget-title">About</h4> --}}
                            <div class="footer-content">
                                {{-- <p>To take trivial example which us 
                                    ever undertakes laborious physica
                                    exercise except obsome</p> --}}
                                <a href="#" class="footer-logo"><img src="{{ $assets }}/images/LogoCampingAdventure.png" alt="Site Logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-widget service-nav-widget mb-40 pl-lg-70 wow fadeInDown">
                            <h4 class="widget-title">Produk</h4>
                            <div class="footer-content">
                                <ul class="footer-widget-nav">
                                    <li><a href="#">Paket Camping</a></li>
                                    {{-- <li><a href="#">Family Tent Camping</a></li>
                                    <li><a href="#">Classic Tent Camping</a></li>
                                    <li><a href="#">Wild Tent Camping</a></li>
                                    <li><a href="#">Small Cabin Wood</a></li> --}}
                                </ul>
                                {{-- <ul class="footer-widget-nav">
                                    <li><a href="#">Need a Career ?</a></li>
                                    <li><a href="#">Latest News & Blog</a></li>
                                    <li><a href="#">Core Features</a></li>
                                    <li><a href="#">Meet Our teams</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="footer-widget footer-newsletter-widget mb-40 pl-lg-100 wow fadeInUp">
                            <h4 class="widget-title">Newsletter</h4>
                            <div class="footer-content">
                                <p>Which of us ever undertake laborious
                                    physical exercise except obtain</p>
                                <form>
                                    <div class="form_group">
                                        <label><i class="far fa-paper-plane"></i></label>
                                        <input type="email" class="form_control" placeholder="Email Address" name="email" required>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer-text">
                            <p>Copyright@ 2023 <span style="color: #F7921E;">Camping Adventure</span>, All Right Reserved</p>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="footer-nav float-lg-end">
                            <ul>
                                <li><a href="#">Setting & privacy</a></li>
                                <li><a href="#">Faqs</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top" ><i class="far fa-angle-up"></i></a>
    
    <script src="{{ $assets }}/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ $assets }}/vendor/popper/popper.min.js"></script>
    <script src="{{ $assets }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ $assets }}/vendor/slick/slick.min.js"></script>
    <script src="{{ $assets }}/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{ $assets }}/vendor/jquery.counterup.min.js"></script>
    <script src="{{ $assets }}/vendor/jquery.waypoints.js"></script>
    <script src="{{ $assets }}/vendor/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ $assets }}/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ $assets }}/vendor/wow.min.js"></script>
    <script src="{{ $assets }}/js/theme.js"></script>
</body>
</html>