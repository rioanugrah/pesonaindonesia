@extends('layouts.frontend_4.app')

@section('title')
    Our Teams
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/teams.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('frontend') }}">home</a><i>/</i><a
                    href="{{ route('tim_kami') }}" class="last"><span>Our</span> Team</a>
                <h2><span>Our</span> Team</h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h6 class="title-section-top font-4">Our team</h6>
                    <h2 class="title-section"><span>Work for</span> You</h2>
                    <div class="cws_divider mb-25 mt-5"></div>
                </div>
            </div>
            <div class="row profile-col">
                @foreach ($teams as $team)
                <div class="col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="profile-item">
                        <div class="profile-media"><img src="{{ asset('frontend/assets4/img/team/'.$team['image']) }}" data-at2x="{{ asset('frontend/assets4/img/team/'.$team['image']) }}" alt></div>
                        <div class="title-wrap">
                            <h4 class="title" style="font-size: 14pt"><span>{{ $team['name'] }}</span></h4>
                            <div class="positions"><a href="#" class="font-4">{{ $team['posisi'] }}</a></div>
                        </div>
                        <div class="soc-links"><a href="#" class="cws-social fa fa-twitter"></a><a href="#"
                                class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
