<header>
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
            </div>
        </div>
    </div>
    <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
            <div class="nav-logo-wrap local-scroll"><a href="{{ route('frontend') }}" class="logo"><img
                        src="{{ $asset . '/img/logo_plesiran_new_black.png' }}"
                        data-at2x="{{ $asset . '/img/logo_plesiran_new_black.png' }}" alt></a></div>
            <div class="inner-nav desktop-nav">
                <ul class="clearlist">
                    <li><a href="{{ url('/') }}" class="mn-has-sub active">Home</a>
                    </li>
                    <li class="slash">/</li>
                    <li><a href="{{ route('frontend.hotel') }}" class="mn-has-sub">Hotel</a>
                    </li>
                    <li class="slash">/</li>
                    @guest
                    <li><a href="{{ route('login') }}" class="mn-has-sub">Login</a></li>
                    <li><a href="{{ route('register') }}" class="mn-has-sub">Register</a></li>
                    @else
                    <li><a href="#" class="mn-has-sub">{{ auth()->user()->name }}</a>
                        <ul class="mn-sub">
                            <li>
                                <a href="#">Wistlish</a>
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
        </div>
    </nav>
    @yield('breadcum')
</header>
