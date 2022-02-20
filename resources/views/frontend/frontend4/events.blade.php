@extends('layouts.frontend_4.app')

@section('title')
    Events
@endsection

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#"
                    class="last"><span>Event</span></a>
                <h2><span>Events</span></h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <?php $asset = asset('frontend/assets4/'); ?>
    <div class="container page">
        <div class="row">
            <div class="col-md-12 mb-60">
                @forelse ($events as $event)
                <div class="blog-item clearfix mb-30 border">
                    <div class="blog-media">
                        <a href="{{ route('frontend.eventDetail',['slug' => $event->slug]) }}">
                            <div class="pic">
                                <img src="{{ asset('frontend/assets4/img/events/'.$event->image) }}" style="width: 270px; height: 270px; object-fit: cover;"
                                    data-at2x="{{ asset('frontend/assets4/img/events/'.$event->image) }}" alt>
                            </div>
                        </a>
                    </div>
                    <div class="blog-item-body clearfix">
                        <a href="{{ route('frontend.eventDetail',['slug' => $event->slug]) }}">
                            <h6 class="blog-title">{{ $event->title }}</h6>
                        </a>
                        <div class="blog-item-data">
                            Date Event {{ \Carbon\Carbon::parse($event->start_event)->isoFormat('LLLL') }} - 
                            @if ($event->finish_event == null)
                                Selesai
                            @else
                                {{ \Carbon\Carbon::parse($event->finish_event)->isoFormat('LLLL') }}
                            @endif
                        </div>
                        <p>{{ substr(strip_tags($event->deskripsi), 0, 100) }}</p><a href="{{ route('frontend.eventDetail',['slug' => $event->slug]) }}" class="blog-button">Read more</a>
                    </div>
                </div>
                @empty
                <p>Data Tidak Ditemukan</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
