@extends('layouts.frontend_5.app')
@section('title')
    {{ $travelling_detail->title }}
@endsection
@section('canonical'){{ route('frontend.travelling.detail',['id' => $travelling_detail->id,'slug' => $travelling_detail->slug]) }}@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<div class="page-cover pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="cover-content text-center text-md-start">
                    <div class="author-detail mb-2">
                        <a href="javascript:void()" class="tag white bg-theme py-1 px-3 me-2 rounded">{{ $travelling_detail->jenis_tour == 'Publik' ? 'Open Trip' : 'Private Trip' }}</a>
                        <a href="javascript:void()" class="tag white bg-theme py-1 px-3 me-2 rounded">Rp. {{ number_format($travelling_detail->current_price, 0,',','.') }}</a>
                    </div>
                    <h1>{{ $travelling_detail->title }}</h1>
                    <div class="author-detail d-flex align-items-center">
                        <span class="me-3"><a href="javascript:void()"><i class="fa fa-clock"></i> Post On : {{ \Carbon\Carbon::create($travelling_detail->created_at)->isoFormat('LL') }}</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="box-shadow p-3 rounded"><img src="{{ asset('backend_2023/images/tour/'.$travelling_detail->images) }}" alt="{{ $travelling_detail->title }}" class="w-100 rounded"></div>
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
                            <div class="mb-0">{!! $travelling_detail->deskripsi !!}</div>
                        </div>
                    </div>
                </div>
                <div class="blog-single">
                    <div class="blog-wrapper">
                        <div class="blog-content first-child-cap mb-4">
                            <div class="description d-md-flex">
                                <div class="desc-box bg-grey p-4 rounded me-md-2 mb-2">
                                    <h5 class="mb-2">Include</h5>
                                    <ul>
                                        @foreach (json_decode($travelling_detail->include) as $include)
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> {{ $include->include }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="desc-box bg-grey p-4 rounded me-md-2 mb-2">
                                    <h5 class="mb-2">Exclude</h5>
                                    <ul>
                                        @foreach (json_decode($travelling_detail->exclude) as $exclude)
                                            <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> {{ $exclude->exclude }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @if (!empty($travelling_detail->facilities))
                            <div class="description">
                                <h5 class="mb-2">Fasilitas</h5>
                                <ul>
                                    @foreach (json_decode($travelling_detail->facilities) as $fasilitas)
                                        <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> {{ $fasilitas->include }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (!empty($travelling_detail->itinerary))
                            <div class="description mb-4">
                                <h5 class="mb-2">Rencana Perjalanan</h5>
                                <ul>
                                    @foreach (json_decode($travelling_detail->itinerary) as $key => $itinerary)
                                    <li class="d-block pb-1"><i class="fa fa-check pink mr-1"></i> {{ $itinerary->time.' - '.$itinerary->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="description">
                                <h5 class="mb-2">Tanya Jawab</h5>
                                <ul>
                                    @foreach (json_decode($travelling_detail->faq) as $key => $faq)
                                    <li class="d-block pb-1">
                                        <h5>{{ $key+1 }}{{ '. '.$faq->title }}</h5>
                                        <p><i class="fa fa-minus"></i> {{ $faq->deskripsi }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection