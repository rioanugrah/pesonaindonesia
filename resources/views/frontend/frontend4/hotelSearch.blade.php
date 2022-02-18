@extends('layouts.frontend_4.app')

@section('title')
    Hotel
@endsection

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">hotels</a><i>/</i><a href="#"
                    class="last"><span>Hotels</span> List</a>
                <h2><span>Hotels</span> List</h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <?php $asset = asset('frontend/assets4/'); ?>
    <div class="container page">
        <div class="row">
            <div class="col-md-4">
                <div class="search-hotels mb-40 pattern alt">
                    <div class="tours-container">
                        <div class="tours-box">
                            <form method="get" action="{{ route('frontend.hotel_search') }}" class="form search divider-skew">
                            <div class="tours-search mb-20">
                                <div class="search-wrap">
                                    <input type="text" value="{{ $search['search_hotel'] }}" placeholder="Destination" class="form-control search-field"><i
                                        class="flaticon-suntour-map search-icon"></i>
                                </div>
                                <div class="tours-calendar divider-skew">
                                    <input placeholder="Check Out" type="text" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" value="{{ $search['out'] }}" class="calendar-default textbox-n"><i
                                        class="flaticon-suntour-calendar calendar-icon"></i>
                                </div>
                                <div class="tours-calendar divider-skew">
                                    <input placeholder="Check In" type="text" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" value="{{ $search['in'] }}" class="calendar-default textbox-n"><i
                                        class="flaticon-suntour-calendar calendar-icon"></i>
                                </div>
                                <div class="selection-box divider-skew"><i class="flaticon-suntour-adult box-icon"></i>
                                    <select name="adult" value="{{ $search['adult'] }}">
                                        <option>Adult</option>
                                        <option {{ $search['adult'] == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $search['adult'] == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $search['adult'] == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $search['adult'] == 4 ? 'selected' : '' }} value="4">4</option>
                                    </select>
                                </div>
                                <div class="selection-box divider-skew"><i class="flaticon-suntour-children box-icon"></i>
                                    <select name="children">
                                        <option>Child</option>
                                        <option {{ $search['children'] == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $search['children'] == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $search['children'] == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $search['children'] == 4 ? 'selected' : '' }} value="4">4</option>
                                    </select>
                                </div>
                                <div class="selection-box"><i class="flaticon-suntour-bed box-icon"></i>
                                    <select name="room">
                                        <option>Room</option>
                                        <option {{ $search['room'] == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $search['room'] == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $search['room'] == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $search['room'] == 4 ? 'selected' : '' }} value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 clearfix">
                                    <div class="rating">Rating
                                        <div class="stars stars-5"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tours-search">
                                        <form method="post" class="form search">
                                            <div class="search-wrap">
                                                <input type="text" placeholder="Destination"
                                                    class="form-control search-field"><i
                                                    class="flaticon-suntour-map search-icon"></i>
                                            </div>
                                        </form>
                                        <div class="button-search">Search</div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Recomended item-->
                @forelse ($hotels as $hotel)
                <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id',$hotel->id)->first(); ?>
                <div class="recom-item border">
                    <div class="recom-media"><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <div class="pic">
                                @if ($imageHotel == null)
                                <img src="{{ $asset.'/img/tour-thumb01.jpg' }}" style="width: 770px; height: 240px; object-fit: cover;" data-at2x="{{ $asset.'/img/tour-thumb01.jpg' }}"
                                    alt>
                                @else
                                <img src="{{ $asset.'/hotels/'.$imageHotel['image'] }}" style="width: 770px; height: 240px; object-fit: cover;" data-at2x="{{ $asset.'/hotels/'.$imageHotel['image'] }}"
                                    alt>
                                @endif
                            </div>
                        </a>
                        <div class="location"><i class="flaticon-suntour-map"></i> Indonesia</div>
                    </div>
                    <div class="recom-item-body"><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">
                            <h6 class="blog-title">{{ $hotel->nama_hotel }}</h6>
                        </a>
                        <div class="stars stars-4"></div>
                        <div class="recom-price"><span class="font-4">IDR {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'),0,",",".") }}</span> per night</div>
                        <p class="mb-30">{{ substr(strip_tags($hotel->deskripsi), 0, 50) }}</p><a
                            href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}" class="recom-button">Read more</a><a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}"
                            class="cws-button small alt">Book now</a>
                    </div>
                </div>
                @empty
                    <p>Segera Hadir</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
