@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('head')
{!! Adsense::javascript() !!}
@endsection
@section('title')
{{ $paket_lists->nama_paket }}
@endsection
@section('header')
<section style="background-image:url('pic/breadcrumbs/bg-2.jpg');" class="breadcrumbs style-2 gray-90">
    <div class="container">
        <div class="text-left breadcrumbs-item">
            <a href="{{ route('frontend.paket') }}">Paket</a><i>/</i>
            <a href="{{ route('frontend.paket.detail',['slug' => $paket_lists->pakets->slug]) }}">{{ $paket_lists->pakets->nama_paket }}</a><i>/</i>
            <a href="#" class="last">{{ $paket_lists->nama_paket }}</a>
            <h2><span>{{ $paket_lists->nama_paket }}</span>
            </h2>
        </div>
    </div>
</section>
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <div class="col-md-10">
                <div class="main single-product">
                    <div class="images">
                        <div class="pic">
                            <img src="{{ asset('frontend/assets4/img/paket/list/'.$paket_lists->images) }}" data-at2x="{{ asset('frontend/assets4/img/paket/list/'.$paket_lists->images) }}" style="width: 270px; height: 380px; object-fit: cover;" alt>
                            <div class="links"><i class="fa fa-expand"></i></div>
                        </div>
                    </div>
                    <div class="summary clearfix">
                        <h2 class="product-title mt-0">{{ $paket_lists->nama_paket }}</h2>
                        <div class="review-status">
                            <?php 
                                if($paket_lists->status == 1){    
                            ?>
                            <div class="status-product in-stock">
                                Ready
                            </div>
                            <?php }else{ ?>
                            <div class="status-product out-stock">
                                Sold Out
                            </div>
                            <?php } ?>
                            <div class="count-review"><span>0</span> Reviews</div>
                        </div>
                        <div class="shop-price">Rp. {{ number_format($paket_lists->price,2,",",".") }} </div>
                        <div class="cws_divider mb-10"></div>
                        <p class="description-product">{!! $paket_lists->deskripsi !!}</p>
                        <?php 
                            if($paket_lists->status == 1){    
                        ?>
                        <div class="price-review"><a class="cws-button small alt add-to-cart">Buy</a><a href="{{ route('frontend.paket.cart',['slug' => $paket_lists->pakets->slug,'id' => $paket_lists->id]) }}" class="cws-button small alt added-to-cart">View cart</a></div>
                        <?php }?>
                        <div class="mb-0 mt-10 post-number">Product Code: <span>{{ $paket_lists->id }}</span></div>

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                {!! Adsense::ads('ads_unit') !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ env('ADSENSE_CLIENT_ID') }}"
crossorigin="anonymous"></script>
@endsection