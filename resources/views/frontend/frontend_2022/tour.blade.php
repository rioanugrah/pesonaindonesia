@extends('layouts.frontend_2022.app')
@section('title')
    Tour Wisata
@endsection
@section('content')
<div class="traveltour-page-title-wrap  traveltour-style-custom traveltour-left-align" style="background-image: url({{ asset('frontend/assets_new/images/wallpaper/bromo.webp') }})">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h1 class="traveltour-page-title">Tour Wisata</h1></div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " id="div_a9ee_0">
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full-no-space">
                    <div class="gdlr-core-pbf-element">
                        <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-modern-no-space tourmaster-item-pdlr tourmaster-tour-item-column-2">
                            <div class="tourmaster-tour-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                                @forelse ($paket_trips as $paket_trip)
                                <div class="gdlr-core-item-list  tourmaster-column-20 ">
                                    <div class="tourmaster-tour-modern tourmaster-with-thumbnail tourmaster-with-info">
                                        <div class="tourmaster-tour-modern-inner">
                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image">
                                                <a href="{{ route('frontend_new.tour_detail',['id' => $paket_trip->id, 'paket_id' => $paket_trip->paket_id]) }}"><img src="{{ asset('frontend/assets_new/images/paket/list/'.$paket_trip->images) }}" style="width: 1500px; height: 350px; object-fit: cover;"  alt="{{ $paket_trip->nama_paket }}" /></a>
                                            </div>
                                            <div class="tourmaster-tour-content-wrap">
                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title" id="h3_a9ee_0"><a href="{{ route('frontend_new.tour_detail',['id' => $paket_trip->id, 'paket_id' => $paket_trip->paket_id]) }}" >{{ $paket_trip->nama_paket }}</a></h3>
                                                <div class="tourmaster-tour-price-wrap "><span class="tourmaster-tour-price"><span class="tourmaster-head">From</span><span class="tourmaster-tail">Rp. {{ number_format($paket_trip->price,0,",",".") }}</span></span>
                                                </div>
                                                <div class="tourmaster-tour-info-wrap clearfix">
                                                    <div class="tourmaster-tour-info tourmaster-tour-info-duration-text "><i class="icon_clock_alt"></i>-</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    
                                @endforelse
                            </div>
                            <div class="gdlr-core-pagination  gdlr-core-style-circle gdlr-core-center-align"><span aria-current='page' class='page-numbers current'>1</span> <a class='page-numbers' href='page/2/index.html'>2</a> <a class='page-numbers' href='page/3/index.html'>3</a>
                                <a class="next page-numbers" href="page/2/index.html"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection