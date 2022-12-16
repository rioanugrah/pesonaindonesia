@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>
@section('head')
    {!! Adsense::javascript() !!}
@endsection
@section('title')
    {{ $paket_lists->nama_paket }}
@endsection

@section('content')
    <section class="breadcrumb-main pb-20 pt-14"
        style="background-image: url({{ asset('frontend/assets4/img/paket/list/' . $paket_lists->images) }});">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $asset }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">{{ $paket_lists->nama_paket }}</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $paket_lists->nama_paket }}</li>
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
                    <div class="single-content">
                        <div id="highlight" class="mb-4">
                            <div class="single-full-title border-b mb-2 pb-2">
                                <div class="single-title">
                                    <h2 class="mb-1">{{ $paket_lists->nama_paket }}</h2>
                                    <div class="rating-main d-flex align-items-center">
                                        <p class="mb-0 me-2"><i class="icon-location-pin"></i> {{ $paket_lists->alamat }}</p>
                                        <div class="rating me-2">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        <span>(0 Reviews)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="description-images mb-4">
                                <img src="{{ asset('frontend/assets4/img/paket/list/'.$paket_lists->images) }}" style="width: 700px; height: 630px; object-fit: cover;" alt="{{ $paket_lists->nama_paket }}" class="w-100 rounded">
                            </div>

                            <div class="description mb-2">
                                <h4>Deskripsi</h4>
                                <p>{{ $paket_lists->deskripsi }}</p>
                            </div>

                            {{-- <div class="description d-md-flex">
                                <div class="desc-box bg-grey p-4 rounded me-md-2 mb-2">
                                    <h5 class="mb-2">Price Includes</h5>
                                    <ul>
                                        <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Air Fares</li>
                                        <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> 3 Nights Hotel
                                            Accomodation</li>
                                        <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> Tour Guide</li>
                                        <li class="d-block"><i class="fa fa-check pink mr-1"></i> Entrance Fees</li>
                                    </ul>
                                </div>
                                <div class="desc-box bg-grey p-4 rounded ms-md-2 mb-2">
                                    <h4 class="mb-2">Departure & Return Location</h4>
                                    <ul>
                                        <li class="d-block pb-1"><i class="fa fa-close pink mr-1"></i> Guide Service Fee
                                        </li>
                                        <li class="d-block pb-1"><i class="fa fa-close pink mr-1"></i> Driver Service Fee
                                        </li>
                                        <li class="d-block pb-1"><i class="fa fa-close pink mr-1"></i> Any Private Expenses
                                        </li>
                                        <li class="d-block"><i class="fa fa-close pink mr-1"></i> Room Service Fees</li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>

                        <div id="single-map" class="single-map mb-4">
                            <h4>Map</h4>
                            <div class="map rounded overflow-hidden">
                                <div style="width: 100%">
                                    <iframe class=" rounded overflow-hidden" height="400"
                                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+({{ $paket_lists->alamat }})&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                        </div>

                        <div id="single-review" class="single-review mb-4">
                            <h4>Ulasan</h4>
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-4 col-md-4">
                                    <div class="review-box bg-title text-center py-4 p-2 rounded">
                                        <h2 class="mb-1 white"><span>0</span>/5</h2>
                                        <p class="mb-0 white font-italic">Dari 0 Ulasan</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- blog review -->
                        <div id="single-add-review" class="single-add-review">
                            <h4>Menulis Review</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <textarea>Comment</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-btn">
                                            <a href="#" class="nir-btn">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
