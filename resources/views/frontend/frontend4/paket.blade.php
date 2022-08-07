@extends('layouts.frontend_4.app')
@section('title')
    Paket Wisata
@endsection
<?php $asset = asset('frontend/assets4/'); ?>
@section('canonical')
    {{ url('paket') }}
@endsection
{{-- @section('description')Paket Wisata@endsection --}}
@section('content')
    <section class="page-section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {{-- <h6 class="title-section-top font-4">Special offers</h6> --}}
                    <h2 class="title-section"><span>Paket</span> Wisata</h2>
                    <div class="cws_divider mb-25 mt-5"></div>
                </div>
                <div class="col-md-4"><img src="pic/promo-1.png" data-at2x="pic/promo-1@2x.png" alt class="mt-md-0 mt-minus-70">
                </div>
            </div>
            <div class="row">
                @forelse ($pakets as $paket)
                <?php $images = \App\Models\PaketImages::where('paket_id',$paket->id)->orderBy('id','asc')->first() ?>
                <div class="col-md-6">
                    <div class="recom-item">
                        <div class="recom-media"><a href="hotels-details.html">
                                <div class="pic"><img src="{{ asset('frontend/assets4/img/paket/'.$images->images) }}" style="width: 770px; height: 240px; object-fit: cover;" data-at2x="{{ asset('frontend/assets4/img/paket/'.$images->images) }}" alt>
                                </div>
                            </a>
                            {{-- <div class="location"><i class="flaticon-suntour-map"></i> Istanbul, Turkey</div> --}}
                        </div>
                        <div class="recom-item-body"><a href="hotels-details.html">
                                <h6 class="blog-title">{{ $paket->nama_paket }}</h6>
                            </a>
                            <div class="stars stars-4"></div>
                            <div class="recom-price"><span class="font-4">Rp. {{ number_format($paket->price,2,",",".") }}</span></div>
                            {{-- <p class="mb-30">Quisque egestas a est in convallis. Maecenas pellentesque.</p> --}}
                            <a
                                href="#" class="recom-button">Selengkapnya</a><a href="#"
                                class="cws-button small alt">Book now</a>
                            {{-- <div class="action font-2">20%</div> --}}
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        {{-- <div class="features-tours-full-width">
        <div class="features-tours-wrap clearfix">
            @forelse ($pakets as $paket)
            <a href="#">
                <div class="features-tours-item">
                    <div class="features-media">
                        <img src="" style="width: 480px; height: 350px; object-fit: cover;" alt>
                        <div class="features-info-bot">
                            <h4 class="title"><span class="font-4"></span>
                                </h4>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <p>Segera Hadir</p>
            @endforelse
        </div>
    </div> --}}
    </section>
@endsection
