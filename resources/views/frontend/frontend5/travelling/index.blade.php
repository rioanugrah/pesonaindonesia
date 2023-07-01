@extends('layouts.frontend_5.app')
@section('title')
    Travelling
@endsection
@section('canonical')
    {{ route('frontend.travelling') }}
@endsection
<?php $assets = asset('frontend/assets5/'); ?>

@section('content')
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($travellings as $key => $travelling)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="{{ asset('backend_2023/images/tour/'.$travelling->images) }}" alt="{{ $travelling->title }}" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 position-relative bg-white">
                                <h3 class="mb-1"><a href="{{ route('frontend.travelling.detail',['id' => $travelling->id, 'slug' => $travelling->slug]) }}">{{ $travelling->title }}</a></h3>
                                {{-- <p class="mb-4">Meeting Point: <b>{{ $travelling->meeting_point }}</b></p> --}}
                                <p class=" border-b pb-2 mb-2">{{ strip_tags($travelling->deskripsi) }}</p>
                                <div class="entry-meta d-flex align-items-center justify-content-between">
                                    <div class="entry-author d-flex align-items-center">
                                        <p class="mb-0">
                                            @if ($travelling->discount == 0)
                                            <span class="theme fw-bold fs-5">
                                                Rp. {{ number_format($travelling->current_price,0,",",".") }}
                                            </span>
                                            @else
                                            <div class="theme" style="text-decoration: line-through;text-decoration-color: #eb4034; font-weight:300">
                                                Rp. {{ number_format($travelling->current_price,0,",",".") }} 
                                            </div> &nbsp;
                                            <div class="theme fw-bold fs-5">
                                                Rp. {{ number_format($travelling->previous_price,2,",",".") }}
                                            </div>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 ps-lg-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4">
                            <form action="{{ route('frontend.search.travelling') }}" method="get" id="cari_destinasi">
                                <div class="book-form w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                                    <div class="row d-flex align-items-center justify-content-between">
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <div class="input-box">
                                                    <label>Destinasi</label>
                                                    <input type="text" name="cari_destinasi" placeholder="Cari Destinasi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <div class="input-box">
                                                    <label>Travellers</label>
                                                    <select class="niceSelect" name="jumlah_pax">
                                                        <option>-- Traveller --</option>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                        <option value="{{ $i }}">{{ $i }} Travellers</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-0 text-center">
                                                <button type="submit" class="nir-btn w-100" onclick="document.getElementById('cari_destinasi').submit();"><i class="fa fa-search mr-2"></i> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection