<div class="sidebar-wrapper sidebar-theme">
            
    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
    
    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
            <li class="nav-item d-flex">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="{{ asset('backend/assets4/img/logo-3.png') }}" class="img-fluid" alt="logo">
                </a>
                <p class="border-underline"></p>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('home') }}" class="nav-link"> Equation </a>
            </li>
        </ul>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            @include('layouts.backend_5.menu')
        </ul>
    </nav>

</div>