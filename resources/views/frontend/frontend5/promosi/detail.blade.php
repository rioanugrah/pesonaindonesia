@extends('layouts.frontend_5.app')

@section('title')
    {{ $promosi->nama_promosi }}
@endsection

@section('canonical')
    {{ route('frontend.detailPromosi',['generate' => $promosi->id_generate,'slug' => $promosi->slug]) }}
@endsection

<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<div class="page-cover pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="cover-content text-center text-md-start">
                    <h2>{{ $promosi->nama_promosi }}</h2>
                    <div class="author-detail d-flex align-items-center">
                        <span class="me-3"><a href="javascript:void()"><i class="fa fa-clock"></i> Post On : {{ \Carbon\Carbon::create($promosi->created_at)->isoFormat('LL') }}</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="box-shadow p-3 rounded"><img src="{{ asset('frontend/assets5/promosi/'.$promosi->images) }}" alt="{{ $promosi->nama_promosi }}" class="w-100 rounded"></div>
            </div>
        </div>
    </div>
</div>

<section class="blog pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-single">
                    <div class="blog-wrapper">
                        <div class="blog-content first-child-cap mb-4">
                            <p class="mb-0">{!! $promosi->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection