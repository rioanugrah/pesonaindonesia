<header class="header-denmark">
    <div class="container">
      <nav class="navbar"> <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ url('frontend/assets2/images/logo_plesiran.png') }}" alt="Image"></a>
  
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
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">BERANDA</a></li>
          <li class="nav-item"><a class="nav-link" href="#team">TEAM KAMI</a></li>
          <li class="nav-item"><a class="nav-link" href="#tentang">TENTANG KAMI</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">KONTAK KAMI</a></li>
        </ul>
      </nav>
      <!-- end navbar -->
    </div>
    <!-- end container -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        @foreach ($wallpaper as $wp)
        <div class="swiper-slide">
         <div class="slide-inner bg-image" data-background="frontend/assets2/images/wallpaper/{{ $wp['image'] }}">
          <div class="container">
            <h2 data-swiper-parallax="-300">{{ $wp['nama_slider'] }}</h2>
            {{-- <a href="#" class="link" data-swiper-parallax="-100"><img src="{{ $wp['arrow'] }}" alt="Image">LEARN MORE</a> --}}
          </div>
          <!-- end container -->
          </div>
          <!-- end slide-inner -->
        </div>
        @endforeach
      </div>
      <!-- end swiper-wrapper -->
      {{-- <div class="swiper-custom-pagination"></div> --}}
      <!-- end swiper-custom-pagination -->
    </div>
    <!-- end swiper-container -->
  </header>