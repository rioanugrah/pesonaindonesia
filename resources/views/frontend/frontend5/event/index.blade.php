@extends('layouts.frontend_5.app')

@section('title')
    Event
@endsection

@section('canonical')
    {{ route('frontend.event') }}
@endsection
<?php $assets = asset('frontend/assets5/'); ?>
@section('content')
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $assets }}/images/bg/bg_video.webp);">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $assets }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Event</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Event</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    {{-- <section class="blog">
        <div class="container">
            <div class="listing-inner px-5">
            @foreach ($events as $event)
            <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                <div class="row">
                    <div class="col-lg-5 col-md-4 blog-height">
                        <div class="blog-image rounded">
                            <a style="background-image: url({{ asset('events/cover/'.$event->cover_image) }});"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="blog-content">
                            <h3 class="mb-2"><a href="{{ route('frontend.eventDetail',['id' => $event->id, 'slug' => $event->slug]) }}">{{ $event->title }}</a></h3>
                            <div class="theme">Description :</div>
                            <p class="mb-0">{!! Str::limit($event->description,350) !!}</p>
                            <div class="theme">Schedule :</div>
                            <ol>
                                @foreach (json_decode($event->schedules) as $schedules)
                                <li>
                                    <div>{{ $schedules->day }}</div>
                                    <div>{{ \Carbon\Carbon::create($schedules->time)->isoFormat('DD MMMM YYYY h:mm:ss') }}</div>
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 text-center d-flex justify-content-center" style="align-items: center; justify-content: center">
                        <div><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </section> --}}
    <section class="trending pb-9">
        <div class="container">
            <div class="trend-box">
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col-lg-4 mb-4">
                        <div class="trend-item1 rounded box-shadow bg-white">
                            <div class="trend-image position-relative">
                                <img src="{{ asset('events/cover/'.$event->cover_image) }}" alt="{{ $event->title }}" style="width: 100%; height: 350px; object-fit: cover;">
                                @php
                                    $schedules = json_decode($event->schedules);
                                    $product = json_decode($event->event_product);
                                    $rating = \DB::table('event_rating')->where('event_id',$event->id);

                                    if ($rating->get()->isEmpty()) {
                                        $dataRating = 0;
                                    }else{
                                        foreach ($rating->get() as $rt) {
                                            $dataRating[] = $rt->rating;
                                        }
                                    }
                                    // dd($product);
                                    if ($dataRating == 0) {
                                        $totalRating = 0;
                                    }else{
                                        $totalRating = array_sum($dataRating)/$rating->count();
                                    }
                                    // dd($totalRating)
                                    // dd(array_sum($dataRating)/$rating->count());
                                @endphp
                                <div class="trend-content1 p-4">
                                    {{-- <h5 class="theme1 mb-1"><i class="flaticon-location-pin"></i> {{ $event->title }}</h5> --}}
                                    <h3 class="mb-1 white"><a href="{{ route('frontend.eventDetail',['id' => $event->id, 'slug' => $event->slug]) }}" class="white">{{ $event->title }}</a></h3>
                                    @if ($rating->count() > 0)
                                    <div class="rating-main d-flex align-items-center pb-2">
                                        <div class="rating">
                                            @if ($totalRating >= 5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 4 && $totalRating < 5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 3 && $totalRating < 4)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 2 && $totalRating < 3)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 1 && $totalRating < 2)
                                            <span class="fa fa-star checked"></span>
                                            {{-- <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 2 || $totalRating <= 3)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span> --}}
                                            {{-- @elseif($totalRating >= 3 || $totalRating < 4)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 4 || $totalRating < 4)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            @elseif($totalRating >= 5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span> --}}
                                            @endif
                                            {{-- @for ($i = 0; $i <= $totalRating; $i++)
                                            <span class="fa fa-star checked"></span>
                                            @endfor --}}
                                            {{-- @foreach ($rating->get() as $rt)
                                            <span class="fa fa-star checked"></span>
                                            @endforeach --}}
                                        </div>
                                        <span class="ms-2 white">({{ number_format($totalRating,1,'.',',') }})</span>
                                    </div>
                                    @endif
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author d-flex align-items-center">
                                            @if (!empty($product))
                                            <p class="mb-0 white"><span class="theme1 fw-bold fs-5"> Rp. {{ number_format($product[0]->price,0,',','.') }}</span> | Per
                                                person</p>
                                            @else
                                            <p class="mb-0 white"><span class="theme1 fw-bold fs-5"> Coming Soon</span></p>
                                            @endif
                                        </div>
                                        <div class="entry-author">
                                            <i class="icon-calendar white"></i>
                                            <span class="fw-bold white"> {{ count($schedules) }} Days Event</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-12 text-center">
                        <a href="tour-grid.html" class="nir-btn">View All Deals</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
