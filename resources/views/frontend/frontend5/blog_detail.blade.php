@extends('layouts.frontend_5.app')

@section('title')
    {{ $blog_detail->title }}
@endsection

@section('canonical')
    {{ route('frontend.blog_detail',['slug' => $blog_detail->slug]) }}
@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<div class="page-cover pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="cover-content text-center text-md-start">
                    <div class="author-detail mb-2">
                        <a href="javascript:void()" class="tag white bg-theme py-1 px-3 me-2 rounded">{{ $blog_detail->kategori }}</a>
                        <a href="javascript:void()" class="tag py-1 px-3"><i class="fa fa-eye"></i> {{ $count }}</a>
                    </div>
                    <h1>{{ $blog_detail->title }}</h1>
                    <div class="author-detail d-flex align-items-center">
                        <span class="me-3"><a href="javascript:void()"><i class="fa fa-clock"></i> Post On : {{ \Carbon\Carbon::create($blog_detail->created_at)->isoFormat('LL') }}</a></span>
                        {{-- <span class="me-3"><a href="javascript:void()"><i class="fa fa-user"></i> Jack Richard</a></span>
                        <span><a href="javascript:void()"><i class="fa fa-comments"></i> 50</a></span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="box-shadow p-3 rounded"><img src="{{ asset('frontend/assets4/img/blog/'.$blog_detail->image) }}" alt="{{ $blog_detail->title }}" class="w-100 rounded"></div>
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
                            <p class="mb-0">{!! $blog_detail->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection