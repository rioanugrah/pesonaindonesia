<!DOCTYPE html>
<html lang="en" class="no-js" lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Pesona Plesiran Indonesia">
    <meta name="author" content="Pesona Plesiran Indonesia">
    <title>Coming Soon | Pesona Plesiran Indonesia</title>

    <link href="{{ url('frontend/assets2/images/favicon.png') }}" rel="shortcut icon">

    <link rel="stylesheet" href="{{ url('frontend/assets2/css/scroll.css') }}">
    <link rel="stylesheet" href="{{ url('coming_soon/css/base.css') }}">
    <link rel="stylesheet" href="{{ url('coming_soon/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ url('coming_soon/css/main.css') }}">

    <script src="{{ url('coming_soon/js/modernizr.js') }}"></script>
    <script src="{{ url('coming_soon/js/fontawesome/all.min.js') }}"></script>
</head>

<body id="top">
    {{-- <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="{{ url('/') }}">
                <img src="{{ url('coming_soon/images/logo_plesiran.png') }}" alt="Homepage">
            </a>
        </div>

        <div class="header-email">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path
                    d="M0 12l11 3.1 7-8.1-8.156 5.672-4.312-1.202 15.362-7.68-3.974 14.57-3.75-3.339-2.17 2.925v-.769l-2-.56v7.383l4.473-6.031 4.527 4.031 6-22z" />
            </svg>
            <a href="mailto:{{ $email }}">{{ $email }}</a>
        </div>

    </header>
    <section id="intro" class="s-intro s-intro--slides">

        <div class="intro-slider">
            @foreach ($wallpaper_c as $wp)
            <div class="intro-slider-img" style="background-image: url({{ $wp['image'] }});"></div>
            @endforeach
        </div>

        <div class="grid-overlay">
            <div></div>
        </div> 

        <div class="row intro-content">

            <div class="column">

                <div class="intro-content__text">

                    <h3>Coming Soon</h3>
                    
                    <h1>
                        {{ $content }}
                    </h1>

                </div>

                <div class="intro-content__bottom">

                    <div class="intro-content__counter-wrap">
                        <h4>Launching in</h4>
            
                        <div class="counter">
                            <input type="hidden" id="year" value="{{ $year }}">
                            <input type="hidden" id="month" value="{{ $month }}">
                            <input type="hidden" id="date" value="{{ $date }}">
                            <div class="counter__time days">
                                365
                                <span>D</span>
                            </div>
                            <div class="counter__time hours">
                                09
                                <span>H</span>
                            </div>
                            <div class="counter__time minutes">
                                54
                                <span>M</span>
                            </div>
                            <div class="counter__time seconds">
                                57
                                <span>S</span>
                            </div>
                        </div>  <!-- end counter -->
                    </div> <!-- end intro-content__counter-wrap -->
    
                </div> <!-- end intro-content__bottom -->

            </div> <!-- end column -->

        </div> <!--  end intro-content -->

        <ul class="intro-social">
            <li><a href="#0"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-behance" aria-hidden="true"></i></a></li>
        </ul>

    </section>
</body>

<script src="{{ url('coming_soon/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('coming_soon/js/plugins.js') }}"></script>
<script src="{{ url('coming_soon/js/main.js') }}"></script>

</html>
