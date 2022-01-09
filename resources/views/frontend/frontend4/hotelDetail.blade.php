@extends('layouts.frontend_4.app')

@section('title')
    Hotel {{ $hotels->nama_hotel }}
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});"
        class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">hotel</a><i>/</i><a href="#"
                    class="last"><span>Hotel</span> {{ $hotels->nama_hotel }}</a>
                <h2><span>Hotel</span> {{ $hotels->nama_hotel }}
                </h2>
                <div class="location"><i class="flaticon-suntour-map"></i>
                    <p class="font-4">{{ $hotels->alamat }}</p><a href="#location" class="scrollto">Show
                        map</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="page-section pt-0 pb-50">
        <div class="container">
            <div class="menu-widget with-switch mt-30 mb-30">
                <ul class="magic-line">
                    <li class="current_item"><a href="#overview" class="scrollto">Overview</a></li>
                    <li><a href="#prices" class="scrollto">Prices</a></li>
                    <li><a href="#location" class="scrollto">Location</a></li>
                </ul>
            </div>
        </div>
        {{-- <div class="container">
            <div id="flex-slider" class="flexslider">
                <ul class="slides">
                    <li><img src="pic/flexslider/l-1.jpg" alt></li>
                    <li><img src="pic/flexslider/l-2.jpg" alt></li>
                    <li><img src="pic/flexslider/l-3.jpg" alt></li>
                    <li><img src="pic/flexslider/l-4.jpg" alt></li>
                    <li><img src="pic/flexslider/l-5.jpg" alt></li>
                    <li><img src="pic/flexslider/l-6.jpg" alt></li>
                    <li><img src="pic/flexslider/l-7.jpg" alt></li>
                    <li><img src="pic/flexslider/l-8.jpg" alt></li>
                    <li><img src="pic/flexslider/l-9.jpg" alt></li>
                    <li><img src="pic/flexslider/l-1.jpg" alt></li>
                </ul>
            </div>
            <div id="flex-carousel" class="flexslider">
                <ul class="slides">
                    <li><img src="pic/flexslider/1@2x.jpg" data-at2x="pic/flexslider/1@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/2.jpg" data-at2x="pic/flexslider/2@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/3.jpg" data-at2x="pic/flexslider/3@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/4.jpg" data-at2x="pic/flexslider/4@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/5.jpg" data-at2x="pic/flexslider/5@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/6.jpg" data-at2x="pic/flexslider/6@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/7@2x.jpg" data-at2x="pic/flexslider/7@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/8@2x.jpg" data-at2x="pic/flexslider/8@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/9.jpg" data-at2x="pic/flexslider/9@2x.jpg" alt></li>
                    <li><img src="pic/flexslider/1.jpg" data-at2x="pic/flexslider/1@2x.jpg" alt></li>
                </ul>
            </div>
        </div> --}}
        <div class="container mt-30">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-15">{{ $hotels->deskripsi }}</p>
                </div>
            </div>
        </div>
        <!-- section prices-->
        <div id="prices" class="container mb-50 mt-40">
            <div class="search-hotels room-search pattern">
                <div class="search-room-title">
                    <h5>Choose your room</h5>
                </div>
                <div class="tours-container">
                    <div class="tours-box">
                        <div class="tours-search mb-20">
                            <div class="tours-calendar divider-skew">
                                <input placeholder="Check In" type="text" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" class="calendar-default textbox-n"><i
                                    class="flaticon-suntour-calendar calendar-icon"></i>
                            </div>
                            <div class="tours-calendar divider-skew">
                                <input placeholder="Check Out" type="text" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" class="calendar-default textbox-n"><i
                                    class="flaticon-suntour-calendar calendar-icon"></i>
                            </div>
                            <div class="selection-box divider-skew"><i class="flaticon-suntour-adult box-icon"></i>
                                <select>
                                    <option>Adult</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="selection-box divider-skew"><i class="flaticon-suntour-children box-icon"></i>
                                <select>
                                    <option>Child</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="selection-box"><i class="flaticon-suntour-bed box-icon"></i>
                                <select>
                                    <option>Room</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="button-search">GO</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="room-table">
                <table class="table alt-2">
                    <thead>
                        <tr>
                            <th>Nama Kamar</th>
                            <th>Max.</th>
                            <th>Fasilitas Popular</th>
                            <th>Harga Hari Ini</th>
                            <th>Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kamar_hotels as $km)
                        <?php $imageKamarHotel = \App\Models\ImageKamarHotel::select('image')->where('kamar_hotel_id', $km->id)->first(); ?>
                        <tr>
                            <td>
                                @if ($imageKamarHotel == null)
                                <img src="{{ asset('frontend/assets4/img/tour-thumb01.jpg') }}" style="width: 190px; height: 130px; object-fit: cover;" data-at2x="pic/190x130@2x.jpg" alt>
                                @else
                                <img src="{{ asset('backend/assets2/images/kamar_hotel/'.$imageKamarHotel['image']) }}" data-at2x="{{ asset('backend/assets4/images/kamar_hotel/'.$imageKamarHotel['image']) }}" alt>
                                @endif
                                <h6>{{ $km->nama_kamar }}</h6>
                            </td>
                            <td>
                                <div class="table-icon"><i class="flaticon-people"></i><i class="flaticon-people"></i><i
                                        class="flaticon-people"></i><i class="flaticon-people"></i><i
                                        class="flaticon-people alt"></i></div>
                                <p>4 guest</p>
                            </td>
                            <td>
                                <ul class="style-1">
                                    @foreach ($fasilitas_popular as $fp)
                                    <li>{{ $fp->nama_fasilitas_umum }}</li>
                                    @endforeach
                                    {{-- <li>Special conditions, pay when you stay</li>
                                    <li>Breakfast included</li>
                                    <li>Free Parking</li> --}}
                                </ul>
                            </td>
                            <td class="room-price">IDR {{ number_format($km->price,0,",",".") }}</td>
                            <td> <a href="#" class="cws-button alt gray">Book now</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Data Belum Tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- section location-->
        <div id="location" class="container mb-50">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="trans-uppercase mb-10">Location</h4>
                    <div class="cws_divider mb-30"></div>
                    <!-- google map-->
                    <div class="map-wrapper">
                        <iframe
                            src="https://maps.google.com/maps?q={{ $hotels->nama_hotel }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            allowfullscreen=""></iframe>
                    </div>
                    <ul class="icon inline mt-20">
                        <li> <a href="#">{{ $hotels->alamat }}<i class="flaticon-suntour-map"></i></a></li>
                        <li> <a href="#">-<i class="flaticon-suntour-phone"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
