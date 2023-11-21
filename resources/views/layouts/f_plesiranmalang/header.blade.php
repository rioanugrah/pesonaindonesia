<header>
    <nav id="navigation" class="navigation rlr-navigation default-nav fixed-top">
        <!-- Logo -->
        <div class="navigation-header">
            <div class="navigation-brand-text">
                <div class="rlr-logo rlr-logo__navbar-brand rlr-logo--default">
                    <a href="{{ route('plesiranmalang.home') }}">
                        <img src="{{ $assets }}/assets/logo_plesiran_malang.webp" class="" width="120">
                    </a>
                </div>
            </div>
            <div class="navigation-button-toggler">
                <span class="rlr-sVGIcon"> <i class="rlr-icon-font rlr-icon-font--megamenu flaticon-menu"> </i>
                </span>
            </div>
        </div>
        <div class="navigation-body rlr-navigation__body container">
            <div class="navigation-body-header rlr-navigation__body-header">
                <div class="navigation-brand-text">
                    <div class="rlr-logo rlr-logo__navbar-brand rlr-logo--default">
                        <a href="{{ route('plesiranmalang.home') }}">
                            <img src="{{ $assets }}/assets/logo_plesiran_malang.webp" class="" width="150">
                        </a>
                    </div>
                </div>
                <span class="rlr-sVGIcon navigation-body-close-button"> <i
                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-close"> </i> </span>
            </div>

            <!-- Main menu -->
            @include('layouts.f_plesiranmalang.menu')
            <!-- User actions menu -->
            <ul class="navigation-menu rlr-navigation__menu align-to-right">
                <!-- User account dropdown -->
                @guest
                <li class="navigation-item">
                    <a href="#" class="navigation-link">Login</a>
                </li>
                @else
                <li class="navigation-item">
                    <a class="navigation-link" href="#"> {{ auth()->user()->name }} <img class="ui right spaced avatar image"
                            src="{{ $assets }}/assets/images/blog-single-avatar.png" alt="account avatar" /> </a>
                    <ul class="navigation-dropdown">
                        <li class="navigation-dropdown-item">
                            <a class="navigation-dropdown-link"
                                href="./my-account-pages--dashboard.html">Profile</a>
                        </li>
                        <li class="navigation-dropdown-item">
                            <a class="navigation-dropdown-link" href="./my-account-pages--order.html">Your
                                Orders</a>
                        </li>
                        <li class="navigation-dropdown-item">
                            <a class="navigation-dropdown-link"
                                href="./my-account-pages--subscription.html">Subscriptions</a>
                        </li>
                        <li class="navigation-dropdown-item">
                            <a class="navigation-dropdown-link"
                                href="./search-results--no-sidebar.html">Favorites</a>
                        </li>
                        <li class="navigation-dropdown-item">
                            <hr class="dropdown-divider rlr-dropdown__divider" />
                        </li>
                        <li class="navigation-dropdown-item">
                            <a class="navigation-dropdown-link" href="./account-pages--login.html">Sign out</a>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>