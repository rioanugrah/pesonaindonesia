<ul class="navigation-menu rlr-navigation__menu rlr-navigation__menu--main-links">
    <!-- Dropdown menu 1 -->
    <li class="navigation-item {{ Request::is('/') ? 'is-active' : '' }}">
        <a class="navigation-link" href="{{ route('plesiranmalang.home') }}">Home</a>
    </li>
    <li class="navigation-item {{ Request::is('contact') ? 'is-active' : '' }}">
        <a class="navigation-link" href="{{ route('plesiranmalang.contact') }}">Contact</a>
    </li>
    {{-- <!-- Mega menu -->
    <li class="navigation-item has-submenu">
        <a class="navigation-link" href="#">Destination</a>
        <ul class="navigation-megamenu navigation-submenu navigation-megamenu-half">
            <li class="navigation-megamenu-container">
                <ul class="navigation-tabs">
                    <li class="rlr-navigation__tabbed-list">
                        <ul class="navigation-tabs-nav">
                            <li class="navigation-tabs-nav-item is-active"><a href="#">Africa</a>
                            </li>
                            <li class="navigation-tabs-nav-item"><a href="#">Asia</a></li>
                            <li class="navigation-tabs-nav-item"><a href="#">Australias</a></li>
                            <li class="navigation-tabs-nav-item"><a href="#">Europe</a></li>
                            <li class="navigation-tabs-nav-item"><a href="#">Americas</a></li>
                            <li class="navigation-tabs-nav-item"><a href="#">Middle East</a>
                            </li>
                            <li class="navigation-tabs-nav-item"><a href="#">View All</a></li>
                        </ul>
                    </li>
                    <li class="navigation-tabs-pane is-active">
                        <ul class="navigation-row">
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Botswana</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Egypt</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Ethiopia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Ghana</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Kenya</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Madagascar</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Morocco</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Mozambique</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Namibia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Senegal</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> South
                                                    Africa</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Tanzania</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Tunisia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Zambia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Zanzibar</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Zimbabwe</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="navigation-tabs-pane">
                        <ul class="navigation-row">
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Armenia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Azerbaijan</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Bali</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Bhutan</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Cambodia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    China</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    India</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Indonesia</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Japan</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Malaysia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Nepal</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Philippines</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Singapore</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> Sri
                                                    Lanka</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Thailand</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Vietnam</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="navigation-tabs-pane">
                        <ul class="navigation-row">
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Australia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Northern Territory</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> South
                                                    Australia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Tasmania</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> Western
                                                    Australia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> Cook
                                                    Islands</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Fiji</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    French Polynesia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> New
                                                    Zealand</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> Papua
                                                    New Guinea</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Samoa</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> Solomon
                                                    Islands</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> South
                                                    Pacific</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Vanuatu</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="navigation-tabs-pane">
                        <ul class="navigation-row">
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Austria</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Belgium</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Croatia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Cyprus</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Denmark</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Finland</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    France</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Germany</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Greece</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Ireland</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Italy</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Portugal</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Spain</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Switzerland</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> United
                                                    Kingdom</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Ukraine</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="navigation-tabs-pane">
                        <ul class="navigation-row">
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Botswana</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Egypt</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Ethiopia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Ghana</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Kenya</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Madagascar</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Morocco</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Mozambique</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="navigation-col">
                                <ul class="navigation-list">
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a href="./about.html">
                                                    Namibia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Senegal</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html"> South
                                                    Africa</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Tanzania</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Tunisia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Zambia</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Zanzibar</a></span>
                                        </div>
                                    </li>
                                    <li class="rlr-icon-text">
                                        <div class="rlr-icon-text__text-wrapper">
                                            <span class="rlr-icon-text__title"><a
                                                    href="./search-results--left-sidebar.html">
                                                    Zimbabwe</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <!-- Dropdown menu 1 -->
    <li class="navigation-item">
        <a class="navigation-link" href="./home-page.html">Tours</a>
        <ul class="navigation-dropdown">
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./product-detail-page.html">Single Tour</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./search-results--left-sidebar.html">Left
                    Sidebar</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./search-results--right-sidebar.html">Right
                    Sidebar</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./search-results--no-sidebar.html">No
                    Sidebar</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./search-results--3-col.html">Three
                    Column</a>
            </li>
        </ul>
    </li>
    <!-- Mega menu -->
    <li class="navigation-item has-submenu">
        <a class="navigation-link" href="#">Pages</a>
        <ul class="navigation-megamenu navigation-submenu">
            <li class="navigation-megamenu-container">
                <ul class="navigation-row">
                    <!-- Mega menu col 1 -->
                    <li class="navigation-col">
                        <ul class="navigation-list">
                            <li class="navigation-list-heading rlr-navigation-list-heading--tall">
                                <a href="#">Inner Pages</a>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-ph-hand-waving-light">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./about.html"> About
                                            Us</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-whatsapp">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./contact.html">
                                            Contact Us</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-carbon-location">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./contact--v2.html">
                                            Contact V2</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-add-list">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./gallery-page.html">
                                            Travel Gallery</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-feedback">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./404.html"> 404 Error
                                            Page</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Mega menu col 2 -->
                    <li class="navigation-col">
                        <ul class="navigation-list">
                            <li class="navigation-list-heading rlr-navigation-list-heading--tall">
                                <a href="#">Account Pages</a>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-add-user">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./account-pages--signup.html"> Account
                                            Signup</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-user">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./account-pages--login.html"> User Login</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-padlock">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./account-pages--forgot-password.html"> Forgot
                                            Password</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-verified">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./account-pages--verification.html"> ID
                                            Verification</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-dashboard">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./my-account-pages--order.html"> User
                                            Dashboard</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Mega menu col 4 -->
                    <li class="navigation-col">
                        <ul class="navigation-list">
                            <li class="navigation-list-heading rlr-navigation-list-heading--tall">
                                <a href="#">Ecommerce Pages</a>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-sunny">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./checkout-page.html">
                                            Checkout Page</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-wine">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./order-received.html"> Order Received</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-sidebar">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./my-account-pages--dashboard.html"> User
                                            Profile</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-sidebar-1">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./my-account-pages--order.html"> Your
                                            Orders</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-shopping">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./my-account-pages--subscription.html">
                                            Subscriptions</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Mega menu col 3 -->
                    <li class="navigation-col">
                        <ul class="navigation-list">
                            <li class="navigation-list-heading rlr-navigation-list-heading--tall">
                                <a href="#">General Utilities</a>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-full-screen">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./review-form-page.html"> Review a Tiur</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-sidebar-1">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a href="./product-form.html">
                                            Add a Tour</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-sidebar">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./icon-font-page.html"> Font Icons</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                            <li class="rlr-icon-text">
                                <span class="rlr-step__icon rlr-step__icon--active"> <i
                                        class="rlr-icon-font rlr-icon-font--megamenu flaticon-dimensions">
                                    </i> </span>
                                <div class="rlr-icon-text__text-wrapper">
                                    <span class="rlr-icon-text__title"><a
                                            href="./navigation--html-signup.html"> Menu Guest
                                            User</a></span>
                                    <span class="rlr-icon-text__subtext">Add your menu subtext
                                        here</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <!-- Dropdown menu 2 -->
    <li class="navigation-item">
        <a class="navigation-link" href="#"> Blog </a>
        <ul class="navigation-dropdown">
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./single.html">Blog Single</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./blog-listings--no-sidebar.html">Full Width
                    List</a>
            </li>
            <!-- Multi level dropdown 2 -->
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="#">Blog Sidebar</a>
                <ul class="navigation-dropdown">
                    <li class="navigation-dropdown-item">
                        <a class="navigation-dropdown-link"
                            href="./blog-listings--left-sidebar.html">Left Sidebar</a>
                    </li>
                    <li class="navigation-dropdown-item">
                        <a class="navigation-dropdown-link"
                            href="./blog-listings--right-sidebar.html">Right Sidebar</a>
                    </li>
                    <li class="navigation-dropdown-item">
                        <a class="navigation-dropdown-link" href="./blog-listings--no-sidebar.html">No
                            Sidebar</a>
                    </li>
                    <li class="navigation-dropdown-item">
                        <a class="navigation-dropdown-link"
                            href="./blog-listings--no-results.html">Search Results</a>
                    </li>
                </ul>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./blog-listings--left-sidebar.html">Left
                    Sidebar</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./blog-listings--right-sidebar.html">Right
                    Sidebar</a>
            </li>
            <li class="navigation-dropdown-item">
                <a class="navigation-dropdown-link" href="./blog-listings--no-results.html">Blog No
                    Results</a>
            </li>
        </ul>
    </li>
    <!-- Dropdown menu 2 -->
    <li class="navigation-item">
        <a class="navigation-link" href="./contact.html"> Contact </a>
    </li> --}}
</ul>