@extends('layouts.frontend_5.app')

@section('css')

@endsection

@section('title')
    Pesona Plesiran Indonesia
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection

@section('canonical')
    {{ url('/') }}
@endsection

@section('css')
    <style>
        .box {
            max-width: 280px;
            width: 100%;
            padding: 0 15px;
        }

        .skeleton {
            padding: 15px;
            max-width: 300px;
            width: 100%;
            background: #fff;
            margin-bottom: 20px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .14), 0 3px 3px -2px rgba(0, 0, 0, .2), 0 1px 8px 0 rgba(0, 0, 0, .12);
        }

        .skeleton .square {
            height: 80px;
            border-radius: 5px;
            background: rgba(130, 130, 130, 0.2);
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, rgba(130, 130, 130, 0.2)), color-stop(18%, rgba(130, 130, 130, 0.3)), color-stop(33%, rgba(130, 130, 130, 0.2)));
            background: linear-gradient(to right, rgba(130, 130, 130, 0.2) 8%, rgba(130, 130, 130, 0.3) 18%, rgba(130, 130, 130, 0.2) 33%);
            background-size: 800px 100px;
            animation: wave-squares 2s infinite ease-out;
        }

        .skeleton .line {
            height: 12px;
            margin-bottom: 6px;
            border-radius: 2px;
            background: rgba(130, 130, 130, 0.2);
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, rgba(130, 130, 130, 0.2)), color-stop(18%, rgba(130, 130, 130, 0.3)), color-stop(33%, rgba(130, 130, 130, 0.2)));
            background: linear-gradient(to right, rgba(130, 130, 130, 0.2) 8%, rgba(130, 130, 130, 0.3) 18%, rgba(130, 130, 130, 0.2) 33%);
            background-size: 800px 100px;
            animation: wave-lines 2s infinite ease-out;
        }

        .skeleton-right {
            flex: 1;
        }

        .skeleton-left {
            flex: 2;
            padding-right: 15px;
        }

        .flex1 {
            flex: 1;
        }

        .flex2 {
            flex: 2;
        }

        .skeleton .line:last-child {
            margin-bottom: 0;
        }

        .h8 {
            height: 8px !important;
        }

        .h10 {
            height: 10px !important;
        }

        .h12 {
            height: 12px !important;
        }

        .h15 {
            height: 15px !important;
        }

        .h17 {
            height: 17px !important;
        }

        .h20 {
            height: 20px !important;
        }

        .h25 {
            height: 25px !important;
        }

        .w25 {
            width: 25% !important
        }

        .w40 {
            width: 40% !important;
        }

        .w50 {
            width: 50% !important
        }

        .w75 {
            width: 75% !important
        }

        .m10 {
            margin-bottom: 10px !important;
        }

        .circle {
            border-radius: 50% !important;
            height: 80px !important;
            width: 80px;
        }

        @keyframes wave-lines {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }

        @keyframes wave-squares {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }
    </style>
@endsection

@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection
<?php $asset = asset('frontend/assets4/'); ?>
<?php $asset_new = asset('frontend/assets_new/'); ?>
<?php $asset_new_backend = asset('backend_2023/'); ?>
<?php $assets = asset('frontend/assets5/'); ?>
@section('content')
    {{-- <section class="banner overflow-hidden">
    <div class="slider top50">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($wallpaper as $wp)
                <div class="swiper-slide">
                    <div class="slide-inner">
                        <div class="slide-image" style="background-image:url({{ asset($asset . '/img/wallpaper/' . $wp->image) }})"></div>
                        <div class="swiper-content">
                            <div class="entry-meta mb-2">
                                <h5 class="entry-category mb-0 white">{{ $wp->nama_slider }}</h5>
                            </div>
                        </div>
                        <div class="dot-overlay"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</section> --}}
    {{-- <section class="about-us pb-6 pt-10" style="background-image:url({{ $assets }}/images/shape4.png); background-position:center;">
    <div class="container">

        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-1">Temukan <span class="theme">Kesempurnaan Perjalanan</span></h2>
        </div>
        <div class="why-us">
            <div class="why-us-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="icon-location-pin theme"></i>
                                </div>
                                <h4><a href="javascript:void()">Bagikan Lokasi Perjalanan Anda</a></h4>
                                <p class="mb-0 theme">100+ Reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="icon-directions theme"></i>
                                </div>
                                <h4><a href="javascript:void()">Bagikan Preferensi Perjalanan Anda</a></h4>
                                <p class="mb-0 theme">100+ Reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item p-5 pt-6 pb-6 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon mb-1">
                                    <i class="icon-compass theme"></i>
                                </div>
                                <h4><a href="javascript:void()">Di Sini 100% Agen Tur Terpercaya</a></h4>
                                <p class="mb-0 theme">100+ Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white-overlay"></div>
</section> --}}
    {{-- @if (!$travellings->isEmpty())
<section class="trending pb-9" style="margin-top: -2.5%">
    <div class="container">
        <div class="section-title mb-6 w-75 mx-auto text-center">
            <h2 class="mb-1">Jelajahi <span class="theme">Travelling</span></h2>
        </div>
        <div class="trend-box">
            <div class="row">
                @foreach ($travellings as $travelling)
                @if ($travelling->discount == 0)
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="{{ route('frontend.travelling.detail',['id' => $travelling->id, 'slug' => $travelling->slug]) }}">
                        <div class="trend-item1 rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="{{ $asset_new_backend }}/images/tour/{{ $travelling->images }}" alt="{{ $travelling->title }}" style="width: 700px; height: 250px; object-fit: cover;" class="">
                                <div class="trend-content1 p-4">
                                    <h3 class="mb-1 white" style="font-size: 14pt"><a href="{{ route('frontend.travelling.detail',['id' => $travelling->id, 'slug' => $travelling->slug]) }}" class="white">{{ $travelling->title }}</a></h3>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0 white"><span class="theme1 fw-bold fs-5"> Rp. {{ number_format($travelling->current_price,0,",",".") }}</span> | Per {{ $travelling->jenis_tour == 'Private' ? $travelling->min_people : null }} pax</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </a>
                </div>
                @else
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="trend-item1 rounded box-shadow bg-white">
                        <div class="trend-image position-relative">
                            <img src="{{ $asset_new_backend }}/images/tour/{{ $travelling->images }}" alt="{{ $travelling->title }}" style="width: 700px; height: 250px; object-fit: cover;" class="">
                            <div class="trend-content1 p-4">
                                <h3 class="mb-1 white" style="font-size: 14pt"><a href="{{ route('frontend.travelling.detail',['id' => $travelling->id, 'slug' => $travelling->slug]) }}" class="white">{{ $travelling->title }}</a></h3>
                                <div class="entry-meta d-flex align-items-center justify-content-between">
                                    <div class="entry-author align-items-center">
                                        <p class="mb-0 white">
                                            <div class="theme1 fw-bold fs-5" style="text-decoration: line-through;text-decoration-color: #eb4034; font-weight:300; font-size: 14pt">
                                                Rp. {{ number_format($travelling->current_price,0,",",".") }}
                                            </div>
                                        </p>
                                        <p class="mb-0 white">
                                            <span class="theme1 fw-bold fs-5"> Rp. {{ number_format($travelling->previous_price,0,",",".") }}
                                            </span> | Per {{ $travelling->jenis_tour == 'Private' ? $travelling->min_people : null }} pax
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="col-lg-12 text-center">
                    <a href="{{ route('frontend.travelling') }}" class="nir-btn">Lihat lainnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif --}}

    {{-- <section class="trending pb-9" style="margin-top: -2.5%">
    <div class="container">
        <div class="section-title mb-6 w-75 mx-auto text-center">
            <h2 class="mb-1">Jelajahi <span class="theme">Hotel</span></h2>
        </div>
        <div class="trend-box">
            <div class="row" id="datas">

            </div>
        </div>
    </div>
</section> --}}

    {{-- <section class="trending pb-9" style="margin-top: -2.5%">
    <div class="container">
        <div class="section-title mb-6 w-75 mx-auto text-center">
            <h2 class="mb-1">Jelajahi <span class="theme">Hotel</span></h2>
        </div>
        <div class="trend-box">
            <div class="row">
                @foreach ($list_hotels as $list_hotel)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="trend-item1 rounded box-shadow">
                        <div class="trend-image position-relative">
                            <img src="{{ $asset_new_backend }}/images/tour/{{ $travelling->images }}" alt="{{ $travelling->title }}" style="width: 700px; height: 250px; object-fit: cover;" class="">
                            <div class="trend-content1 p-4">
                                <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> Meeting Point : {{ $travelling->meeting_point }}</h5>
                                <h3 class="mb-1 white" style="font-size: 14pt"><a href="#" class="white">{{ $list_hotel['name'] }}</a></h3>
                                <div class="entry-meta d-flex align-items-center justify-content-between">
                                    <div class="entry-author d-flex align-items-center">
                                        <p class="mb-0 white"><span class="theme1 fw-bold fs-5"> Rp. {{ number_format($travelling->current_price,0,",",".") }}</span> | Per {{ $travelling->jenis_tour == 'Private' ? $travelling->min_people : null }} pax</p>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}
    @if (!$announcements->isEmpty())
    <section>
        <div class="container">
            @foreach ($announcements as $announcement)
            <div class="border-b bg-white box-shadow p-4 rounded border-all">
                <b>Information :</b> <span class="theme">{{ $announcement->title }}</span>
                <p>{{ $announcement->description }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    <section class="flight-list pt-0" style="margin-top: 5%">
        <div class="container">
            <div class="section-title mb-6 w-50 mx-auto text-center">
                {{-- <h4 class="mb-1 theme1">Recommended Flights</h4> --}}
                <h2 class="mb-1">Find Your <span class="theme">Bromo Scheduled</span></h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore.</p> --}}
            </div>

            <div class="flight-list">
                <div class="flight-navtab text-center">
                    <div class="nav nav-tabs mb-0" id="nav-tab" role="tablist">
                        @foreach ($schedule_bromos as $schedule_bromo)
                        <button class="nav-link {{ \Carbon\Carbon::today()->format('Y-m-d') == $schedule_bromo->format('Y-m-d') ? 'active' : null }}"
                            id="nav-schedule{{ $schedule_bromo->format('Y-m-d') }}-tab" data-bs-toggle="tab"
                            data-bs-target="#schedule{{ $schedule_bromo->format('Y-m-d') }}" type="button" role="tab"
                            aria-selected="true">{{ \Carbon\Carbon::create($schedule_bromo)->isoFormat('dddd') }}<span>{{ \Carbon\Carbon::create($schedule_bromo)->isoFormat('DD-MM-YYYY') }}</span></button>
                        @endforeach
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($schedule_bromos as $schedule_bromo)
                    @php
                        $bromos = \App\Models\Bromo::where('tanggal', 'LIKE', '%' . $schedule_bromo->format('Y-m-d') . '%')->get();
                    @endphp
                    <div class="tab-pane fade content {{ \Carbon\Carbon::today()->format('Y-m-d') == $schedule_bromo->format('Y-m-d') ? 'show active' : null }} text-center"
                        id="schedule{{ $schedule_bromo->format('Y-m-d') }}" role="tabpanel"
                        aria-labelledby="nav-schedule{{ $schedule_bromo->format('Y-m-d') }}-tab">
                        @forelse ($bromos as $bromo)
                            <div class="flight-full">

                                <div class="item mb-2 border-all p-2 px-4 rounded">
                                    <div class="row d-flex align-items-center justify-content-between">
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="item-inner-image text-start">
                                                <h5 class="mb-0">{{ $bromo->title }}</h5>
                                                <small>Meeting Point: {{ $bromo->meeting_point }}</small>
                                                <div style="font-size: 10pt; font-weight: bold">Destination:</div>
                                                @foreach (json_decode($bromo->destination) as $destination)
                                                    <div style="font-size: 8pt">✔ {{ $destination->destination }}</div>
                                                @endforeach
                                                <div style="font-size: 10pt; font-weight: bold">Include:</div>
                                                @foreach (json_decode($bromo->include) as $include)
                                                    <div style="font-size: 8pt">+ {{ $include->include }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <div class="item-inner">
                                                <div class="content">
                                                    <h5 class="mb-0" style="text-transform: uppercase">
                                                        {{ \Carbon\Carbon::create($bromo->tanggal)->isoformat('dddd, D MMMM YYYY') }}
                                                    </h5>
                                                    <p class="mb-0 text-uppercase">Departure Date</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="item-inner">
                                                <div class="content">
                                                    <h3 class="mb-0">
                                                        {{ \Carbon\Carbon::create($bromo->tanggal)->format('H:i') }}
                                                    </h3>
                                                    <p class="mb-0 text-uppercase">Departure Time</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <div class="item-inner flight-time">
                                                <p class="mb-0">
                                                    {{ $bromo->category_trip == 'Publik' ? 'Open Trip' : 'Private Trip' }}
                                                    <br>Kuota: {{ $bromo->quota }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <div class="item-inner text-end">
                                                <p class="theme fs-4 fw-bold">Rp.
                                                    {{ number_format($bromo->price, 0, ',', '.') }}</p>
                                                @php
                                                    $date_booking = \Carbon\Carbon::create($bromo->tanggal)->format('Y-m-d H:i');
                                                @endphp
                                                @if ($date_booking >= \Carbon\Carbon::now()->format('Y-m-d H:i'))
                                                    <a href="{{ route('frontend.bromo.booking', ['id' => $bromo->id, 'tanggal' => $schedule_bromo->format('Y-m-d')]) }}"
                                                        class="nir-btn">BOOKING NOW</a>
                                                @else
                                                    <a href="javascript:void()" class="nir-btn-black">CLOSE</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Data Paket Belum Tersedia</p>
                        @endforelse
                    </div>
                    @endforeach
                </div>
                {{-- <div class="flight-btn text-center"><a href="flight-grid.html" class="nir-btn">View More</a></div> --}}
            </div>
        </div>
    </section>

    @if (!$honeymoons->isEmpty())
        <section class="trending pb-9" style="margin-top: -5%">
            <div class="container">
                <div class="section-title mb-6 w-75 mx-auto text-center">
                    <h2 class="mb-1">Jelajahi <span class="theme">Honeymoon</span></h2>
                </div>
                <div class="trend-box">
                    <div class="row">
                        @forelse ($honeymoons as $honeymoon)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <a href="#">
                                    <div class="trend-item1 rounded box-shadow">
                                        <div class="trend-image position-relative">
                                            <img src="{{ $asset }}/img/honeymoon/{{ $honeymoon->images }}"
                                                alt="{{ $honeymoon->nama_paket }}"
                                                style="width: 700px; height: 250px; object-fit: cover;" class="">
                                            <div class="trend-content1 p-4">
                                                {{-- <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> Meeting Point : {{ $travelling->meeting_point }}</h5> --}}
                                                <h3 class="mb-1 white"><a
                                                        href="{{ route('frontend.honeymoon_detail', ['slug' => $honeymoon->slug]) }}"
                                                        class="white">{{ $honeymoon->nama_paket }}</a></h3>
                                                <div class="entry-meta d-flex align-items-center justify-content-between">
                                                    <div class="entry-author d-flex align-items-center">
                                                        <p class="mb-0 white"><span class="theme1 fw-bold fs-4"> Rp.
                                                                {{ number_format($honeymoon->price, 0, ',', '.') }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overlay"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="text-center">Paket Honeymoon Belum Tersedia</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="about-us pb-2 pt-2"
        style="background-image:url({{ $assets }}/images/shape4.png); background-position:center;">
        <div class="container">
            <div class="row align-items-center d-flex">
                <div class="col-lg-6 mb-4">
                    <div class="section-title">
                        <h2 class="mb-4"><span class="theme">Pesona</span> Plesiran Indonesia</h2>
                        <p class="mb-4">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                            menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran,
                            Transportasi, Travel dan MICE se-Indonesia.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <!-- why us starts -->
                    <div class="why-us">
                        <div class="why-us-box">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                        <div class="why-us-content">
                                            <div class="why-us-icon mb-1">
                                                <i class="icon-directions theme"></i>
                                            </div>
                                            <h4><a href="javascript:void()">Bagikan Preferensi Perjalanan Anda</a></h4>
                                            {{-- <p class="mb-0 theme">100+ Reviews</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                        <div class="why-us-content">
                                            <div class="why-us-icon mb-1">
                                                <i class="icon-location-pin theme"></i>
                                            </div>
                                            <h4><a href="javascript:void()">Bagikan Lokasi Perjalanan Anda</a></h4>
                                            {{-- <p class="mb-0 theme">100+ Reviews</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                                        <div class="why-us-content">
                                            <div class="why-us-icon mb-1">
                                                <i class="icon-compass theme"></i>
                                            </div>
                                            <h4><a href="javascript:void()">Di Sini 100% Agen Tur Terpercaya</a></h4>
                                            {{-- <p class="mb-0 theme">100+ Reviews</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- why us ends -->
                </div>
            </div>

        </div>
        <div class="white-overlay"></div>
    </section>

    @if (!$promosis->isEmpty())
        <section class="trending pb-9" style="margin-top: -2.5%">
            <div class="container">
                <div class="section-title mb-6 mx-auto text-center">
                    <h2 class="mb-1">Jelajahi <span class="theme">Promo</span></h2>
                </div>
                <div class="trend-box">
                    <div class="row">
                        @forelse ($promosis as $promosi)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="trend-item1 rounded box-shadow">
                                    <div class="trend-image position-relative">
                                        <a
                                            href="{{ route('frontend.detailPromosi', ['generate' => $promosi->id_generate, 'slug' => $promosi->slug]) }}">
                                            <img src="{{ asset('frontend/assets5/promosi/' . $promosi->images) }}"
                                                alt="{{ $promosi->nama_promosi }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="trending pb-3 pt-0">
        <div class="container">
            <div class="section-title mb-6 w-50 mx-auto text-center">
                {{-- <h4 class="mb-1 theme1">Jelajahi</h4> --}}
                <h2 class="mb-1">Jelajahi <span class="theme">Destinasi</span></h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p> --}}
            </div>
            <div class="row align-items-center">
                @foreach ($jelajahins as $jelajahi)
                    <div class="{{ $jelajahi['column'] }}">
                        <div class="trend-item1">
                            <div class="trend-image position-relative rounded">
                                <img src="{{ $jelajahi['image'] }}"
                                    style="width: 1800px; height: 220px; object-fit: cover;">
                                <div
                                    class="trend-content d-flex align-items-center justify-content-between position-absolute bottom-0 p-4 w-100 z-index">
                                    <div class="trend-content-title">
                                        <h5 class="mb-0"><a href="#"
                                                class="theme1">{{ $jelajahi['country'] }}</a></h5>
                                        <h3 class="mb-0 white">{{ $jelajahi['title'] }}</h3>
                                    </div>
                                    {{-- <span class="white bg-theme p-1 px-2 rounded">{{ $jlh['tour'] }} Tours</span> --}}
                                </div>
                                <div class="color-overlay"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <section class="trending bg-grey pt-17 pb-6">
    <div class="section-shape top-0" style="background-image: url({{ $assets }}/images/shape8.png);"></div>
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            <div class="col-lg-7">
                <div class="section-title text-center text-lg-start">
                    <h4 class="mb-1 theme1">Top Pick</h4>
                    <h2 class="mb-1">Paket <span class="theme">Wisata Terbaik</span></h2>
                </div>
            </div>
            <div class="col-lg-5">
            </div>
        </div>
        <div class="trend-box">
            <div class="row item-slider">
                @forelse ($paket_trips as $paket)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="trend-item rounded box-shadow bg-white">
                        <div class="trend-image position-relative">
                            <img src="{{ asset('frontend/assets4/img/paket/list/' . $paket->images) }}" alt="image" style="width: 800px; height: 250px; object-fit: cover;">
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative">
                            <h3 class="mb-1"><a href="{{ route('frontend.pagesDetail',['slug' => $paket->pakets->slug, 'id' => $paket->id]) }}">{{ $paket->nama_paket }}</a></h3>
                            <div class="rating-main d-flex align-items-center pb-2">
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="ms-2">(12)</span>
                            </div>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                    <p class="mb-0"><span class="theme fw-bold fs-5"> Rp. {{ number_format($paket->price, 0, ',', '.') }}</span> | Per pax</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</section> --}}
    {{-- <section class="trending pb-0">
    <div class="container">
        <div class="trend-box">
            <div class="row">
                @forelse ($coupons as $coupon)
                <a href="javascript::void()">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="trend-item1 rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="{{ $assets }}/images/kupon/{{ $coupon->coupons_images }}" alt="image" style="width: 700px; height: 150px; object-fit: cover;" class="">
                            </div>
                        </div>
                    </div>
                </a>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</section> --}}
    @if (!$coupons->isEmpty())
        <section class="trending pb-3 pt-0">
            <div class="container">
                <div class="section-title mb-6 w-75 mx-auto text-center">
                    <h4 class="mb-1 theme1">Promo</h4>
                    <h2 class="mb-1">Yuk cek promo <span class="theme">sebelum booking</span></h2>
                </div>
                <div class="row align-items-center">
                    <div class="row">
                        @forelse ($coupons as $coupon)
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('frontend.promosi', ['id' => $coupon->id]) }}">
                                    <div class="trend-item1">
                                        <div class="trend-image position-relative rounded">
                                            <img src="{{ $assets }}/images/kupon/{{ $coupon->coupons_images }}"
                                                alt="image">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="trend-item1">
                                <div class="trend-image position-relative rounded">
                                    <p class="text-center">Promo belum tersedia</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                {{-- <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
            </div>
        </div> --}}
            </div>
        </section>
    @endif
    {{-- <section class="testimonial pt-10 pb-10"  style="background-image: url({{ $assets }}/images/image/bromo.webp);">
    <div class="container">
        <div class="testimonial-in">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4 class="mb-1 theme1">Testimonials</h4>
                        <h2 class="mb-1 white">Ulasan <span class="theme">Klien</span></h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row about-slider">
                        @foreach ($testimonis as $testimoni)
                        <div class="col-sm-4 item">
                            <div class="testimonial-item1">
                                <div class="details d-flex">
                                    <i class="fa fa-quote-left fs-1 mb-0"></i>
                                    <div class="author-content ms-4">
                                        <p class="mb-4 white fs-5 fw-normal">{{ $testimoni['deskripsi'] }}</p>
                                        <div class="author-info d-flex align-items-center">
                                            <img src="{{ $assets }}/images/testimonial/img1.jpg" alt="">
                                            <div class="author-title ms-3">
                                                <h5 class="m-0 theme1">{{ $testimoni['name'] }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dot-overlay"></div>
</section> --}}
    {{-- <section class="discount-action pt-8 pb-8" style="background-image: url({{ $assets }}/images/shape-1.png); background-attachment:unset">
    <div class="container">
        <div class="call-banner1 rounded" style="background-image: url({{ $assets }}/images/image/about.webp); background-position:right;">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-6 p-0">
                    <div class="call-banner-inner bg-theme p-5 pt-10 pb-10 my-5 rounded ms-4">
                        <h5 class="mb-1 white">THERE IS ALWAYS AWAY FOR AWAY</h5>
                        <h2 class="white">Pesona Plesiran Indonesia</h2>
                        <p class="white mb-3">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
                            dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-0">
                    <div class="video-button text-center position-relative z-index2">
                        <div class="call-button text-center">
                            <button type="button" class="play-btn js-video-button" data-video-id="Yb6KMxB3I1M" data-channel="youtube">
                                <i class="fa fa-play bg-blue"></i>
                            </button>
                        </div>
                        <div class="video-figure"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <section class="discount-action"
        style="background-image:url({{ $assets }}/images/section-bg3.jpg); background-position:center; background-color: #f1f1f1;">
        <div class="container">
            <div class="call-banner rounded pt-0 py-5 overflow-visible">
                <div class="call-banner-inner w-75 px-5">
                    <div class="trend-content-main">
                        <div class="trend-content mb-5 pb-2">
                            <h2><a href="javascript:void()">There is always a way <span class="theme1"> for a
                                        way</span></a></h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p> --}}
                        </div>
                        <div class="video-button position-relative ms-lg-5 text-center text-lg-start">
                            <div class="call-button">
                                <button type="button" class="play-btn js-video-button" data-video-id="LpOdL5eS5xo"
                                    data-channel="youtube">
                                    <i class="fa fa-play bg-blue"></i>
                                </button>
                            </div>
                            <div class="video-figure"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>
    <section class="our-partner pb-5 pt-5">
        <div class="container">
            <div class="section-title mb-6 w-75 mx-auto text-center">
                {{-- <h4 class="mb-1 theme1">Our Partners</h4> --}}
                <h2 class="mb-1">Partner <span class="theme">Kami</span></h2>
                <p>Kami bekerja sama dengan</p>
            </div>
            <div class="row align-items-center partner-in partner-slider">
                @foreach ($mitras as $mitra)
                    <div class="col-md-3 col-sm-6">
                        <div class="partner-item p-4 py-2 rounded bg-lgrey">
                            <img src="{{ $mitra['image'] }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- <script src="{{ asset('frontend/axios.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets5/js/scripts.js') }}" type="javascript"></script>
    {{-- <script>
        // $.ajax({
        //     type: 'GET',
        //     url: "{{ route('api.list_hotel') }}",
        //     contentType: "application/json;  charset=utf-8",
        //     cache: false,
        //     beforeSend: function() {
        //         document.getElementById('datas').innerHTML = '<div class="box">'+
        //                                                         '<div class="skeleton">'+
        //                                                                 '<div class="skeleton-left">'+
        //                                                                     '<div class="line h17 w40 m10"></div>'+
        //                                                                     '<div class="line"></div>'+
        //                                                                     '<div class="line h8 w50"></div>'+
        //                                                                     '<div class="line  w75"></div>'+
        //                                                                 '</div>'+
        //                                                                 '<div class="skeleton-right">'+
        //                                                                 '<div class="square"></div>'+
        //                                                                 '</div>'+
        //                                                         '</div>'+
        //                                                     '</div>'+
        //                                                     '<div class="box">'+
        //                                                         '<div class="skeleton">'+
        //                                                                 '<div class="skeleton-left">'+
        //                                                                     '<div class="line h17 w40 m10"></div>'+
        //                                                                     '<div class="line"></div>'+
        //                                                                     '<div class="line h8 w50"></div>'+
        //                                                                     '<div class="line  w75"></div>'+
        //                                                                 '</div>'+
        //                                                                 '<div class="skeleton-right">'+
        //                                                                 '<div class="square"></div>'+
        //                                                                 '</div>'+
        //                                                         '</div>'+
        //                                                     '</div>'+
        //                                                     '<div class="box">'+
        //                                                         '<div class="skeleton">'+
        //                                                                 '<div class="skeleton-left">'+
        //                                                                     '<div class="line h17 w40 m10"></div>'+
        //                                                                     '<div class="line"></div>'+
        //                                                                     '<div class="line h8 w50"></div>'+
        //                                                                     '<div class="line  w75"></div>'+
        //                                                                 '</div>'+
        //                                                                 '<div class="skeleton-right">'+
        //                                                                 '<div class="square"></div>'+
        //                                                                 '</div>'+
        //                                                         '</div>'+
        //                                                     '</div>'+
        //                                                     '<div class="box">'+
        //                                                         '<div class="skeleton">'+
        //                                                                 '<div class="skeleton-left">'+
        //                                                                     '<div class="line h17 w40 m10"></div>'+
        //                                                                     '<div class="line"></div>'+
        //                                                                     '<div class="line h8 w50"></div>'+
        //                                                                     '<div class="line  w75"></div>'+
        //                                                                 '</div>'+
        //                                                                 '<div class="skeleton-right">'+
        //                                                                 '<div class="square"></div>'+
        //                                                                 '</div>'+
        //                                                         '</div>'+
        //                                                     '</div>'
        //                                                     ;
        //     },
        //     success: (result) => {
        //         // console.table(result);
        //         var datas = result.data;
        //         var txt_hotel = "";

        //         datas.forEach(htl);

        //         function htl(value, index) {
        //             txt_hotel += '<div class="col-lg-3 col-md-6 mb-4">';
        //             txt_hotel +=    '<div class="trend-item1 rounded box-shadow">';
        //             txt_hotel +=        '<div class="trend-image position-relative">';
        //             txt_hotel +=            '<img src="{{ $asset_new_backend }}/images/tour/{{ $travelling->images }}" style="width: 700px; height: 250px; object-fit: cover;" class="">';
        //             txt_hotel +=            '<div class="trend-content1 p-4">';
        //             txt_hotel +=                '<h3 class="mb-1 white" style="font-size: 14pt"><a href="#" class="white">'+value.name+'</a></h3>';
        //             txt_hotel +=                '<div class="entry-meta d-flex align-items-center justify-content-between">';
        //             txt_hotel +=                    '<div class="entry-author d-flex align-items-center">';
        //             txt_hotel +=                        '<p class="mb-0 white"><span class="theme1 fw-bold fs-5"> Rp. </span> | Per pax</p>';
        //             txt_hotel +=                    '</div>';
        //             txt_hotel +=                '</div>';
        //             txt_hotel +=            '</div>';
        //             txt_hotel +=            '<div class="overlay"></div>';
        //             txt_hotel +=        '</div>';
        //             txt_hotel +=    '</div>';
        //             txt_hotel += '</div>';
        //         }
        //         document.getElementById('datas').innerHTML = txt_hotel;
        //     },
        //     error: function(request, status, error) {

        //     }
        // });

        // const successCallback = (position) => {
        //     console.log(position);
        // };

        // const errorCallback = (error) => {
        //     console.log(error);
        // };

        // navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    </script> --}}
@endsection
