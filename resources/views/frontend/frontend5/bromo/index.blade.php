@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>
@section('title')
    Explode The Bromo
@endsection
@section('canonical')
    {{ route('frontend.bromo') }}
@endsection
@section('content')
<section class="banner flight-banner pt-4 pb-0 overflow-hidden" style="background-image:url({{ $asset }}/images/testimonial.png);">
    <div class="container">
        <div class="banner-in">
            <div class="row align-items-center">
                
                <div class="col-lg-6 mb-4">
                    <div class="banner-content text-lg-start text-center">
                        <h4 class="theme mb-0">Nikmati Perjalananmu</h4>
                        <h1>Explore The Bromo</h1>
                            
                        {{-- <div class="book-form position-absolute w-100 bg-white box-shadow p-4 pb-1 z-index1 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Flying From</label>
                                            <select class="niceSelect">
                                                <option value="1">city or airport</option>
                                                <option value="2">Argentina</option>
                                                <option value="3">Belgium</option>
                                                <option value="4">Canada</option>
                                                <option value="5">Denmark</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Flying To</label>
                                            <select class="niceSelect">
                                                <option value="1">city or airport</option>
                                                <option value="2">Argentina</option>
                                                <option value="3">Belgium</option>
                                                <option value="4">Canada</option>
                                                <option value="5">Denmark</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Depart</label>
                                            <input type="date" name="Depart">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Return</label>
                                            <input type="date" name="Return">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg mb-2">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <label>Travellers</label>
                                            <select class="niceSelect">
                                                <option value="1">2 travellers</option>
                                                <option value="2">5 travellers</option>
                                                <option value="3">7 travellers</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg mb-2">
                                    <div class="form-group mb-0 text-center">
                                        <label class="mb-3"></label>
                                        <a href="#" class="nir-btn w-100"><i class="fa fa-search mr-2"></i> Search
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 mb-4 position-relative">
                    <div class="flight-slider">
                        <div class="row review-slider1">
                            <div class="col-lg">
                                <img src="{{ $asset }}/images/image/bromo1.webp" style="width: 563px; height: 550px; object-fit: cover;" class="rounded">
                            </div>
                            {{-- <div class="col-lg">
                                <img src="{{ $asset }}/images/flights/4.jpg" alt="" class="rounded">
                            </div>
                            <div class="col-lg">
                                <img src="{{ $asset }}/images/flights/5.jpg" alt="" class="rounded">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="category-main-inner border-t pt-1">
                <div class="row side-slider">
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <div class="trending-topic-content">
                                <img src="{{ $asset }}/images/flights/flight_grid_2.png" class="mb-1 d-inline-block" alt="">
                                <h5 class="mb-0"><a href="flight-grid.html">Thai Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <div class="trending-topic-content text-center">
                                <img src="{{ $asset }}/images/flights/flight_grid_3.png" class="mb-1 d-inline-block" alt="">
                                <h5 class="mb-0"><a href="flight-grid.html">Air Asia Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <div class="trending-topic-content">
                                <img src="{{ $asset }}/images/flights/flight_grid_4.png" class="mb-1 d-inline-block" alt="">
                                <h5 class="mb-0"><a href="flight-grid.html">Turkish Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <div class="trending-topic-content">
                                <img src="{{ $asset }}/images/flights/flight_grid_5.png" class="mb-1 d-inline-block" alt="">
                                <h5 class="mb-0"><a href="flight-grid.html">Dragon Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <div class="trending-topic-content">
                                <img src="{{ $asset }}/images/flights/flight_grid_2.png" class="mb-1 d-inline-block" alt="">
                                <h5 class="mb-0"><a href="flight-grid.html">Thai Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <div class="trending-topic-content">
                                <img src="{{ $asset }}/images/flights/flight_grid_3.png" class="mb-1 d-inline-block" alt="">
                                <h5 class="mb-0"><a href="flight-grid.html">Air Asia Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-4">
                        <div class="category-item box-shadow p-3 py-4 text-center bg-white rounded overflow-hidden">
                            <img src="{{ $asset }}/images/flights/flight_grid_4.png" class="mb-1 d-inline-block" alt="">
                            <div class="trending-topic-content">
                                <h5 class="mb-0"><a href="flight-grid.html">Turkish Airlines</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<section class="flight-list pt-0">
    <div class="container">
        <div class="section-title mb-6 w-50 mx-auto text-center">
            {{-- <h4 class="mb-1 theme1">Recommended Flights</h4> --}}
            <h2 class="mb-1">Find Your <span class="theme">Bromo Scheduled</span></h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore.</p> --}}
        </div>

        <div class="flight-list">
            <div class="flight-navtab text-center">
                <div class="nav nav-tabs mb-0" id="nav-tab" role="tablist">
                    @for ($i=$week_start; $i <= $week_end; $i++)
                    <button class="nav-link {{ \Carbon\Carbon::today()->format('Y-m-d') == $i ? 'active' : null }}" id="nav-schedule{{ $i }}-tab" data-bs-toggle="tab" data-bs-target="#schedule{{ $i }}" 
                    type="button" role="tab" aria-selected="true">{{ \Carbon\Carbon::create($i)->isoFormat('dddd') }}<span>{{ \Carbon\Carbon::create($i)->isoFormat('D-MM-YYYY') }}</span></button>
                    @endfor
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                @for ($i=$week_start; $i <= $week_end; $i++)
                @php
                    $bromos = \App\Models\Bromo::where('tanggal','LIKE','%'.$i.'%')->get();
                @endphp
                    @forelse ($bromos as $bromo)
                    <div class="tab-pane fade content {{ \Carbon\Carbon::today()->format('Y-m-d') == $i ? 'show active' : null }} text-center" id="schedule{{ $i }}" role="tabpanel" aria-labelledby="nav-schedule{{ $i }}-tab">
                        <div class="flight-full">
    
                            <div class="item mb-2 border-all p-2 px-4 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="item-inner-image text-start">
                                            {{-- <img src="images/flights/flight_grid_3.png" alt="image"> --}}
                                            <h5 class="mb-0">{{ $bromo->title }}</h5>
                                            <small>Meeting Point: {{ $bromo->meeting_point }}</small>
                                            <div style="font-size: 10pt; font-weight: bold">Include:</div>
                                            <ul>
                                                @foreach (json_decode($bromo->include) as $include)
                                                    <li style="font-size: 8pt">+ {{ $include->include }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>    
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner">
                                        <div class="content">
                                            <h5 class="mb-0" style="text-transform: uppercase">{{ \Carbon\Carbon::create($bromo->tanggal)->isoformat('dddd, D MMMM YYYY') }}</h5>
                                            <p class="mb-0 text-uppercase">Departure Date</p>
                                        </div>
                                        </div>
                                    </div>    
                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                        <div class="item-inner">
                                            <div class="content">
                                                <h3 class="mb-0">{{ \Carbon\Carbon::create($bromo->tanggal)->format('H:i') }}</h3>
                                                <p class="mb-0 text-uppercase">Departure Time</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner flight-time">
                                        <p class="mb-0">{{ $bromo->category_trip == 'Publik' ? 'Open Trip' : 'Private Trip' }} <br>Kuota: {{ $bromo->quota }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner text-end">
                                            <p class="theme fs-4 fw-bold">Rp. {{ number_format($bromo->price,0,',','.') }}</p>
                                            @php
                                                $date_booking = \Carbon\Carbon::create($bromo->tanggal)->format('Y-m-d H:i');
                                                // dd($date_booking.' '.\Carbon\Carbon::now()->format('Y-m-d H:i'));
                                            @endphp
                                            @if ($date_booking >= \Carbon\Carbon::now()->format('Y-m-d H:i'))
                                            <a href="{{ route('frontend.bromo.booking',['id' => $bromo->id, 'tanggal' => $i]) }}" class="nir-btn">BOOKING NOW</a>
                                            @else
                                            <a href="javascript:void()" class="nir-btn-black">CLOSE</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>    
                            </div>
    
                            {{-- <div class="item mb-2 border-all p-2 px-4 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="item-inner-image text-start">
                                            <img src="images/flights/flight_grid_4.png" alt="image">
                                            <h5 class="mb-0">Turkish Airlines</h5>
                                            <small>Operated by Turkey</small>
                                        </div>
                                    </div>    
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner">
                                        <div class="content">
                                            <h4 class="mb-0">Thursday Feb 15, 2022</h4>
                                        </div>
                                        </div>
                                    </div>    
                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                        <div class="item-inner">
                                            <div class="content">
                                                <h3 class="mb-0">7:30</h3>
                                                <p class="mb-0 text-uppercase">DAC</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner flight-time">
                                        <p class="mb-0">12H 35M <br>2 Stops</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner text-end">
                                            <p class="theme2 fs-4 fw-bold">$2,345</p>
                                            <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
    
                            <div class="item mb-2 border-all p-2 px-4 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="item-inner-image text-start">
                                            <img src="images/flights/flight_grid_2.png" alt="image">
                                            <h5 class="mb-0">Thai Airlines</h5>
                                            <small>Operated by Emirates</small>
                                        </div>
                                    </div>    
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner">
                                        <div class="content">
                                            <h4 class="mb-0">Friday Apr 18, 2022</h4>
                                        </div>
                                        </div>
                                    </div>    
                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                        <div class="item-inner">
                                            <div class="content">
                                                <h3 class="mb-0">11:30</h3>
                                                <p class="mb-0 text-uppercase">DAC</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner flight-time">
                                        <p class="mb-0">22H 45M <br>1 Stops</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner text-end">
                                            <p class="theme2 fs-4 fw-bold">$2,345</p>
                                            <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
    
                            <div class="item mb-2 border-all p-2 px-4 rounded">
                                <div class="row d-flex align-items-center justify-content-between">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="item-inner-image text-start">
                                            <img src="images/flights/flight_grid_5.png" alt="image">
                                            <h5 class="mb-0">Dragon Airlines</h5>
                                            <small>Operated by China</small>
                                        </div>
                                    </div>    
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner">
                                        <div class="content">
                                            <h4 class="mb-0">Saturday Jun 10, 2022</h4>
                                        </div>
                                        </div>
                                    </div>    
                                    <div class="col-lg-3 col-md-3 col-sm-12"> 
                                        <div class="item-inner">
                                            <div class="content">
                                                <h3 class="mb-0">8:00</h3>
                                                <p class="mb-0 text-uppercase">DAC</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner flight-time">
                                        <p class="mb-0">02H 45M <br>2 Stops</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="item-inner text-end">
                                            <p class="theme2 fs-4 fw-bold">$2,345</p>
                                            <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                        </div>
                                    </div>
                                </div>    
                            </div> --}}
    
                        </div>  
                    </div>
                    @empty
                    <div class="tab-pane fade content {{ \Carbon\Carbon::today()->format('Y-m-d') == $i ? 'show active' : null }} text-center" id="schedule{{ $i }}" role="tabpanel" aria-labelledby="nav-schedule{{ $i }}-tab">
                        <p>Data Tidak Tersedia</p>
                    </div>
                    @endforelse
                @endfor
                {{-- <div class="tab-pane fade show active text-center" id="schedule1" role="tabpanel" aria-labelledby="nav-schedule1-tab">
                    <div class="flight-full">
                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_2.png" alt="image">
                                        <h5 class="mb-0">Thai Airlines</h5>
                                        <small>Operated by Emirates</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Thursday Feb 15, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">7:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">02H 45M <br>2 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">$2,345</p>
                                        <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_3.png" alt="image">
                                        <h5 class="mb-0">Air Asia Airlines</h5>
                                        <small>Operated by Asia</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Friday Apr 18, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">9:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">22H 45M <br>1 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme fs-4 fw-bold">$1,445</p>
                                        <a href="flight-detail" class="nir-btn">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_4.png" alt="image">
                                        <h5 class="mb-0">Turkish Airlines</h5>
                                        <small>Operated by Turkey</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Saturday Jun 11, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">18:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">12H 45M <br>2 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">$2,445</p>
                                        <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_5.png" alt="image">
                                        <h5 class="mb-0">Dragon Airlines</h5>
                                        <small>Operated by China</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Sunday May 15, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">12:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">16H 45M <br>2 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">$2,045</p>
                                        <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                    </div>  
                </div>
                <div class="tab-pane fade content text-center" id="schedule2" role="tabpanel" aria-labelledby="nav-schedule2-tab">
                    <div class="flight-full">

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_3.png" alt="image">
                                        <h5 class="mb-0">Air Asia Airlines</h5>
                                        <small>Operated by Asia</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Thursday Feb 15, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">14:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">20H 45M <br>2 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme fs-4 fw-bold">$2,345</p>
                                        <a href="flight-detail" class="nir-btn">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_4.png" alt="image">
                                        <h5 class="mb-0">Turkish Airlines</h5>
                                        <small>Operated by Turkey</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Thursday Feb 15, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">7:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">12H 35M <br>2 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">$2,345</p>
                                        <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_2.png" alt="image">
                                        <h5 class="mb-0">Thai Airlines</h5>
                                        <small>Operated by Emirates</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Friday Apr 18, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">11:30</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">22H 45M <br>1 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">$2,345</p>
                                        <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="item mb-2 border-all p-2 px-4 rounded">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="item-inner-image text-start">
                                        <img src="images/flights/flight_grid_5.png" alt="image">
                                        <h5 class="mb-0">Dragon Airlines</h5>
                                        <small>Operated by China</small>
                                    </div>
                                </div>    
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner">
                                    <div class="content">
                                        <h4 class="mb-0">Saturday Jun 10, 2022</h4>
                                    </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-md-3 col-sm-12"> 
                                    <div class="item-inner">
                                        <div class="content">
                                            <h3 class="mb-0">8:00</h3>
                                            <p class="mb-0 text-uppercase">DAC</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner flight-time">
                                    <p class="mb-0">02H 45M <br>2 Stops</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="item-inner text-end">
                                        <p class="theme2 fs-4 fw-bold">$2,345</p>
                                        <a href="flight-detail" class="nir-btn-black">View Deals</a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                    </div>  
                </div> --}}
            </div>
            <div class="flight-btn text-center"><a href="flight-grid.html" class="nir-btn">View More</a></div>
        </div>
    </div>
</section>
@endsection

@section('script')
    
@endsection