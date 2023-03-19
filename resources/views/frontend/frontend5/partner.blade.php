<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4">
    <title>Partner Pesona Plesiran Indonesia</title>
    <meta name="author" content="Pesona Plesiran Indonesia">
    <meta name="description" content="">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="partner, kerjasama">
    <link rel="canonical" href="">
    <link rel="shortlink" href="{{ url('/') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="agency">
    <meta property="og:title" content="Pesona Plesiran Indonesia">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Pesona Plesiran Indonesia">
    <meta property="og:description" content="">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HJ8T1V4S3H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HJ8T1V4S3H');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <?php $assets = asset('frontend/assets5/'); ?>
    <link href="{{ url('frontend/assets4/img/favicon.png') }}" rel="shortcut icon">
    <link href="{{ $assets }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ $assets }}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ $assets }}/css/plugin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ $assets }}/fonts/line-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ $assets . '/css/scroll.css' }}">
    @yield('css')
    @yield('head')
</head>
<?php $asset = asset('frontend/assets5/'); ?>
<body>
    <div id="preloader">
        <div id="status"></div>
    </div>
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
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ route('frontend.partnership') }}">
                                <img src="{{ $assets }}/images/logo_plesiran_new_black2.webp" width="200" alt="image">
                            </a>
                        </div>
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                {{-- <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('frontend') }}">Beranda</a></li>
                                <li class="{{ Request::is('travelling*') ? 'active' : '' }}"><a href="{{ route('frontend.travelling') }}">Travelling</a></li>
                                <li class="{{ Request::is('blog*') ? 'active' : '' }}"><a href="{{ route('frontend.blog') }}">Referensi</a></li>
                                <li class="{{ Request::is('event*') ? 'active' : '' }}"><a href="{{ route('frontend.event') }}">Event</a></li>
                                <li><a href="javascript:void()">Dokumentasi</a></li> --}}
                            </ul>    
                        @guest
                        <div class="register-login d-flex align-items-center">
                            <a href="{{ route('login') }}" class="me-3">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="me-3">
                                Register
                            </a>
                        </div> 
                        @else
                        <div class="register-login">
                            <ul class="nav navbar-nav">
                                <li class="dropdown submenu active">
                                    <a href="javascript:void()" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ auth()->user()->name }} <i class="icon-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if (auth()->user()->roles->id != 4)
                                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                                        @endif
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        @endguest
                        <div id="slicknav-mobile"></div>
                    </div>
            </nav>
        </div>
    </header>
    {{-- @yield('content') --}}

    <section class="breadcrumb-main pb-20 pt-14"
        style="background-image: url({{ asset('frontend/assets4/img/wallpaper/caribbean-wood-beach.jpg') }});">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $asset }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Partnership</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Partnership</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-book">
                        <div class="booking-box">
                            <form action="" method="post">
                                @csrf
                                <div class="customer-information mb-4">
                                    <h3 class="border-b pb-2 mb-2 text-center">Formulir Pendaftaran Partner</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Nama Perusahaan</label>
                                                <input type="text" name="nama_perusahaan"
                                                    placeholder="Nama Perusahaan" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Nama Pemilik</label>
                                                <input type="text" name="nama"
                                                    placeholder="Nama Pemilik" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <input type="email" name="email"
                                                    placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Alamat</label>
                                                <textarea name="alamat_perusahaan" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Jenis Perusahaan</label>
                                                <select name="kategori" id="">
                                                    <option>-- Jenis Perusahaan --</option>
                                                    <option value="Rental">Rental</option>
                                                    <option value="Jeep">Jeep</option>
                                                    <option value="Sewa">Sewa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Provinsi</label>
                                                <select name="provinsi" id="provinsi">
                                                    <option>-- Provinsi --</option>
                                                    @foreach ($provinsis as $id => $provinsi)
                                                        <option value="{{ $id }}">{{ $provinsi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Kabupaten / Kota</label>
                                                <select name="kab_kota" id="kab_kota">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Kode Pos</label>
                                                <input type="text" name="kode_pos"
                                                    placeholder="Kode Pos" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Negara</label>
                                                <select name="negara" id="">
                                                    <option>-- Negara --</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Inggris">Inggris</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>No.Telp / Whatsapp</label>
                                                <input type="text" name="telp_selular"
                                                    placeholder="No.Telp / Whatsapp" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="nir-btn w-10">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.frontend_5.footer')
    <div id="back-to-top">
        <a href="#"></a>
    </div>

    <script src="{{ $assets }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ $assets }}/js/bootstrap.min.js"></script>
    <script src="{{ $assets }}/js/particles.js"></script>
    <script src="{{ $assets }}/js/particlerun.js"></script>
    <script src="{{ $assets }}/js/plugin.js"></script>
    <script src="{{ $assets }}/js/main.js"></script>
    @guest
    <script>
        document.addEventListener("keydown", (e) => {
            if(e.ctrlKey || e.keyCode == 123){
                e.stopPropagation();
                e.preventDefault();
            }
        });
    </script>
    @else
        @if (auth()->user()->role != 1)
        <script>
            document.addEventListener("keydown", (e) => {
                if(e.ctrlKey || e.keyCode == 123){
                    e.stopPropagation();
                    e.preventDefault();
                }
            });
        </script>
        @endif
    @endguest
    <script src="{{ $assets }}/js/custom-swiper.js"></script>
    <script src="{{ $assets }}/js/custom-nav.js"></script>
    <script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script>

    @yield('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#provinsi').on('change',function(){
            axios.post('{{ url('cooperation/kab_kota') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kab_kota').empty();

                $.each(response.data, function (id, nama) {
                    // alert(nama);
                    $('#kab_kota').append(new Option(nama, id))
                })
            });
        });

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('frontend.partnership.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        // iziToast.success({
                        //     title: result.message_title,
                        //     message: result.message_content
                        // });
                        alert(result.message_content);
                        this.reset();
                        // table.ajax.reload();
                    }else{
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                        alert(result.error);
                    }
                },
                error: function (request, status, error) {
                    // iziToast.error({
                    //     title: 'Error',
                    //     message: error,
                    // });
                    alert(error);
                }
            });
        });
    </script>
</body>
</html>