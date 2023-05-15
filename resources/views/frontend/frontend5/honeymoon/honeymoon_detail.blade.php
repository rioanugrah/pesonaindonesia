@extends('layouts.frontend_5.app')

@section('title')
    {{ $honeymoon->nama_paket }}
@endsection

@section('canonical')
    {{ route('frontend.honeymoon_detail',['slug' => $honeymoon->slug]) }}
@endsection

@section('content')
<div class="page-cover pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="cover-content text-center text-md-start">
                    <h1>{{ $honeymoon->nama_paket }}</h1>
                    <div class="author-detail mb-2">
                        <a href="javascript:void()" class="tag white bg-theme py-1 px-3 me-2 rounded"><b>Rp. {{ number_format($honeymoon->price,0,',','.') }}</b></a>
                        {{-- <a href="javascript:void()" class="tag py-1 px-3"><i class="fa fa-eye"></i> {{ $count }}</a> --}}
                    </div>
                    {{-- <div class="author-detail d-flex align-items-center">
                        <span class="me-3"><a href="javascript:void()"><i class="fa fa-clock"></i> Post On : {{ \Carbon\Carbon::create($blog_detail->created_at)->isoFormat('LL') }}</a></span>
                        <span class="me-3"><a href="javascript:void()"><i class="fa fa-user"></i> Jack Richard</a></span>
                        <span><a href="javascript:void()"><i class="fa fa-comments"></i> 50</a></span>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="box-shadow p-3 rounded"><img src="{{ asset('frontend/assets4/img/honeymoon/'.$honeymoon->images) }}" alt="{{ $honeymoon->nama_paket }}" class="w-100 rounded"></div>
            </div>
        </div>
    </div>
</div>
<section class="blog pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-single">
                    <div class="blog-wrapper">
                        <div class="blog-content first-child-cap mb-4">
                            <p class="mb-0">{!! $honeymoon->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('frontend.honeymoon_order',['slug' => $honeymoon->slug]) }}" class="nir-btn float-lg-end w-25">BOOKING NOW</a>
    </div>
</section>
@endsection