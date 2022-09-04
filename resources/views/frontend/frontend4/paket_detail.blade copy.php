@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('canonical')
    {{ route('frontend.paket.detail', ['slug' => $pakets->slug]) }}
@endsection
@section('description')
    {{ $pakets->deskripsi }}
@endsection
@section('title')
    {{ $pakets->nama_paket }}
@endsection

@section('header')
<section style="background-image:url('pic/breadcrumbs/bg-2.jpg');" class="breadcrumbs style-2 gray-90">
    <div class="container">
        <div class="text-left breadcrumbs-item"><a href="{{ route('frontend.paket') }}">Paket</a><i>/</i>
            <a href="#" class="last">{{ $pakets->nama_paket }}</a>
            <h2>{{ $pakets->nama_paket }}
                {{-- <span class="stars stars-4">
                    <span>4 stars</span>
                </span> --}}
            </h2>
        </div>
    </div>
</section>
@endsection

@section('content')
    <section class="page-section pt-0 pb-50">
        <div id="prices" class="container mb-10 mt-40">
            <div class="search-hotels room-search pattern">
                <div class="search-room-title text-center">
                    <h5>List Paket</h5>
                </div>
            </div>
            <div class="room-table">
                <table class="table alt-2">
                    <thead>
                        <tr>
                            <th>Paket</th>
                            <th>Maksimal</th>
                            <th>Harga</th>
                            <th>Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <img src="pic/190x130.jpg" data-at2x="pic/190x130@2x.jpg" alt="">
                                <h6>Deluxe Room, Sea View</h6>
                                <p class="mb-0">(Extra beds available: Crib, <br> Rollaway bed)</p>
                            </td>
                            <td>
                                <div class="table-icon"><i class="flaticon-people"></i><i class="flaticon-people"></i><i
                                        class="flaticon-people alt"></i><i class="flaticon-people alt"></i><i
                                        class="flaticon-people alt"></i></div>
                                <p>2 guest</p>
                            </td>
                            <td class="room-price">Sold out</td>
                            <td> <a href="#" class="cws-button alt gray">Book now</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="location" class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="trans-uppercase mb-10">Location</h4>
                    <div class="cws_divider mb-30"></div>
                    <!-- google map-->
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25295.930156304785!2d16.371063311644324!3d48.208404844730474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d07986fcad78b%3A0x73f5a4d267cc4174!2zTmFnbGVyZ2Fzc2UgMTAsIDEwMTAgV2llbiwg0JDQstGB0YLRgNC40Y8!5e0!3m2!1sru!2sua!4v1453294615596"
                            allowfullscreen=""></iframe>
                    </div>
                    <ul class="icon inline mt-20">
                        <li> <a href="#">9300 Meadow Lane, Kalamazoo, MI 49009<i class="flaticon-suntour-map"></i></a>
                        </li>
                        <li> <a href="#">00 1 877-859-5095<i class="flaticon-suntour-phone"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="reviews" class="container mb-60">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="trans-uppercase mb-10">Testimoni</h4>
                    <div class="cws_divider mb-30"></div>
                </div>
            </div>
            <div class="reviews-wrap">
                <div class="reviews-top pattern relative">
                    <div class="reviews-total">
                        <h5>Excellent</h5>
                        <div class="reviews-sub-mark">4.2</div>
                        <div class="stars-perc"><span style="width:85%"></span></div><span>Based on 67 reviews</span>
                    </div>
                    <div class="reviews-marks">
                        <ul>
                            <li>Cleanliness<span><span class="stars-perc"><span style="width:85%"></span></span>4.5</span>
                            </li>
                            <li>Location<span><span class="stars-perc"><span style="width:80%"></span></span>4.0</span>
                            </li>
                            <li>Staff<span><span class="stars-perc"><span style="width:100%"></span></span>5.0</span></li>
                            <li>Free Wi-Fi<span><span class="stars-perc"><span style="width:65%"> </span></span>3.5</span>
                            </li>
                        </ul>
                        <ul>
                            <li>Comfort<span><span class="stars-perc"><span style="width:85%"> </span></span>4.5</span>
                            </li>
                            <li>Facilities<span><span class="stars-perc"><span style="width:80%"></span></span>4.0</span>
                            </li>
                            <li>Value for money<span><span class="stars-perc"><span style="width:100%">
                                        </span></span>5.0</span></li>
                        </ul>
                    </div>
                </div>
                <div class="comments">
                    <div class="comment-body">
                        <div class="avatar"><img src="pic/blog/90x90/1.jpg" data-at2x="pic/blog/90x90/1@2x.jpg"
                                alt="">12 Reviews</div>
                        <div class="comment-info">
                            <div class="comment-meta">
                                <div class="title">
                                    <h5>Lovely clean, comfortable hotel <span>Rachel George</span></h5>
                                </div>
                                <div class="comment-date">
                                    <div class="stars stars-5">5</div><span>Mon, 03-23-2016</span>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p>Proin ut pretium sem. Maecenas id commodo massa. Sed vitae urna hendrerit, commodo dolor
                                    non, porttitor odio. Suspendisse ac arcu eu enim lobortis luctus sed quis velit. Nam ut
                                    vestibulum orci, at sodales libero. Fusce egestas urna a dolor fermentum, id tincidunt
                                    leo eleifend. Phasellus pulvinar hendrerit pulvinar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-body">
                        <div class="avatar"><img src="pic/blog/90x90/2.jpg" data-at2x="pic/blog/90x90/2@2x.jpg"
                                alt="">12 Reviews</div>
                        <div class="comment-info">
                            <div class="comment-meta">
                                <div class="title">
                                    <h5>Brilliant hotel with history <span>Phillip Ferguson</span></h5>
                                </div>
                                <div class="comment-date">
                                    <div class="stars stars-4">4</div><span>Mon, 03-23-2016</span>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p>Vestibulum tellus justo, scelerisque sit amet imperdiet et, placerat non massa. Aliquam
                                    erat volutpat. Proin vitae enim cursus, dapibus est at, feugiat mauris. Sed molestie
                                    dolor sed ante dictum dictum. Quisque at nulla ipsum. Praesent interdum euismod turpis,
                                    eget tristique justo porta eu. Cras ullamcorper pulvinar nibh, eget faucibus neque porta
                                    in.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="reviews-bottom">
                    <h4>You've been in this hotel?</h4>
                </div>
            </div>
        </div>
    </section>
@endsection