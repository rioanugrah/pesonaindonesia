@if (Request::url() == url('/'))
<header class="header-denmark">
@else
<header class="header-int">
@endif
    <div class="container">
      @if (Request::url() == url('/'))
      <nav class="navbar"> <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ url('frontend/assets2/images/logo_plesiran_new_white.png') }}" alt="Image"></a>
      @else
      <nav class="navbar dark"> <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ url('frontend/assets2/images/logo_plesiran_new_grey.png') }}" alt="Image"></a>
      @endif
          <div class="menu-btn">
            <div class="menu-circle-wrap">
              <div class="wave"></div>
              <svg class="menu-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="52" height="52" viewBox="0 0 52 52">
              <path d="M1,26a25,25 0 1,0 50,0a25,25 0 1,0 -50,0"></path>
              </svg> </div>
            <div class="bars">
              <div class="bar b1"></div>
              <div class="bar b2"></div>
              <div class="bar b3"></div>
            </div>
          </div>
          <!-- end menu-btn -->
       {{-- <span class="search-btn"><i class="fa fa-search"></i></span> --}}
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ route('frontend.hotel') }}">HOTEL</a></li>
          @guest
          <li class="nav-item">
            <div class="btn-group">
              <a href="{{ route('login') }}" class="nav-link btn btn-secondary text-white">LOGIN</a>
              <a href="{{ route('register') }}" class="nav-link btn btn-secondary text-white">REGISTER</a>
            </div>
          </li>
          {{-- <li class="nav-item"><a class="nav-link btn btn-secondary" href="{{ route('login') }}">LOGIN</a></li>
            @if (Route::has('register'))
              <li class="nav-item"><a class="nav-link btn btn-secondary" style="text-transform: uppercase" href="javascript::void">Register</a></li>
            @endif --}}
          @else
          <li class="nav-item dropdown"><a class="nav-link" style="text-transform: uppercase">{{ auth()->user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- end navbar -->
    </div>
    <!-- end container -->
    @if (Request::url() == url('/'))
    @yield('slider')
    @endif
    <!-- end swiper-container -->
  </header>