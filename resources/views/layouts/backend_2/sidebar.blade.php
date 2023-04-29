<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        {{-- <span class="badge rounded-pill bg-primary float-end">2</span> --}}
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('posting') }}" class="waves-effect">
                        <i class="fas fa-hotel"></i>
                        <span>Posting</span>
                    </a>
                </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>Persewaan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('persewaan.bus') }}">Bus</a></li>
                        <li><a href="#">Mobil</a></li>
                    </ul>
                </li>
                <li class="menu-title">Executive Officer</li>
                <li class="menu-title">Marketing Officer</li>
                {{-- <li>
                    <a href="{{ route('wisata') }}" class="waves-effect">
                        <i class="ti-package"></i>
                        <span>Wisata</span>
                    </a>
                </li> --}}
                <li class="{{ Request::is('b/coupon*') ? 'mm-active' : '' }}">
                    <a href="{{ route('coupon') }}" class="waves-effect">
                        <i class="ti-package"></i>
                        <span>Coupon</span>
                    </a>
                </li>
                <li class="{{ Request::is('b/hotel*') ? 'mm-active' : '' }}">
                    <a href="{{ route('hotel') }}" class="waves-effect">
                        <i class="fas fa-hotel"></i>
                        <span>Hotel</span>
                    </a>
                </li>
                <li class="{{ Request::is('b/travelling*') ? 'mm-active' : '' }}">
                    <a href="{{ route('travelling') }}" class="waves-effect">
                        <i class="ti-package"></i>
                        <span>Travelling</span>
                    </a>
                </li>
                {{-- <li class="{{ Request::is('b/paket*') ? 'mm-active' : '' }}">
                    <a href="{{ route('paket') }}" class="waves-effect">
                        <i class="ti-package"></i>
                        <span>Paket Wisata</span>
                    </a>
                </li> --}}
                <li class="{{ Request::is('b/paket_order*') ? 'mm-active' : '' }}">
                    <a href="{{ route('paket.order') }}" class="waves-effect">
                        <i class="ti-package"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li class="menu-title">Operational Officer</li>
                <li class="{{ Request::is('b/cooperation*') ? 'mm-active' : '' }}">
                    <a href="{{ route('cooperation') }}" class="waves-effect">
                        <i class="fas fa-book"></i>
                        <span>Kerjasama</span>
                    </a>
                </li>
                <li class="{{ Request::is('b/events*') ? 'mm-active' : '' }}">
                    <a href="{{ route('events') }}" class="waves-effect">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>Vendor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('vendors') }}">Data Vendor</a></li>
                    </ul>
                </li>
                <li class="menu-title">Information Technology</li>
                <li class="{{ Request::is('b/perusahaan*') ? 'mm-active' : '' }}">
                    <a href="{{ route('perusahaan') }}" class="waves-effect">
                        <i class="fas fa-city"></i>
                        <span>Perusahaan</span>
                    </a>
                </li>
                {{-- <li class="{{ Request::is('b/kategori_bidang_usaha*') ? 'mm-active' : '' }}">
                    <a href="#" class="waves-effect">
                        <i class="fas fa-city"></i>
                        <span>Kategori Bidang Usaha</span>
                    </a>
                </li> --}}
                {{-- <li class="{{ Request::is('b/kategori_kota*') ? 'mm-active' : '' }}">
                    <a href="{{ route('ktkota') }}" class="waves-effect">
                        <i class="fas fa-city"></i>
                        <span>Kategori Kota</span>
                    </a>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>Kategori</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('kategori.bidang_usaha') }}">Bidang Usaha</a></li>
                        <li><a href="{{ route('kategori.persewaan') }}">Persewaan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>SEO</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('post') }}">Post</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>Visitor</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('visitor') }}">Visitor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-wrench"></i>
                        <span>Frontend</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('slider') }}">Slider</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Akses User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('log') }}">Log</a></li>
                        <li><a href="{{ route('roles') }}">Roles</a></li>
                        <li><a href="{{ route('pengguna') }}">Users</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        {{-- <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Email Read</a></li>
                        <li><a href="email-compose.html">Email Compose</a></li>
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-sweet-alert.html">SweetAlert 2</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-general.html">General</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-rating.html">Rating</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ti-receipt"></i>
                        <span class="badge rounded-pill bg-success float-end">6</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Form Advanced</a></li>
                        <li><a href="form-editors.html">Form Editors</a></li>
                        <li><a href="form-uploads.html">Form File Upload</a></li>
                        <li><a href="form-xeditable.html">Form Xeditable</a></li>
                        <li><a href="form-repeater.html">Form Repeater</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-pie-chart"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-morris.html">Morris Chart</a></li>
                        <li><a href="charts-chartist.html">Chartist Chart</a></li>
                        <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                        <li><a href="charts-flot.html">Flot Chart</a></li>
                        <li><a href="charts-knob.html">Jquery Knob Chart</a></li>
                        <li><a href="charts-sparkline.html">Sparkline Chart</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-view-grid"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Table</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-face-smile"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-material.html">Material Design</a></li>
                        <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                        <li><a href="icons-ion.html">Ion Icons</a></li>
                        <li><a href="icons-themify.html">Themify Icons</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-typicons.html">Typicons Icons</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ti-location-pin"></i>
                        <span class="badge rounded-pill bg-danger float-end">2</span>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html"> Google Map</a></li>
                        <li><a href="maps-vector.html"> Vector Map</a></li>
                    </ul>
                </li>

                <li class="menu-title">Extras</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-layout"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Light Topbar</a></li>
                                <li><a href="layouts-hori-boxed.html">Boxed Layout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span> Authentication </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-login.html">Login 1</a></li>
                        <li><a href="pages-login-2.html">Login 2</a></li>
                        <li><a href="pages-register.html">Register 1</a></li>
                        <li><a href="pages-register-2.html">Register 2</a></li>
                        <li><a href="pages-recoverpw.html">Recover Password 1</a></li>
                        <li><a href="pages-recoverpw-2.html">Recover Password 2</a></li>
                        <li><a href="pages-lock-screen.html">Lock Screen 1</a></li>
                        <li><a href="pages-lock-screen-2.html">Lock Screen 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-support"></i>
                        <span>  Extra Pages  </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-gallery.html">Gallery</a></li>
                        <li><a href="pages-maintenance.html">Maintenance</a></li>
                        <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                        <li><a href="pages-faq.html">FAQs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-bookmark-alt"></i>
                        <span>  Email Templates  </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-template-basic.html">Basic Action Email</a></li>
                        <li><a href="email-template-alert.html">Alert Email</a></li>
                        <li><a href="email-template-billing.html">Billing Email</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-more"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div> --}}
        <!-- Sidebar -->
    </div>
</div>