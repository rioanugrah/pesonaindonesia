@extends('layouts.frontend_3.app')

@section('title')
    Segera Hadir
@endsection

@section('content')
    <main id="content" class="site-main">
        <div class="no-content-section 404-page" style="background-image: url({{ asset('frontend/assets3/images/wallpaper/partnership.jpg') }});">
            <div class="container">
                <div class="no-content-wrap">
                    <span>Partner</span>
                    <h1>Partnership</h1>
                    <h4>Segera Hadir</h4>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </main>
@endsection
