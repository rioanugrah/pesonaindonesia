@extends('layouts.frontend_4.app')

@section('title')
    Pesona Plesiran Indonesia
@endsection

@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection

@section('canonical')
    {{ url('/') }}
@endsection
@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection

@section('css')
    <link rel="canonical" href="{{ asset('frontend/assets4/google944b26bed799388c.html') }}">
@endsection

@section('content')
    <?php $asset = asset('frontend/assets4/'); ?>
    <div class="tp-banner-container">
        <div class="tp-banner-slider">
            <ul>
                @foreach ($wallpaper as $wp)
                    <li data-masterspeed="700" data-slotamount="7" data-transition="fade"><img src="rs-plugin/assets/loader.gif"
                            data-lazyload="{{ asset($asset . '/img/wallpaper/' . $wp->image) }}" data-bgposition="center"
                            alt="" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone"
                            data-scalestart="0" data-scaleend="0" data-rotatestart="0" data-rotateend="0"
                            data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="-20">
                        <div data-x="['center','center','center','center']" data-y="center"
                            data-transform_in="x:-150px;opacity:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="x:150px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-start="400" class="tp-caption sl-content">
                            <div class="sl-title">{{ $wp->nama_slider }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <section class="page-section pb-0 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="title-section"><span>Partner</span> Kami</h2>
                    <div class="cws_divider mb-25 mt-5"></div>
                </div>
                <div class="col-md-4"><img src="pic/promo-1.png" data-at2x="pic/promo-1@2x.png" alt
                        class="mt-md-0 mt-minus-70"></div>
            </div>
        </div>
        <div class="features-tours-full-width">
            <div class="features-tours-wrap clearfix">
                @forelse ($provinsis as $provinsi)
                    <?php $kotas = \App\Models\KabupatenKota::where('id_provinsi', $provinsi->id)->get(); ?>
                    <a href="{{ route('plmlg') }}">
                        <div class="features-tours-item">
                            <div class="features-media">
                                @if ($provinsi->nama == 'Jawa Timur')
                                    @foreach ($kotas as $kota)
                                        @if ($kota->nama == 'Kota Malang')
                                            <img src="{{ $asset . '/img/image/jatim.jpg' }}"
                                                style="width: 480px; height: 350px; object-fit: cover;" alt>
                                            <div class="features-info-bot">
                                                <h4 class="title"><span class="font-4">{{ $provinsi->nama }} -
                                                        Indonesia</span>
                                                    {{ $kota->nama }}</h4>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Segera Hadir</p>
                @endforelse
            </div>
        </div>
    </section> --}}
    {{-- <section class="small-section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-6 mb-md-30">
                    <div class="counter-block"><i class="counter-icon flaticon-suntour-world"></i>
                        <div class="counter-name-wrap">
                            <div data-count="0" class="counter">{{ $jumlah_paket_wisata }}</div>
                            <div class="counter-name">Tours</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 mb-md-30">
                    <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-hotel"></i>
                        <div class="counter-name-wrap">
                            <div data-count="{{ $jumlah_hotel }}" class="counter">{{ $jumlah_hotel }}</div>
                            <div class="counter-name">Hotels</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 mb-md-30">
                    <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-ship"></i>
                        <div class="counter-name-wrap">
                            <div data-count="0" class="counter">0</div>
                            <div class="counter-name">Cruises</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 mb-md-30">
                    <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-airplane"></i>
                        <div class="counter-name-wrap">
                            <div data-count="0" class="counter">0</div>
                            <div class="counter-name">Flights</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 mb-md-30">
                    <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-car"></i>
                        <div class="counter-name-wrap">
                            <div data-count="0" class="counter">0</div>
                            <div class="counter-name">Cars</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 mb-md-30">
                    <div class="counter-block with-divider"><i class="counter-icon fas fa-bullhorn"></i>
                        <div class="counter-name-wrap">
                            <div data-count="{{ $event }}" class="counter">{{ $event }}</div>
                            <div class="counter-name">Events</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="small-section cws_prlx_section bg-gray-40 mb-20"><img src="{{ asset('frontend/assets4/img/wallpaper/bg_video.webp') }}" alt class="cws_prlx_layer">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <h2 class="title-section-top alt">About</h2>
              <h2 class="title-section alt mb-20">Pesona Plesiran Indonesia</h2>
              <p class="color-white">Pesona Plesiran Indonesia is a millennial Digital Marketing Platform that provides convenience in obtaining information and bookings for Accommodation, Destinations, Restaurants, Transportation, Travel and MICE throughout Indonesia.</p>
              <div class="cws_divider short mb-30 mt-30"></div>
              <h3 class="font-5 color-white font-medium">Team</h3>
            </div>
            <div class="col-md-7">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.youtube.com/embed/Yb6KMxB3I1M" class="embed-responsive-item" allow="autoplay"></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
    <section class="pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="title-section"><span>Our</span> Recommendation</h3>
                    <div class="cws_divider mb-25 mt-5"></div>
                </div>
            </div>
            {{-- @forelse ($pakets as $paket)
                <div class="col-md-6">
                    <div class="recom-item">
                        <div class="recom-media"><a href="{{ route('frontend.paket.detail', ['slug' => $paket->slug]) }}">
                                <div class="pic"><img src="{{ asset('frontend/assets4/img/paket/' . $paket->images) }}"
                                        style="width: 770px; height: 240px; object-fit: cover;"
                                        data-at2x="{{ asset('frontend/assets4/img/paket/' . $paket->images) }}" alt>
                                </div>
                            </a>
                        </div>
                        <div class="recom-item-body">
                            <a href="{{ route('frontend.paket.detail', ['slug' => $paket->slug]) }}">
                                <h6 class="blog-title">{{ $paket->nama_paket }}</h6>
                            </a>
                            <div class="stars stars-5"></div>
                            <a href="{{ route('frontend.paket.detail', ['slug' => $paket->slug]) }}"
                                class="recom-button">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse --}}
            @forelse ($paket_trips as $paket)
            <div class="col-md-6">
                <div class="recom-item">
                    <div class="recom-media"><a href="{{ route('frontend.pagesDetail', ['slug' => $paket->pakets->slug, 'id' => $paket->id]) }}">
                            <div class="pic"><img src="{{ asset('frontend/assets4/img/paket/list/' . $paket->images) }}"
                                    style="width: 770px; height: 240px; object-fit: cover;"
                                    data-at2x="{{ asset('frontend/assets4/img/paket/list/' . $paket->images) }}" alt>
                            </div>
                        </a>
                    </div>
                    <div class="recom-item-body">
                        <a href="{{ route('frontend.pagesDetail', ['slug' => $paket->pakets->slug, 'id' => $paket->id]) }}">
                            <h6 class="blog-title">{{ $paket->nama_paket }}</h6>
                        </a>
                        <div class="stars stars-5"></div>
                        <div class="recom-price">
                            @if ($paket->diskon == 0)
                            <span class="font-4">Rp. {{ number_format($paket->price,0,",",".") }}</span>
                            @else
                            <p style="margin-bottom: -5%">
                                <span style="text-decoration: line-through;text-decoration-color: #eb4034;">Rp. {{ number_format($paket->price,0,",",".") }}</span>
                            </p>
                            <p>
                                <span class="font-4">Rp. {{ number_format($paket->price-(($paket->diskon / 100)*$paket->price),0,",",".") }}</span>
                                @if ($paket->kategori_id == 1) 
                                    / {{ $paket->jumlah_paket }} pax
                                @else
                                    / pax
                                @endif
                            </p>
                            @endif
                        </div>
                        <a href="{{ route('frontend.pagesDetail', ['slug' => $paket->pakets->slug, 'id' => $paket->id]) }}"
                            class="recom-button">Selengkapnya</a>
                        <a href="{{ route('frontend.paket.cart',['slug' => $paket->pakets->slug,'id' => $paket->id]) }}" class="cws-button small alt">Book now</a>
                        @if ($paket->diskon != 0)
                        <div class="action font-2">{{ $paket->diskon }}%</div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
        </div>
    </section>
    {!! Adsense::ads('ads_unit') !!}
    <section class="small-section cws_prlx_section bg-gray-40"><img
            src="{{ $asset . '/img/wallpaper/bromo.webp' }}" alt class="cws_prlx_layer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h3 class="title-section-top alt" style="font-size: 18pt">THERE IS ALWAYS AWAY FOR AWAY</h3> --}}
                    <h2 class="title-section alt mb-20" style="font-weight: 700">THERE IS ALWAYS AWAY FOR AWAY</h2>
                    {{-- <p class="color-white">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                        menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi,
                        Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p> --}}
                    <div class="cws_divider short mb-30 mt-30"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="small-section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="title-section"><span>Hotels</span></h2>
                <div class="cws_divider mb-25 mt-5"></div>
            </div>
            <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
        </div>
        <div class="row">
            @forelse ($hotels as $hotel)
            <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id', $hotel->id)->first(); ?>
            <div class="col-md-6">
                <div class="recom-item">
                    <div class="recom-media"><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <div class="pic">
                                @if ($imageHotel == null)
                                <img src="{{ 'frontend/assets2/images/tour-thumb01.jpg' }}"
                                    data-at2x="{{ 'frontend/assets2/images/tour-thumb01.jpg' }}" style="width: 770px; height: 240px; object-fit: cover;" alt>
                                @else
                                <img src="{{ asset('backend/assets2/images/hotel/' . $imageHotel['image']) }}"
                                    data-at2x="{{ asset('backend/assets2/images/hotel/' . $imageHotel['image']) }}" alt>
                                @endif
                            </div>
                        </a>
                        <div class="location"><i class="flaticon-suntour-map"></i> {{ $hotel->kotas->nama }}, {{ $hotel->provinsis->nama }}
                        </div>
                    </div>
                    <div class="recom-item-body"><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <h6 class="blog-title">{{ $hotel->nama_hotel }}</h6>
                        </a>
                        <div class="stars stars-4"></div>
                        <div class="recom-price"><span class="font-4">IDR {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'), 0, ',', '.') }}</span> per night</div>
                        <p class="mb-30">{{ substr(strip_tags($hotel->deskripsi), 0, 50) }}
                        </p><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}" class="recom-button">Read more</a><a
                            href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}" class="cws-button small alt">Book now</a>
                    </div>
                </div>
            </div>
            @empty
                <p>Segera Hadir</p>
            @endforelse
        </div>
    </div>
</section> --}}
@endsection

@section('js')
@endsection
