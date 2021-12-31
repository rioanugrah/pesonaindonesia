@extends('layouts.frontend_3.app')

@section('title')
    Payment
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
<form action="{{ route('payment') }}" method="post">
@csrf
<button type="submit">Bayar</button>
</form>
@endsection