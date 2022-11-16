<div class="traveltour-mobile-header-wrap">
    <div class="traveltour-top-bar">
        <div class="traveltour-top-bar-background"></div>
        <div class="traveltour-top-bar-container clearfix traveltour-top-bar-full ">
            <div class="traveltour-top-bar-left traveltour-item-pdlr travel-tour-hide-on-mobile"><i class="fa fa-phone" style="font-size: 16px ;color: #94999f ;margin-right: 10px ;"></i> 0813-3112-6991
                <i class="fa fa-envelope-o" style="font-size: 16px ;color: #94999f ;margin-left: 30px ;margin-right: 10px ;"></i> business@plesiranindonesia.com
            </div>
            <div class="traveltour-top-bar-right traveltour-item-pdlr">
                <div class="traveltour-top-bar-right-social">
                    <a href="https://www.instagram.com/pesonaplesiranid.official/" target="_blank" class="traveltour-top-bar-social-icon" title="instagram"><i class="fa fa-instagram" ></i></a>
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
                </div>
            </div>
        </div>
    </div>
    <div class="traveltour-mobile-header traveltour-header-background traveltour-style-slide" id="traveltour-mobile-header">
        <div class="traveltour-mobile-header-container traveltour-container">
            <div class="traveltour-logo  traveltour-item-pdlr">
                <div class="traveltour-logo-inner">
                    <a href="{{ route('frontend') }}"><img src="{{ asset('frontend/assets_new/images/logo/logo_plesiran_new_black2.webp') }}" alt="" width="250" height="52" title="logo-v3" /></a>
                </div>
            </div>
            <div class="traveltour-mobile-menu-right">
                <div class="traveltour-mobile-menu"><a class="traveltour-mm-menu-button traveltour-mobile-menu-button traveltour-mobile-button-hamburger" href="#traveltour-mobile-menu"><span></span></a>
                    <div class="traveltour-mm-menu-wrap traveltour-navigation-font" id="traveltour-mobile-menu" data-slide="right">
                        <ul id="menu-main-navigation" class="m-menu">
                            @foreach ($menus as $menu)
                                @if ($menu['active'] == true)
                                <li class="menu-item"><a href="{{ $menu['link'] }}">{{ $menu['name'] }}</a></li>
                                @else
                                <li class="menu-item menu-item-has-children"><a href="{{ $menu['link'] }}" class="sf-with-ul-pre">{{ $menu['name'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>