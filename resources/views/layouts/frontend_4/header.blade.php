<header>
    <!-- site top panel-->
    <div class="site-top-panel">
        <div class="container p-relative">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <!-- lang select wrapper-->
                    <div class="top-left-wrap font-3">
                        <div class="mail-top"><a href="mailto:business@plesiranindonesia.com"> <i
                                    class="flaticon-suntour-email"></i>business@plesiranindonesia.com</a></div>
                        <span>/</span>
                        <div class="tel-top"><a href="tel:081331126991"> <i
                                    class="flaticon-suntour-phone"></i>0813-3112-6991</a></div>
                    </div>
                    <!-- ! lang select wrapper-->
                </div>
                <div class="col-md-6 col-sm-5 text-right">
                    <div class="top-right-wrap">
                        @guest
                            {{-- <li><a href="{{ route('login') }}" class="mn-has-sub">Login</a></li>
                            <li class="slash">|</li>
                            <li><a href="{{ route('register') }}" class="mn-has-sub">Daftar Akun</a></li> --}}
                        @else
                        <div class="lang-wrap dropdown">
                            <div>
                                <ul>
                                    <li><a href="#" class="lang-sel icl-en">{{ auth()->user()->name }} <i
                                                class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="top-login"><a href="#">My Account</a></div> --}}
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ! site top panel-->
    <!-- Navigation panel-->
    <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
            <!-- Logo ( * your text or image into link tag *)-->
            <div class="nav-logo-wrap local-scroll"><a href="{{ route('frontend') }}" class="logo"><img src="{{ $asset . '/img/logo_plesiran_new_black2.webp' }}"
                        data-at2x="{{ $asset . '/img/logo_plesiran_new_black2.webp' }}" width="200" alt></a></div>
            <!-- Main Menu-->
            <div class="inner-nav desktop-nav">
                <ul class="clearlist">
                    <!-- Item With Sub-->
                    <li><a href="{{ route('frontend') }}" class="mn-has-sub active">Home</a>
                    </li>
                    <li class="slash">/</li>
                    <li><a href="{{ route('frontend.paket') }}" class="mn-has-sub">Paket Wisata</a>
                    </li>
                    <li class="slash">/</li>
                    <li><a href="{{ route('frontend.wisata') }}" class="mn-has-sub">Wisata</a>
                    </li>
                    <li class="slash">/</li>
                    <li><a href="javascript:void()" onclick="alert('Fitur dalam proses pengembangan!')" class="mn-has-sub">Dokumentasi</a>
                    </li>
                    <li class="slash">|</li>
                    <li><a href="{{ route('frontend.tracking') }}" class="mn-has-sub">Cek Tiket</a>
                    </li>
                    <!-- End Item With Sub-->
                </ul>
            </div>
            <!-- End Main Menu-->
        </div>
    </nav>
    <!-- End Navigation panel-->
    <!-- breadcrumbs start-->
    @yield('header')
    <!-- ! breadcrumbs end-->
</header>