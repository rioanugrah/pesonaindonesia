@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>

@section('title')
    Gallery
@endsection

@section('content')
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $asset }}/images/bg/bg_video.webp);">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $asset }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Gallery</h1>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <div class="gallery pt-6 pb-0">
        <div class="container">
            <div class="section-title mb-6 text-center w-75 mx-auto">
                <h4 class="mb-1 theme1">Our Gallery</h4>
                <h2 class="mb-1">Gallery <span class="theme">Pesona Plesiran Indonesia</span></h2>
            </div>
            <div class="row">
                @foreach ($gallerys as $gallery)
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="gallery-item mb-4 rounded overflow-hidden">
                            <div class="gallery-image">
                                <img src="{{ asset('frontend/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 600px; height: 300px; object-fit: cover;">
                            </div>
                            <div class="gallery-content">
                                <h5 class="white text-center position-absolute bottom-0 pb-4 left-50 mb-0 w-100">
                                    {{ $gallery->title }}
                                </h5>
                                <ul>
                                    <li><a href="{{ asset('frontend/gallery/' . $gallery->image) }}" data-lightbox="gallery"
                                            data-title="{{ $gallery->title }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="javascript:void()"><i class="fa fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
