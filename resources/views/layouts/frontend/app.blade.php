<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pesona Plesiran Indonesia">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <title>Pesona Plesiran Indonesia</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/favicon.png') }}" type="image/x-icon">
    <link href="frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="frontend/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="frontend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="frontend/assets/css/style.css" rel="stylesheet">

</head>
<body>
  
  @include('layouts.frontend.header')

  @yield('content')

  @include('layouts.frontend.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
    <script src="frontend/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="frontend/assets/vendor/aos/aos.js"></script>
    <script src="frontend/assets/vendor/php-email-form/validate.js"></script>
    <script src="frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="frontend/assets/vendor/purecounter/purecounter.js"></script>
    <script src="frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="frontend/assets/js/main.js"></script>

</html>