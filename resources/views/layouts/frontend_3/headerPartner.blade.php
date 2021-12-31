<header id="masthead" class="site-header header-primary">
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
                <nav id="navigation" class="navigation">
                    <ul>
                        <li>
                            <a href="#">Cara Bermitra</a>
                        </li>
                    </ul>
                </nav>
                {{-- @include('layouts.frontend_3.menu') --}}
            </div>
            <div class="header-btn">
                {{-- @guest
                <a href="{{ route('login') }}" class="button-primary">LOGIN</a>
                <a href="{{ route('register') }}" class="button-primary">REGISTER</a>
                @else
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="button-primary" style="text-transform: uppercase">{{ auth()->user()->name }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                @endguest --}}
            </div>
        </div>
    </div>
    <div class="mobile-menu-container"></div>
</header>