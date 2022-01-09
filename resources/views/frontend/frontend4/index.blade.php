@extends('layouts.frontend_4.app')

@section('title')
    Pesona Plesiran Indonesia
@endsection

@section('content')
<?php $asset = asset('frontend/assets4/'); ?>
<div class="tp-banner-container">
    <div class="tp-banner-slider">
        <ul>
            @foreach ($wallpaper as $wp)
            <li data-masterspeed="700" data-slotamount="7" data-transition="fade"><img
                    src="rs-plugin/assets/loader.gif" data-lazyload="{{ asset($asset.'/img/wallpaper/'.$wp->image) }}"
                    data-bgposition="center" alt="" data-kenburns="on" data-duration="30000"
                    data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0"
                    data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10">
                <div data-x="['center','center','center','center']" data-y="center"
                    data-transform_in="x:-150px;opacity:0;s:1500;e:Power3.easeInOut;"
                    data-transform_out="x:150px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                    data-start="400" class="tp-caption sl-content">
                    <div class="sl-title-top">Welcome to</div>
                    <div class="sl-title">{{ $wp->nama_slider }}</div>
                    {{-- <div class="sl-title-bot">Starting <span>$105</span> per night</div> --}}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="search-tours-form">
        <div class="container">
            <div class="search-tours-wrap">
                <div class="search-tours-tabs">
                    <div class="search-tabs-wrap">
                        <div data-tours-cat="tab-cat-3" class="tours-tab-btn active"> <span>Hotels</span><i
                                class="tours-tab-icon flaticon-suntour-hotel"></i></div>
                    </div>
                </div>
                <div class="search-tours-content">
                    <div data-tours-cat="tab-cat-3" class="tours-container active">
                        <div class="hotels-box active">
                            <div class="hotels-search">
                                <form method="post" class="form search">
                                    <div class="search-wrap">
                                        <input type="text"
                                            placeholder="Destination, hotel name, airport, train station, landmark or address"
                                            class="form-control search-field"><i
                                            class="flaticon-suntour-map search-icon"></i>
                                    </div>
                                </form>
                            </div>
                            <div class="hotels-select">
                                <div class="tours-calendar divider-skew">
                                    <input placeholder="Check in" type="text" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" class="calendar-default textbox-n"><i
                                        class="flaticon-suntour-calendar calendar-icon"></i>
                                </div>
                                <div class="tours-calendar divider-skew">
                                    <input placeholder="Check out" type="text" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" class="calendar-default textbox-n"><i
                                        class="flaticon-suntour-calendar calendar-icon"></i>
                                </div>
                                <div class="selection-box divider-skew"><i
                                        class="flaticon-suntour-bed box-icon"></i>
                                    <select>
                                        <option>Rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="selection-box divider-skew"><i
                                        class="flaticon-suntour-adult box-icon"></i>
                                    <select>
                                        <option>Adults</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="selection-box"><i class="flaticon-suntour-children box-icon"></i>
                                    <select>
                                        <option>Children</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="button-search">Search</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="page-section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h6 class="title-section-top font-4">Special offers</h6>
                <h2 class="title-section"><span>Popular</span> Destinations</h2>
                <div class="cws_divider mb-25 mt-5"></div>
            </div>
            <div class="col-md-4"><img src="pic/promo-1.png" data-at2x="pic/promo-1@2x.png" alt
                    class="mt-md-0 mt-minus-70"></div>
        </div>
    </div>
    <div class="features-tours-full-width">
        <div class="features-tours-wrap clearfix">
            @forelse ($provinsis as $provinsi)
            <div class="features-tours-item">
                <div class="features-media">
                    @if ($provinsi->provinsi == 'Jawa Barat')
                    <img src="{{ $asset.'/img/image/jabar.jpg' }}" style="width: 350px; height: 350px; object-fit: cover;" alt>
                    @elseif ($provinsi->provinsi == 'Jawa Tengah')
                    <img src="{{ $asset.'/img/image/jateng.jpg' }}" style="width: 350px; height: 350px; object-fit: cover;" alt>
                    @elseif ($provinsi->provinsi == 'Di Yogyakarta')
                    <img src="{{ $asset.'/img/image/jogja.jpg' }}" style="width: 350px; height: 350px; object-fit: cover;" alt>
                    @elseif ($provinsi->provinsi == 'Jawa Timur')
                    <img src="{{ $asset.'/img/image/jatim.jpg' }}" style="width: 350px; height: 350px; object-fit: cover;" alt>
                    {{-- @elseif() --}}
                    @else
                    <img src="{{ $asset.'/pic/tours/1.jpg' }}" data-at2x="{{ $asset.'/pic/tours/1.jpg' }}" alt>
                    @endif
                    <div class="features-info-top">
                        <div class="info-price font-4"><span>start per night</span> IDR 0</div>
                        <div class="info-temp font-4"><span>local temperature</span> 30° / 86°</div>
                    </div>
                    <div class="features-info-bot">
                        <h4 class="title"><span class="font-4">Indonesia</span>
                            {{ $provinsi->provinsi }}</h4>
                    </div>
                </div>
            </div>
            @empty
            <p>Segera Hadir</p>
            @endforelse
        </div>
    </div>
</section>
<section class="small-section">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-6 mb-md-30">
                <div class="counter-block"><i class="counter-icon flaticon-suntour-world"></i>
                    <div class="counter-name-wrap">
                        <div data-count="0" class="counter">0</div>
                        <div class="counter-name">Tours</div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 mb-md-30">
                <div class="counter-block with-divider"><i
                        class="counter-icon flaticon-suntour-fireworks"></i>
                    <div class="counter-name-wrap">
                        <div data-count="0" class="counter">0</div>
                        <div class="counter-name">Holidays</div>
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
            <div class="col-md-2 col-xs-6">
                <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-airplane"></i>
                    <div class="counter-name-wrap">
                        <div data-count="0" class="counter">0</div>
                        <div class="counter-name">Flights</div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="counter-block with-divider"><i class="counter-icon flaticon-suntour-car"></i>
                    <div class="counter-name-wrap">
                        <div data-count="0" class="counter">0</div>
                        <div class="counter-name">Cars</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="small-section cws_prlx_section bg-gray-40"><img src="{{ $asset.'/img/wallpaper/caribbean-wood-beach.jpg' }}" alt
        class="cws_prlx_layer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-section-top alt" style="font-size: 18pt">THERE IS ALWAYS AWAY FOR AWAY</h3>
                <h2 class="title-section alt mb-20" style="font-weight: 700">Pesona Plesiran Indonesia</h2>
                <p class="color-white">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                    menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi,
                    Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p>
                <div class="cws_divider short mb-30 mt-30"></div>
            </div>
        </div>
    </div>
</section>
<section class="small-section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="title-section"><span>Hotels</span></h2>
                <div class="cws_divider mb-25 mt-5"></div>
            </div>
            <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
        </div>
        <div class="row">
            <!-- Recomended item-->
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
                        <div class="location"><i class="flaticon-suntour-map"></i> Indonesia
                        </div>
                    </div>
                    <!-- Recomended Content-->
                    <div class="recom-item-body"><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <h6 class="blog-title">{{ $hotel->nama_hotel }}</h6>
                        </a>
                        <div class="stars stars-4"></div>
                        <div class="recom-price"><span class="font-4">IDR {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'), 0, ',', '.') }}</span> per night</div>
                        <p class="mb-30">{{ substr(strip_tags($hotel->deskripsi), 0, 50) }}
                        </p><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}" class="recom-button">Read more</a><a
                            href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}" class="cws-button small alt">Book now</a>
                        {{-- <div class="action font-2">20%</div> --}}
                    </div>
                    <!-- Recomended Image-->
                </div>
            </div>
            @empty
                <p>Segera Hadir</p>
            @endforelse
        </div>
    </div>
</section>
@endsection