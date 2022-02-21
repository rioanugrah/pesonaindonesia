@extends('layouts.frontend_4.app')

@section('title')
    Events {{ $event->title }}
@endsection

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#"
                    class="last"><span>Event</span></a>
                <h2><span>{{ $event->title }}</span></h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <?php $asset = asset('frontend/assets4/'); ?>
    <div class="container page">
        <div class="row">
            <div class="col-md-12 mb-60">
                <div class="blog-item alt pb-20">
                    <div class="pic">
                        <a href="{{ asset('frontend/assets4/img/events/'.$event->image) }}" target="_blank">
                            <img src="{{ asset('frontend/assets4/img/events/'.$event->image) }}" style="width: 770px; height: 370px; object-fit: cover;" data-at2x="{{ asset('frontend/assets4/img/events/'.$event->image) }}" alt>
                        </a>
                    </div>
                    <div class="blog-item-data clearfix">
                        <h3 class="blog-title">{{ $event->title }}</h3>
                        <p class="post-info">Tanggal dibuat : {{ \Carbon\Carbon::parse($event->created_at)->isoFormat('LLLL') }}</p>
                        <p class="mb-25">{{ $event->deskripsi }}</p>
                        <p class="mb-25">
                            <div>Acara Dimulai : {{ \Carbon\Carbon::parse($event->start_event)->isoFormat('LLLL') }} - 
                                @if ($event->finish_event == null)
                                Selesai
                                @else
                                {{ \Carbon\Carbon::parse($event->start_event)->isoFormat('LLLL') }}
                                @endif
                            </div>
                        </p>
                        <div class="quote alt-2 clearfix mb-30 mt-20">
                            <p>Lokasi : {{ $event->location }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
