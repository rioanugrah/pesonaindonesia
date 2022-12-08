@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('title')
    Dokumentasi
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="small-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="title-section-top font-4">Happy Memories</h6>
                                <h2 class="title-section"><span>Gallery</span> Instagram</h2>
                                <div class="cws_divider mb-25 mt-5"></div>
                            </div>
                            <div class="col-md-4"><i class="flaticon-suntour-photo title-icon"></i></div>
                        </div>
                        <div class="row portfolio-grid">
                            @foreach ($gallerys['data'] as $gallery)
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="portfolio-item big">
                                    <a href="{{ $gallery['media_url'] }}" class="fancy">
                                        <div class="portfolio-media"><img src="{{ $gallery['media_url'] }}"
                                                data-at2x="{{ $gallery['media_url'] }}" alt></div>
                                    </a>
                                    <div class="links"><a href="{{ $gallery['media_url'] }}" class="fancy"><i
                                                class="fa fa-expand"></i></a></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
