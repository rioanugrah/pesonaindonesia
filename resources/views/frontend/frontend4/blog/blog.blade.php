@extends('layouts.frontend_4.app')
@section('title')
    Blog
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('header')
    <section style="background-image:url({{ url('frontend/assets4/img/wallpaper/bg_video.webp') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item">
                <a href="{{ url('/') }}">home</a><i>/</i>
                <a href="{{ route('frontend.blog') }}">Blog</a>
                {{-- <a href="#" class="last"><span>Blog</span> List</a> --}}
                <h2><span>Blogger</span></h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <div class="col-md-12">
                @foreach ($postings as $posting)
                <div class="blog-item clearfix mb-30 border">
                    <div class="blog-media">
                        <a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}">
                            <div class="pic"><img src="{{ url('frontend/assets4/img/blog/'.$posting->image) }}" data-at2x="{{ url('frontend/assets4/img/blog/'.$posting->image) }}" alt="{{ $posting->title }}"
                                style="width: 270px; height: 270px; object-fit: cover;">
                            </div>
                        </a>
                    </div>
                    <div class="blog-item-body clearfix">
                        <a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}">
                            <h6 class="blog-title">{{ $posting->title }}</h6>
                        </a>
                        <div class="blog-item-data">{{ \Carbon\Carbon::create($posting->updated_at)->isoFormat('LLLL') }}</div>
                        
                        <p>{!! Str::limit($posting->description,350) !!}</p><a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" class="blog-button">Read more</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
