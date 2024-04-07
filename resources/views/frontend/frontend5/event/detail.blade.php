@extends('layouts.frontend_5.app')

@section('title')
    {{ $event->title }}
@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
    <div class="page-cover pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div class="cover-content text-center text-md-start">
                        <div class="author-detail mb-2">
                            {{-- <a href="javascript:void()" class="tag white bg-theme py-1 px-3 me-2 rounded">{{ $blog_detail->kategori }}</a> --}}
                            {{-- <a href="javascript:void()" class="tag py-1 px-3"><i class="fa fa-eye"></i> {{ $count }}</a> --}}
                        </div>
                        <h1>{{ $event->title }}</h1>
                        <div class="author-detail d-flex align-items-center">
                            <span class="me-3"><a href="javascript:void()"><i class="fa fa-clock"></i> Post On :
                                    {{ \Carbon\Carbon::create($event->created_at)->isoFormat('LL') }}</a></span>
                            {{-- <span class="me-3"><a href="javascript:void()"><i class="fa fa-user"></i> Jack Richard</a></span>
                        <span><a href="javascript:void()"><i class="fa fa-comments"></i> 50</a></span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="box-shadow p-3 rounded"><img src="{{ asset('events/cover/' . $event->cover_image) }}"
                            alt="{{ $event->title }}" class="w-100 rounded"
                            style='width: 250px; height: 300px; object-fit: cover;'></div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="blog-content">
                        <div class="blog-wrapper">
                            <div class="blog-content first-child-cap mb-4">
                                <p class="mb-0">{!! $event->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="theme">Schedule :</div>
                        <div>
                            <ol>
                                @foreach (json_decode($event->schedules) as $schedule)
                                    <li>{{ $schedule->day . ' - ' . \Carbon\Carbon::create($schedule->time)->isoFormat('DD MMMM YYYY H:mm:ss') }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="theme">Location :</div>
                        <div>
                            <iframe style="width: 100%" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+({{ $event->location }})&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="theme">Pricelist :</div>
                        @foreach ($event->event_product as $event_product)
                            <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 blog-height">
                                        <div class="blog-image rounded">
                                            <a
                                                style="background-image: url({{ asset('events/cover/' . $event->cover_image) }});"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7">
                                        <div class="blog-content">
                                            <h3 class="mb-2"><a
                                                    href="{{ route('frontend.eventDetail', ['id' => $event->id, 'slug' => $event->slug]) }}">{{ $event_product->product }}</a>
                                            </h3>
                                            <div>Quota : <b class="theme">{{ $event_product->quota }}</b></div>
                                            <div>Price : <b class="theme">{{ 'Rp. '.number_format($event_product->price,0,',','.') }}</b></div>
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
            </div>
        </div>
    </section>
@endsection
