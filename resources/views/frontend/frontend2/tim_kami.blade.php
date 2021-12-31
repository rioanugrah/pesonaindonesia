@extends('layouts.frontend_3.app')

@section('title')
    Tim Kami
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url({{ asset('frontend/assets3/images/wallpaper/team_business.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">@yield('title')</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="guide-page-section">
        <div class="container">
            <div class="row">
                @foreach ($teams as $team)
                <div class="col-lg-4 col-md-6">
                    <div class="guide-content-wrap text-center">
                        <figure class="guide-image">
                            <img src="{{ asset('frontend/assets3/images/team/'.$team['image']) }}"  alt="">
                        </figure>
                        <div class="guide-content">
                            <h3>{{ $team['name'] }}</h3>
                            <h5>{{ $team['posisi'] }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
