@extends('layouts.frontend_4.app')

@section('title')
    Plesiran Malang - Pesona Plesiran Indonesia
@endsection

@section('content')
<?php $asset = asset('frontend/assets4/'); ?>

<section class="small-section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="title-section"><span>Hotels</span></h2>
                <div class="cws_divider mb-25 mt-5"></div>
            </div>
            <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
        </div>
        <div class="row">
            <!-- Recomended item-->
            @forelse ($hotels as $hotel)
            <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id', $hotel->id)->first(); ?>
            <div class="col-md-6">
                <div class="recom-item">
                    <div class="recom-media"><a href="{{ route('plmlg.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <div class="pic">
                                @if ($imageHotel == null)
                                <img src="{{ 'frontend/assets2/images/tour-thumb01.jpg' }}"
                                    data-at2x="{{ 'frontend/assets2/images/tour-thumb01.jpg' }}" style="width: 770px; height: 240px; object-fit: cover;" alt>
                                @else
                                <img src="{{ asset('backend/assets2/images/hotel/' . $imageHotel['image']) }}"
                                    data-at2x="{{ asset('backend/assets2/images/hotel/' . $imageHotel['image']) }}" alt>
                                @endif
                            </div>
                        </a>
                        <div class="location"><i class="flaticon-suntour-map"></i> {{ $hotel->kotas->nama }}, {{ $hotel->provinsis->nama }}
                        </div>
                    </div>
                    <!-- Recomended Content-->
                    <div class="recom-item-body"><a href="{{ route('plmlg.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <h6 class="blog-title">{{ $hotel->nama_hotel }}</h6>
                        </a>
                        <div class="stars stars-4"></div>
                        <div class="recom-price"><span class="font-4">IDR {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'), 0, ',', '.') }}</span> per night</div>
                        <p class="mb-30">{{ substr(strip_tags($hotel->deskripsi), 0, 50) }}
                        </p><a href="{{ route('plmlg.hotelDetail', ['slug' => $hotel->slug]) }}" class="recom-button">Read more</a><a
                            href="{{ route('plmlg.hotelDetail', ['slug' => $hotel->slug]) }}" class="cws-button small alt">Book now</a>
                        {{-- <div class="action font-2">20%</div> --}}
                    </div>
                    <!-- Recomended Image-->
                </div>
            </div>
            @empty
                <p>Segera Hadir</p>
            @endforelse
        </div>
    </div>
</section>
@endsection