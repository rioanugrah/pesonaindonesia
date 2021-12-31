@extends('layouts.frontend_3.app')

@section('title')
    Hotel
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container"
            style="background-image: url({{ asset('frontend/assets3/images/wallpaper/news-6.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Hotel</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <section class="package-offer-wrap">
        <div class="special-section">
            <div class="container">
                <div class="special-inner">
                    <div class="row">
                        @forelse ($hotels as $hotel)
                        <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id',$hotel->id)->first(); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="special-item">
                                <figure class="special-img">
                                    @if ($imageHotel == null)
                                    <img src="{{ asset('frontend/assets2/images/tour-thumb01.jpg') }}" style="width: 360px; height: 450px; object-fit: cover;" alt="">
                                    @else
                                    <img src="{{ asset('backend/assets2/images/hotel/'.$imageHotel['image']) }}" style="width: 360px; height: 450px; object-fit: cover;" alt="">
                                    @endif
                                </figure>
                                {{-- <div class="badge-dis">
                                    <span>
                                        <strong>20%</strong>
                                        off
                                    </span>
                                </div> --}}
                                <div class="special-content">
                                    <div class="meta-cat">
                                        <a href="#">Indonesia</a>
                                    </div>
                                    <h3>
                                        <a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">{{ $hotel->nama_hotel }}</a>
                                    </h3>
                                    <div class="package-price">
                                        IDR {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'),0,",",".") }}
                                        {{-- <del>$1500</del> --}}
                                        {{-- <ins></ins> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4>Segera Hadir</h4>
                        @endforelse
                    </div>
                    {{ $hotels->links('vendor.pagination.customPaginateFrontend') }}
                </div>
            </div>
        </div>
    </section>
@endsection
