@extends('layouts.frontend2.app')

@section('title')
    Hotel
@endsection

@section('content')
    <section class="tours-header" style="margin-top: -7%">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>@yield('title')</h2>
                </div>
            </div>
          </div>
    </section>
    <section class="tours-list tours" style="margin-top: -5%">
        <div class="container">
          <div class="row">
              @forelse ($hotels as $hotel)
              <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id',$hotel->id)->first(); ?>
              <div class="col-12 column">
                <div class="tour-box-list t-box">
                  <figure>
                      @if ($imageHotel == null)
                      <img src="{{ asset('frontend/assets2/images/tour-thumb01.jpg') }}" alt="Image">  
                      @else
                      <img src="{{ asset('backend/assets2/images/hotel/'.$imageHotel['image']) }}" alt="Image">  
                      @endif
                      <span class="tag">MOST POPULAR</span>
                    </figure>
                  <div class="tour-content">
                   <small>FROM SKAFTAFELL</small>
                   <h3>{{ $hotel->nama_hotel }}</h3>
                    <p style="text-align: justify;">{{ substr(strip_tags($hotel->deskripsi),0,250) }} @if (strlen(strip_tags($hotel->deskripsi)) > 250)
                        ... <a href="#" class="btn btn-sm">Selengkapnya</a>
                    @endif</p>
                    {{-- <div class="inner">
                        <a href="#">DETAIL</a>
                    </div> --}}
                    </div>
                </div>
              </div>
              @empty
                  <p>Data Tidak Tersedia</p>
              @endforelse
              {{ $hotels->links() }}
            <div class="col-12 text-center"> <a href="#" class="site-btn">LOAD MORE</a> </div>
          </div>
        </div>
      </section>
@endsection