@extends('layouts.frontend2.app')

@section('title')
    Struktur Organisasi
@endsection

@section('content')
<section class="blog-header">
	<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h3 style="font-size: 3em">Struktur Organisasi</h3>
        <img src="{{ asset('frontend/assets2/images/struktur_organisasi.jpg') }}" style="width: 100%" alt="">
      </div>
    </div>
  </div>
</section>
{{-- <div class="blog-hero-image bg-image" data-background="{{ asset('frontend/assets2/images/struktur_organisasi.jpg') }}"></div> --}}
@endsection