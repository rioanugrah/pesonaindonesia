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
                <div class="flight-list">
                    <div class="flight-full">
                        @foreach ($travellings as $key => $travelling)
                        <?php 
                        // $data = json_decode($travelling->deskripsi);
                        // echo $travelling->deskripsi->experience;
                        ?>
                        <div class="item mb-2 border-all p-3 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="{{ asset('frontend/assets_new/images/travelling/'.$travelling->images) }}" alt="{{ $travelling->nama_paket }}" width="160">
                                        <h5 class="mb-0">{{ $travelling->nama_travelling }}</h5>
                                        <small><i class="fa fa-location-arrow"></i> Meeting Point: {{ $travelling->meeting_point }}</small>
                                    </div>
                                </div>    
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="item-inner">
                                        <div class="content">
                                            <h5 class="mb-0">{{ \Carbon\Carbon::create($travelling->tanggal_rilis)->isoFormat('dddd, D MMMM Y') }}</h5>
                                        </div>
                                    </div>
                                </div>    
                                {{-- <div class="col-lg-2 col-md-2 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">12:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">-</p>
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">Rp. {{ number_format($travelling->price,2,",",".") }}</p>
                                        <a href="{{ route('frontend.travelling_detail_order',['id' => $travelling->id]) }}" class="nir-btn-black">Book Now</a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="accordion accordion-flush border-t mt-1 pt-1" id="accordionflush">
                                        <div class="accordion-item overflow-hidden">
                                            <p class="accordion-header" id="flush-heading{{ $key }}">
                                                <button class="accordion-button collapsed p-0 border-0 rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                                  Travelling Details
                                                </button>
                                            </p>
                                            <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body p-0">
                                                    <div class="row flight-detail-wrap align-items-center border-t pt-1 mt-1" style="">
                                                        <div class="col-lg-4">
                                                            <div class="flight-date">
                                                                <ul>
                                                                    <li>{{ $travelling->nama_travelling }}</li>
                                                                    <li class="theme">{{ \Carbon\Carbon::create($travelling->tanggal_rilis)->isoFormat('dddd, D MMMM Y') }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="flight-detail-right">
                                                                <h5><i class="fa fa-database"></i> Highlight</h5>
                                                                <div class="flight-detail-info d-flex align-items-center p-2 py-3 bg-grey rounded mb-2">
                                                                    <img src="{{ asset('frontend/assets_new/images/travelling/'.$travelling->images) }}" width="125" alt="">
                                                                    <ul>
                                                                        @foreach ($travelling->travellingHighlight as $travelling_th)
                                                                        <li>{{ $travelling_th->nama_highlight }},</li>
                                                                        @endforeach
                                                                        {{-- <li>Tpm Line</li>
                                                                        <li>Operated by Airlines</li>
                                                                        <li>Economy | Flight EK585 | Aircraft BOEING 777-300ER</li>
                                                                        <li>Adult(s): 25KG luggage free</li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        @endforeach

                    </div> 
                    <div class="pagination-main text-center">
                        <ul class="pagination">
                            {{ $travellings->links('vendor.pagination.frontend5') }}
                        </ul>
                    </div>
                    {{-- <div class="flight-btn text-center"><a href="flight-grid.html" class="nir-btn">Load More</a></div> --}}
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
                                                <button type="submit" class="nir-btn w-100" onclick="document.getElementById('cari_destinasi').submit();"><i class="fa fa-search mr-2"></i> Search1</button>
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