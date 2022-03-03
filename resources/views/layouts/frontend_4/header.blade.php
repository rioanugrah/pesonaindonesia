<header>
    <div class="banner">
        <div class="banner__content">
            <div class="banner__text">
                <strong style="color: #f38f39">Reminder :</strong> Waspada Penyebaran Virus Varian Omicron, <strong
                    style="color: #f38f39"><a href="{{ route('frontend.info') }}">Kebijakan Pemesanan</a></strong> selama COVID-19.
            </div>
        </div>
    </div>
    <div class="site-top-panel">
        <div class="container p-relative">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="top-left-wrap font-3">
                        <div class="mail-top"><a href="mailto:business@plesiranindonesia.com"> <i
                                    class="flaticon-suntour-email"></i>business@plesiranindonesia.com</a></div>
                        <span>/</span>
                        <div class="tel-top"><a href="tel:081331126991"> <i
                                    class="flaticon-suntour-phone"></i>0813-3112-6991</a></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5 text-right">
                    <div class="top-right-wrap">
                        <div class="lang-wrap dropdown">
                            <div>
                                <ul>
                                    <li><a href="#" class="lang-sel icl-en">Language <i
                                                class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <li><a href="#">EN</a></li>
                                            <li> <a href="#">ID</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
            @if (Request::is('plesiranmalang*'))
                <div class="nav-logo-wrap local-scroll"><a href="{{ route('plmlg') }}" class="logo"><img
                            src="{{ $asset . '/img/logo_plesiran_malang.png' }}"
                            data-at2x="{{ $asset . '/img/logo_plesiran_malang.png' }}" width="210" alt></a></div>
                <div class="inner-nav desktop-nav">
                    <ul class="clearlist">
                        <li><a href="{{ url('/') }}" class="mn-has-sub active">Home</a>
                        </li>
                        <li class="slash">/</li>
                        <li><a href="{{ route('plmlg.hotel') }}" class="mn-has-sub">Hotel</a>
                        </li>
                        <li class="slash">/</li>
                        @guest
                            <li><a href="{{ route('login') }}" class="mn-has-sub">Login</a></li>
                            <li><a href="{{ route('register') }}" class="mn-has-sub">Register</a></li>
                        @else
                            <li><a href="#" class="mn-has-sub">{{ auth()->user()->name }}</a>
                                <ul class="mn-sub">
                                    <li>
                                        <a href="{{ route('frontend.wistlist') }}">Wistlish</a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                            Out</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            @else
                <div class="nav-logo-wrap local-scroll"><a href="{{ route('frontend') }}" class="logo"><img
                            src="{{ $asset . '/img/logo_plesiran_new_black.png' }}"
                            data-at2x="{{ $asset . '/img/logo_plesiran_new_black.png' }}" width="250" alt></a></div>
                <div class="inner-nav desktop-nav">
                    <ul class="clearlist">
                        <li ><a href="{{ url('/') }}" class="mn-has-sub {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="slash">/</li>
                        <li class="{{ Request::is('hotel*') ? 'active-li' : '' }}"><a
                                href="{{ route('frontend.hotel') }}"
                                class="mn-has-sub {{ Request::is('hotel') ? 'active' : '' }}">Hotel</a>
                        </li>
                        <li class="slash">/</li>
                        <li class="{{ Request::is('events*') ? 'active-li' : '' }}"><a
                                href="{{ route('frontend.event') }}"
                                class="mn-has-sub {{ Request::is('events') ? 'active' : '' }}">Event</a>
                        </li>
                        <li class="slash">/</li>
                        @guest
                            <li><a href="{{ route('login') }}" class="mn-has-sub">Login</a></li>
                            <li><a href="{{ route('register') }}" class="mn-has-sub">Register</a></li>
                        @else
                            <li><a href="#" class="mn-has-sub">{{ auth()->user()->name }}</a>
                                <ul class="mn-sub">
                                    <li>
                                        <a href="{{ route('frontend.wistlist') }}">Wistlish</a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                            Out</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            @endif
        </div>
    </nav>
</header>
