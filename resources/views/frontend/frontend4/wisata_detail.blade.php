@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('canonical')
    {{ route('frontend.wisataDetail', ['slug' => $wisata->slug]) }}
@endsection
@section('title')
    {{ $wisata->nama_wisata }}
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-item alt pb-20">
                    <div class="pic"><img src="{{ asset('frontend/assets4/img/wisata/'.$wisata->images) }}" data-at2x="pic/blog/770x370@2x.jpg" alt></div>
                    <div class="blog-item-data clearfix">
                        <h3 class="blog-title">{{ $wisata->nama_wisata }}</h3>
                        {{-- <p class="post-info"><i class="flaticon-people"></i><span class="posr-author">Phillip Ferguson
                            </span>on<a href="#" class="post-category"> <span>Adventure</span></a>,<a href="#"
                                class="post-category"> <span>Wildlife </span></a>at Mon, 03-23-2016</p> --}}
                    </div>
                    <p class="mb-25">{{ $wisata->deskripsi }}</p>
                    <div class="blog-tags mb-40">
                        <div class="blog-nav-tags"> <i class="flaticon-suntour-tag"></i><a href="{{ route('frontend') }}">Pesona Plesiran Indonesia</a></div>
                        {{-- <div class="blog-nav-share align-right mt-lg-0"> <a href="#" class="cws-social fa fa-twitter"></a><a href="#" class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social fa fa-linkedin"></a></div> --}}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
