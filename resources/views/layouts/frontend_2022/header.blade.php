<div class="traveltour-top-bar traveltour-with-divider">
    <div class="traveltour-top-bar-background"></div>
    <div class="traveltour-top-bar-container clearfix traveltour-top-bar-full ">
        <div class="traveltour-top-bar-left traveltour-item-pdlr"><i class="fa fa-phone" style="font-size: 16px ;color: #94999f ;margin-right: 10px ;"></i> 0813-3112-6991
            <i class="fa fa-envelope-o" style="font-size: 16px ;color: #94999f ;margin-left: 30px ;margin-right: 10px ;"></i> business@plesiranindonesia.com </div>
        <div class="traveltour-top-bar-right traveltour-item-pdlr">
            <div class="traveltour-top-bar-right-social">
                <a href="https://www.instagram.com/pesonaplesiranid.official" target="_blank" class="traveltour-top-bar-social-icon" title="instagram"><i class="fa fa-instagram" ></i></a>
            </div>
            <div class="tourmaster-user-top-bar tourmaster-guest">
                @guest
                <a class="tourmaster-user-top-bar-login" href="{{ route('login') }}"><i class="icon_lock_alt" ></i><span class="tourmaster-text" >Login</span></a>
                @else
                <a class="tourmaster-user-top-bar-login"><i class="fa fa-user" ></i> {{ auth()->user()->name }}</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                    style="display: none;">
                @csrf
                </form>
                <a href="{{ route('logout') }}" class="tourmaster-user-top-bar-signup" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-unlock" ></i> <span class="tourmaster-text" >Logout</span></a>
                {{-- <a class="tourmaster-user-top-bar-login" href="{{ route('login') }}"><i class="icon_lock_alt" ></i><span class="tourmaster-text" >Login</span></a> --}}
                @endguest
                {{-- <a class="tourmaster-user-top-bar-signup" href="#"><i class="fa fa-user" ></i><span class="tourmaster-text" >Sign Up</span></a> --}}
            </div>
        </div>
    </div>
</div>
<header class="traveltour-header-wrap traveltour-header-style-plain  traveltour-style-menu-right traveltour-sticky-navigation traveltour-style-fixed">
    <div class="traveltour-header-background"></div>
    <div class="traveltour-header-container  traveltour-container">

        <div class="traveltour-header-container-inner clearfix">
            <div class="traveltour-logo  traveltour-item-pdlr">
                <div class="traveltour-logo-inner">
                    <a href="{{ route('frontend') }}"><img src="{{ asset('frontend/assets_new/images/logo/logo_plesiran_new_black2.webp') }}" alt="" width="250" height="52" title="logo-pesona-plesiran-indonesia"></a>
                </div>
            </div>
            <div class="traveltour-navigation traveltour-item-pdlr clearfix ">
                <div class="traveltour-main-menu" id="traveltour-main-menu">
                    <ul id="menu-main-navigation-1" class="sf-menu">
                        @foreach ($menus as $menu)
                            @if ($menu['active'] == true)
                            <li class="menu-item current-menu-item traveltour-normal-menu"><a href="{{ $menu['link'] }}" class="sf-with-ul-pre">{{ $menu['name'] }}</a></li>
                            @else
                            <li class="menu-item menu-item-has-children traveltour-normal-menu"><a href="{{ $menu['link'] }}" class="sf-with-ul-pre">{{ $menu['name'] }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="traveltour-navigation-slide-bar" id="traveltour-navigation-slide-bar"></div>
                </div>
            </div>
        </div>
    </div>
</header>