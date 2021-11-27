<!doctype html>
<html lang="zxx">
<head>
<!-- META TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Pesona Plesiran Indonesia</title>
<meta name="author" content="GFX Partner">
<meta name="description" content="Pesona Plesiran Indonesia">
<meta name="keywords" content="tour, ice, trip, travel, agency, life, vacation, treking, boat, walking, climbing, transition, svg, html, css">

<!-- FAVICON FILES -->
{{-- <link href="frontend/assets2/ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
<link href="frontend/assets2/ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
<link href="frontend/assets2/ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
<link href="frontend/assets2/ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon"> --}}
<link href="{{ url('frontend/assets2/images/favicon.png') }}" rel="shortcut icon">

<!-- CSS FILES -->
<link rel="stylesheet" href="{{ url('frontend/assets2/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('frontend/assets2/css/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ url('frontend/assets2/css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ url('frontend/assets2/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('frontend/assets2/css/style.css') }}">
<link rel="stylesheet" href="{{ url('frontend/assets2/css/whatsapp.css') }}">
<link rel="stylesheet" href="{{ url('frontend/assets2/css/scroll.css') }}">
<link href="{{ url('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

</head>
<body>
<div class="preloader">
  <svg class="spinner" viewBox="0 0 50 50">
    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
  </svg>
</div>
<!-- end preloader -->
<div class="search-box">
  <div class="container">
    <div class="row">
      <div class="col-12"> <span class="search-close-btn"><i class="fa fa-times"></i></span>
        <h3>Make Quick Search to Find!</h3>
        <form>
          <div class="form-group"> <i class="fa fa-search"></i>
            <input type="text" placeholder="Search Activities, Themes or Tours">
          </div>
          <!-- end form-group -->
          <button type="submit">SEARCH</button>
        </form>
        <dl>
          <dt>Suggestions <i class="fa fa-long-arrow-right"></i></dt>
          <dd><a href="#">Adventure</a></dd>
          <dd><a href="#">Nothern Lights</a></dd>
          <dd><a href="#">Waterfalls</a></dd>
          <dd><a href="#">Winter Tours</a></dd>
          <dd><a href="#">Glaciar Walk</a></dd>
        </dl>
      </div>
      <!-- end col-12 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>
<!-- end search-box -->
@include('layouts.frontend2.header')
<!-- end header -->
@yield('content')

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
{{-- <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float back-to-top" target="_blank"> --}}
<a href="https://api.whatsapp.com/send?phone={{ $whatsapp['nomor'] }}&text={{ $whatsapp['message'] }}" class="float back-to-top" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<a href="#" class="back-to-top1 d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('layouts.frontend2.footer')

<!-- JS FILES -->
<script
  src="{{ url('frontend/assets2/js/jquery-3.4.1.min.js') }}"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="{{ url('frontend/assets2/js/moment.min.js') }}"></script>
<script src="{{ url('frontend/assets2/js/daterangepicker.min.js') }}"></script>
<script>
	// PRELOADER
		(function($) {
			$(window).on("load", function(){
				$("body").addClass("page-loaded");
			});
		})(jQuery)
</script>
@yield('js')
<script src="{{ url('frontend/assets2/js/popper.min.js') }}"></script>
<script src="{{ url('frontend/assets2/js/bootstrap.min.js') }}"></script>
<script src="{{ url('frontend/assets2/js/swiper.min.js') }}"></script>
<script src="{{ url('frontend/assets2/js/wow.min.js') }}"></script>
<script src="{{ url('frontend/assets2/js/odometer.min.js') }}"></script>
<script src="{{ url('frontend/assets2/js/scripts.js') }}"></script>

</body>
</html>
