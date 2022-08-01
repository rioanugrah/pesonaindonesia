@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>

@section('keywords')tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia, pesona indonesia @endsection

@section('canonical'){{ url('wisata') }}@endsection
@section('description')Lokawisata, tempat wisata atau objek wisata adalah sebuah tempat rekreasi/tempat berwisata. Objek wisata dapat berupa objek wisata alam seperti gunung, danau, sungai, pantai, laut, atau berupa objek wisata bangunan seperti museum, benteng, situs peninggalan sejarah, dll.@endsection


@section('title')
    Wisata
@endsection

@section('content')
    <div class="container page">
        <h3>Wisata</h3>
        @forelse ($wisatas as $wisata)
        <div class="col-md-6">
            <div class="recom-item border">
                <div class="recom-media"><a href="{{ route('frontend.hotelDetail', ['slug' => $wisata->slug]) }}">
                        <div class="pic">
                            <img src="{{ $asset.'/img/tour-thumb01.jpg' }}" style="width: 770px; height: 240px; object-fit: cover;" data-at2x="{{ $asset.'/img/tour-thumb01.jpg' }}"
                            alt>
                            {{-- @if ($imageHotel == null)
                            @else
                            <img src="{{ $asset.'/hotels/'.$imageHotel['image'] }}" style="width: 770px; height: 240px; object-fit: cover;" data-at2x="{{ $asset.'/hotels/'.$imageHotel['image'] }}"
                                alt>
                            @endif --}}
                        </div>
                    </a>
                    <div class="location"><i class="flaticon-suntour-map"></i> Indonesia</div>
                </div>
                <div class="recom-item-body"><a href="{{ route('frontend.hotelDetail', ['slug' => $wisata->slug]) }}">
                        <h6 class="blog-title">{{ $wisata->nama_wisata }}</h6>
                    </a>
                    <div class="stars stars-4"></div>
                    {{-- <div class="recom-price">
                        <span class="font-4">IDR {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'),0,",",".") }}</span> per night
                    </div> --}}
                    <p class="mb-30">{{ substr(strip_tags($wisata->deskripsi), 0, 50) }}</p><a
                        href="#" class="recom-button">Read more</a><a href="#"
                        class="cws-button small alt">Read Now</a>
                </div>
            </div>
        </div>
        @empty
            <div class="col-md-12">
                <p>Data Belum Tersedia</p>
            </div>
        @endforelse
    </div>
@endsection