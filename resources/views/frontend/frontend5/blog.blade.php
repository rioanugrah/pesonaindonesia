@extends('layouts.frontend_5.app')

@section('title')
    Posting
@endsection

@section('canonical')
    {{ url('blog') }}
@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $assets }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ $assets }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Posting Update</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Posting Update</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<section class="blog">
    <div class="container">
        <div class="listing-inner px-5">
            @foreach ($postings as $key => $posting)
                @if ($key%2 == 0)
                <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 blog-height">
                            <div class="blog-image rounded">
                                <a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" style="background-image: url({{ asset('frontend/assets4/img/blog/'.$posting->image) }});"></a>
                            </div> 
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <div class="blog-content">
                                <h5 class="theme mb-1">{{ $posting->kategori }}</h5>
                                
                                <h3 class="mb-2"><a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" class="">{{ $posting->title }}</a></h3>
                                <p class="date-cats mb-2">
                                    <a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" class="me-2"><i class="fa fa-calendar-alt"></i> {{ \Carbon\Carbon::create($posting->created_at)->isoFormat('LL') }}</a>
                                </p> 
                                <p class="mb-0">{!! Str::limit($posting->description,350) !!}</p>  
                                
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="blog-content">
                                <h5 class="theme mb-1">{{ $posting->kategori }}</h5>
                                <h3 class="mb-2"><a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" class="">{{ $posting->title }}</a></h3>
                                <p class="date-cats mb-2">
                                    <a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" class="me-2"><i class="fa fa-calendar-alt"></i> {{ \Carbon\Carbon::create($posting->created_at)->isoFormat('LL') }}</a>
                                </p> 
                                <p class="mb-0">{!! Str::limit($posting->description,350) !!}</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-4 blog-height">
                            <div class="blog-image rounded">
                                <a href="{{ route('frontend.blog_detail',['slug' => $posting->slug]) }}" style="background-image: url({{ asset('frontend/assets4/img/blog/'.$posting->image) }});"></a>
                            </div> 
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="pagination-main text-center">
                <ul class="pagination">
                    {{ $postings->links('vendor.pagination.frontend5') }}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection