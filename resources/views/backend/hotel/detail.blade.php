@extends('layouts.backend_2.app')

@section('title')
    Hotel {{ $hotel->nama_hotel }}
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hotel') }}">Hotel</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $hotel->nama_hotel }}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">Hotel {{ $hotel->nama_hotel }}</h4>
                <div class="row">
                    <div class="col-6">
                        <h5>Lokasi</h5>
                    </div>
                    <div class="col-6">
                        <h5>Map</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection