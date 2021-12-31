@extends('layouts.frontend_3.app')

@section('title')
    Pesona Plesiran Indonesia
@endsection

@section('content')
    <section class="home-slider-section">
        <div class="home-slider">
            @foreach ($wallpaper as $wp)
                <div class="home-banner-items">
                    <div class="banner-inner-wrap"
                        style="background-image: url({{ asset('frontend/assets3/images/wallpaper/' . $wp->image) }});">
                    </div>
                    <div class="banner-content-wrap">
                        <div class="container">
                            <div class="banner-content text-center">
                                <h2 class="banner-title" style="text-transform: uppercase">{{ $wp->nama_slider }}</h2>
                                {{-- <p>Taciti quasi, sagittis excepteur hymenaeos, id temporibus hic proident ullam,
                            eaque donec delectus tempor consectetur nunc, purus congue? Rem volutpat
                            sodales! Mollit. Minus exercitationem wisi.</p> --}}
                                {{-- <a href="#" class="button-primary">CONTINUE READING</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="package-section mt-4">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h2>HOTEL</h2>
                        {{-- <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid
                        blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum
                        magnis maxime curae placeat.</p> --}}
                    </div>
                </div>
            </div>
            <div class="package-inner">
                <div class="row">
                    @forelse ($hotels as $hotel)
                        <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id', $hotel->id)->first(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">
                                        @if ($imageHotel == null)
                                            <img src="{{ asset('frontend/assets2/images/tour-thumb01.jpg') }}"
                                                style="height: 400px; object-fit: cover;" alt="Image">
                                        @else
                                            <img src="{{ asset('backend/assets2/images/hotel/' . $imageHotel['image']) }}"
                                                style="height: 400px; object-fit: cover;" alt="Image">
                                        @endif
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>IDR
                                            {{ number_format(\App\Models\KamarHotel::where('hotel_id', $hotel->id)->avg('price'), 0, ',', '.') }}
                                        </span> / per kamar per malam
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>

                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                Kamar:
                                                {{ \App\Models\KamarHotel::where('hotel_id', $hotel->id)->count() }}
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Indonesia
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a
                                                href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}">{{ $hotel->nama_hotel }}</a>
                                        </h3>
                                        {{-- <div class="review-area">
                                    <span class="review-text">(25 reviews)</span>
                                    <div class="rating-start" title="Rated 5 out of 5">
                                        <span style="width: 60%"></span>
                                    </div>
                                </div> --}}
                                        <p>{{ substr(strip_tags($hotel->deskripsi), 0, 250) }}</p>
                                        <div class="btn-wrap">
                                            <a href="{{ route('frontend.hotelDetail', ['slug' => $hotel->slug]) }}"
                                                class="button-text width-6">Detail<i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4>Segera Hadir</h4>
                    @endforelse
                </div>
                <div class="btn-wrap text-center">
                    <a href="{{ route('frontend.hotel') }}" class="button-primary">VIEW ALL PACKAGES</a>
                </div>
            </div>
        </div>
    </section>

    <section class="activity-section" style="margin-bottom: 10%">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">PLESIRAN INDONESIA BY ACTIVITY</h5>
                        <h2>ADVENTURE & ACTIVITY</h2>
                    </div>
                </div>
            </div>
            <div class="activity-inner row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('frontend/assets3/images/hotel.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="{{ route('frontend.hotel') }}">Hotel</a>
                            </h4>
                            <p>{{ $jumlah_hotel }} Hotel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('frontend/assets3/images/icon11.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Exploring</a>
                            </h4>
                            <p>0 Destinasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe-section"
        style="background-image: url({{ asset('frontend/assets3/images/wallpaper/caribbean-wood-beach.jpg') }});">
        <div class="container" style="padding-bottom:10%">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-heading section-heading-white">
                        <h5 class="dash-style">THERE IS ALWAYS AWAY FOR AWAY</h5>
                        <h2>PESONA PLESIRAN INDONESIA</h2>
                        {{-- <h4>Sign up now to recieve hot special offers and information about the best tour packages, updates
                            and discounts !!</h4>
                        <div class="newsletter-form">
                            <form>
                                <input type="email" name="s" placeholder="Your Email Address">
                                <input type="submit" name="signup" value="SIGN UP NOW!">
                            </form>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                            mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend temporibus occaecat luctus
                            eleifend tempo ribus.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-img"
                        style="background-image: url({{ asset('frontend/assets3/images/tugu_malang.jpg') }});">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-details-wrap">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="contact-details">
                                    <div class="contact-icon">
                                        <img src="{{ asset('frontend/assets3/images/icon12.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="mailto:business@plesiranindonesia.com"
                                                style="font-size: 10pt">business@plesiranindonesia.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="contact-details">
                                    <div class="contact-icon">
                                        <img src="{{ asset('frontend/assets3/images/icon13.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#" style="font-size: 10pt">-</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="contact-details">
                                    <div class="contact-icon">
                                        <img src="{{ asset('frontend/assets3/images/icon14.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>
                                            <span style="font-size: 10pt">Jl. Raya Tlogowaru No. 3, Tlogowaru Kec.
                                                Kedungkandang, Kota Malang, Jawa Timur</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-btn-wrap">
                        <h3>THERE IS ALWAYS AWAY FOR AWAY !!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
