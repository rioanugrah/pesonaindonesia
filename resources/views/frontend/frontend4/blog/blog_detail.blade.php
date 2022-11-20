@extends('layouts.frontend_4.app')
@section('title')
    {{ $blog_detail->title }}
@endsection
<?php $asset = asset('frontend/assets4/'); ?>
@section('keywords')
    {{ $blog_detail->keyword }}
@endsection

@section('canonical')
    {{ route('frontend.blog_detail',['slug' => $blog_detail->slug]) }}
@endsection

@section('header')
    <section style="background-image:url({{ url('frontend/assets4/img/wallpaper/bg_video.webp') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item">
                <a href="{{ url('/') }}">home</a><i>/</i>
                <a href="{{ route('frontend.blog') }}">Blog</a><i>/</i>
                <a href="#" class="last"><span>{{ $blog_detail->title }}</span></a>
                <h2><span>{{ $blog_detail->title }}</span></h2>
            </div>
        </div>
    </section>
@endsection
@section('content')
<div class="container page">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-item alt pb-20">
                <div class="pic"><img src="{{ url('frontend/assets4/img/blog/'.$blog_detail->image) }}" data-at2x="{{ url('frontend/assets4/img/blog/'.$blog_detail->image) }}" alt="{{ $blog_detail->title }}"
                    style="width: 770px; height: 370px; object-fit: cover;"></div>
                <div class="blog-item-data clearfix">
                  <h3 class="blog-title">{{ $blog_detail->title }}</h3>
                  <p class="post-info"><i class="flaticon-people"></i><span class="posr-author">{{ $blog_detail->author }} </span>at {{ \Carbon\Carbon::create($blog_detail->updated_at)->isoFormat('LLLL') }}</p>
                </div>
                <p class="mb-25">{!! $blog_detail->description !!}</p>
                <div class="blog-tags mb-40">
                  <div class="blog-nav-tags"> <i class="flaticon-suntour-tag"></i>{{ $blog_detail->keyword }}</div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection