<header class="main_header_area">
    <div class="header-content py-1 bg-theme">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="links">
                <ul>
                    <li><a href="javascript:void()" class="white"><i class="icon-calendar white"></i> {{ \Carbon\Carbon::now()->isoFormat('LL') }}</a></li>
                    <li><a href="javascript:void()" class="white"><i class="icon-location-pin white"></i>  Malang, Indonesia</a></li>
                    <li><a href="javascript:void()" class="white"><i class="icon-clock white"></i> Senin-Sabtu: 08.00 – 19.00</a></li>
                </ul>
            </div>
            <div class="links float-right">
                <ul>  
                    <li><a href="https://www.instagram.com/pesonaplesiranid.official/" class="white"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navigation Bar -->
    <div class="header_menu" id="header_menu">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('frontend') }}">
                            <img src="{{ $assets }}/images/logo_plesiran_new_black2.webp" width="200" alt="image">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            {{-- <li class="dropdown submenu active">
                                <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <i class="icon-arrow-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Homepage Default</a></li>
                                    <li><a href="index-1.html">Homepage 1</a></li>
                                    <li><a href="index-2.html">Homepage 2</a></li>
                                    <li><a href="index-3.html">Homepage 3</a></li>
                                    <li><a href="index-4.html">Homepage 4</a></li>
                                    <li><a href="index-5.html">Homepage 5</a></li>
                                    <li class="submenu dropdown">
                                        <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Flights <i class="fa fa-angle-right" aria-hidden="true"></i></a> 
                                        <ul class="dropdown-menu">
                                            <li><a href="index-flight.html">Flight Homepage</a></li>
                                            <li><a href="flight-grid.html">Flight Grid</a></li>
                                            <li><a href="flight-list.html">Flight List</a></li>
                                            <li><a href="flight-detail.html">Flight Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cars <i class="fa fa-angle-right" aria-hidden="true"></i></a> 
                                        <ul class="dropdown-menu">
                                            <li><a href="index-car.html">Car Homepage</a></li>
                                            <li><a href="car-grid.html">Car Grid</a></li>
                                            <li><a href="car-list.html">Car List</a></li>
                                            <li><a href="car-detail.html">Car Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu dropdown">
                                        <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cruise <i class="fa fa-angle-right" aria-hidden="true"></i></a> 
                                        <ul class="dropdown-menu">
                                            <li><a href="index-cruise.html">Cruise Homepage</a></li>
                                            <li><a href="cruise-grid.html">Cruise Grid</a></li>
                                            <li><a href="cruise-list.html">Cruise List</a></li>
                                            <li><a href="cruise-detail.html">Cruise Detail</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> --}}
                            @include('layouts.frontend_5.menu')
                        </ul>
                    </div><!-- /.navbar-collapse -->     
                    {{-- <div class="register-login d-flex align-items-center">
                        <a href="#" class="me-3">
                            Login
                        </a>
                        <a href="#" class="me-3">
                            Register
                        </a>
                    </div>  --}}
                    <div id="slicknav-mobile"></div>
                </div>
            </div><!-- /.container-fluid --> 
        </nav>
    </div>
    <!-- Navigation Bar Ends -->
</header>