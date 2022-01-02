@extends('layouts.frontend_3.app')

@section('title')
    {{ $hotels->nama_hotel }}
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id', $hotels->id)->first(); ?>
        <div class="inner-baner-container"
            @if ($imageHotel == null)
            style="background-image: url({{ asset('frontend/assets2/images/tour-thumb01.jpg') }});">
            @else
            style="background-image: url({{ asset('backend/assets2/images/hotel/' . $imageHotel['image']) }});">
            @endif
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">{{ $hotels->nama_hotel }}</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="package-section">
        <div class="container">
            <div class="package-inner">
                <div class="row">
                    @forelse ($kamar_hotels as $km)
                        <?php $imageKamarHotel = \App\Models\ImageKamarHotel::select('image')->where('kamar_hotel_id', $km->id)->first(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="{{ route('frontend.kamarHotelDetail', ['slug' => $hotels->slug , 'slug_kamar' => $km->slug]) }}">
                                        @if ($imageKamarHotel == null)
                                        <img src="{{ asset('frontend/assets2/images/tour-thumb01.jpg') }}" alt="">
                                        @else
                                        <img src="{{ asset('backend/assets2/images/kamar_hotel/'.$imageKamarHotel['image']) }}" alt="">
                                        @endif
                                        {{-- <img src="assets/images/img5.jpg" alt=""> --}}
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>IDR {{ number_format($km->price,0,",",".") }} </span> / per kamar
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            {{-- <li>
                                                <i class="far fa-clock"></i>
                                                7D/6N
                                            </li> --}}
                                            {{-- <li>
                                                <i class="fas fa-user-friends"></i>
                                                <?php $rooms = \App\Models\RoomHotel::select('jumlah_kamar')->where('kamar_hotel_id',$km->id)->first(); ?>
                                                Sisa Kamar: {{ $rooms->jumlah_kamar }}
                                            </li> --}}
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Indonesia
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="{{ route('frontend.kamarHotelDetail', ['slug' => $hotels->slug , 'slug_kamar' => $km->slug]) }}">{{ $km->nama_kamar }}</a>
                                        </h3>
                                        {{-- <div class="review-area">
                                            <span class="review-text">(25 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 60%"></span>
                                            </div>
                                        </div> --}}
                                        <p>{{ $km->deskripsi }}</p>
                                        <div class="btn-wrap">
                                            <a href="{{ route('frontend.kamarHotelDetail', ['slug' => $hotels->slug , 'slug_kamar' => $km->slug]) }}" class="button-text width-6">Booking<i
                                                    class="fas fa-arrow-right"></i></a>
                                            {{-- <a href="#" class="button-text width-6">Wish List<i
                                                    class="far fa-heart"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <h4>Segera Hadir</h4>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    <div class="map-section">
        <iframe
            src="https://maps.google.com/maps?q={{ $hotels->nama_hotel }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
            height="400" allowfullscreen="" loading="lazy"></iframe>
    </div>
@endsection
