<header id="masthead" class="site-header header-primary">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="header-contact-info">
                        <ul>
                            <li>
                                <a href="#"><i class="fas fa-phone-alt"></i>0813-3112-6991</a>
                            </li>
                            <li>
                                <a href="mailto:business@plesiranindonesia.com"><i class="fas fa-envelope"></i>
                                    business@plesiranindonesia.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                    <div class="header-social social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="site-identity">
                <h1 class="site-title">
                    <a href="{{ url('/') }}">
                        <img src="{{ $asset . '/images/logo_plesiran_new_white.png' }}" alt="logo">
                    </a>
                </h1>
            </div>
            <div class="main-navigation d-none d-lg-block">
                @include('layouts.frontend_3.menu')
            </div>
            <div class="header-btn">
                @guest
                <a href="{{ route('login') }}" class="button-primary">LOGIN</a>
                <a href="{{ route('register') }}" class="button-primary">REGISTER</a>
                @else
                <a href="{{ route('cart') }}" class="button-primary"><i class="fas fa-shopping-cart"></i></a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="button-primary" style="text-transform: uppercase">{{ auth()->user()->name }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                @endguest
            </div>
        </div>
    </div>
    <div class="mobile-menu-container"></div>
</header>