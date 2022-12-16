@extends('layouts.frontend_5.app')

@section('title')
{{ $pakets->nama_paket }}
@endsection

@section('canonical')
    {{ url('paket/'.$pakets->slug) }}
@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $assets }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ $assets }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">{{ $pakets->nama_paket }}</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pakets->nama_paket }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="destination-list">
            @forelse ($paket_lists as $paket_list)
            <div class="trend-full bg-white rounded box-shadow overflow-hidden p-4 mb-4">
                <div class="row">
                    <div class="col-lg-4 col-md-3">
                       <div class="trend-item2 rounded">
                            <a href="{{ route('frontend.pagesDetail',['slug' => $pakets->slug, 'id' => $paket_list->id]) }}" style="background-image: url({{ asset('frontend/assets4/img/paket/list/'.$paket_list->images) }});"></a>
                             <div class="color-overlay"></div>
                        </div> 
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="trend-content position-relative text-md-start text-center">
                            {{-- <small>6+ Hours | Full Day Tours</small> --}}
                            <h3 class="mb-1"><a href="{{ route('frontend.pagesDetail',['slug' => $pakets->slug, 'id' => $paket_list->id]) }}">{{ $paket_list->nama_paket }}</a></h3>
                            <h6 class="theme mb-0"><i class="icon-location-pin"></i> Indonesia</h6>
                            @if ($paket_list->meeting_point != null)
                            <p class="mt-4 mb-0">Meeting Point: <br><a href="#"><span class="theme">{{ $paket_list->meeting_point }}</span></a></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="trend-content text-md-end text-center">
                            <div class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <small>5 Reviews</small>
                            <div class="trend-price my-2">
                                <span class="mb-0">From</span>
                                <h3 class="mb-0">
                                    @if ($paket_list->diskon == 0)
                                    Rp. {{ number_format($paket_list->price,0,",",".") }}
                                    @else
                                    <div style="text-decoration: line-through;text-decoration-color: #eb4034; font-weight:100">
                                        Rp. {{ number_format($paket_list->price,0,",",".") }}
                                    </div>
                                    <div>
                                        Rp. {{ number_format($paket_list->price-(($paket_list->diskon / 100)*$paket_list->price),0,",",".") }}
                                    </div>
                                    @endif
                                </h3>
                                <small>Per Pax</small>
                            </div>
                            <a href="{{ route('frontend.paket.cart',['slug' => $pakets->slug,'id' => $paket_list->id]) }}" class="nir-btn">BOOKING</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            {{-- <div class="text-center">
                <a href="#" class="nir-btn">Load More <i class="fa fa-long-arrow-alt-right"></i></a>
            </div> --}}
        </div>
    </div>
</section>
@endsection