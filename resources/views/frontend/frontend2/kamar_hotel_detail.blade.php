@extends('layouts.frontend_3.app')

@section('title')
    {{ $kamar_hotels->hotel->nama_hotel }} {{ $kamar_hotels->nama_kamar }}
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <?php $imageKamarHotel = \App\Models\ImageKamarHotel::where('kamar_hotel_id', $kamar_hotels->id)->first(); ?>
        <div class="inner-baner-container" style="
                 @if ($imageKamarHotel !=null)
            background-image: url({{ asset('backend/assets2/images/kamar_hotel/' . $imageHotel['image']) }});
            @endif
            ">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">{{ $kamar_hotels->nama_kamar }}</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="single-tour-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-tour-inner">
                        <h2 style="text-transform: uppercase">{{ $kamar_hotels->nama_kamar }}</h2>
                        <figure class="feature-image">
                            <img src="assets/images/img27.jpg" alt="">
                            <div class="package-meta text-center">
                                <ul>
                                    <li>
                                        <i class="far fa-clock"></i>
                                        6 days / 5 night
                                    </li>
                                    <li>
                                        <i class="fas fa-user-friends"></i>
                                        Sisa Kamar: {{ $kamar_hotels->jumlah_kamar }}
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marked-alt"></i>
                                        Norway
                                    </li>
                                </ul>
                            </div>
                        </figure>
                        <div class="tab-container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">DESKRIPSI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab"
                                        aria-controls="program" aria-selected="false">FASILITAS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                        aria-controls="review" aria-selected="false">REVIEW</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab"
                                        aria-controls="map" aria-selected="false">Map</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview-tab">
                                    <div class="overview-content">
                                        <p>{{ $kamar_hotels->deskripsi_kamar }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                                    <div class="itinerary-content">
                                        <h3>Program <span>( 4 days )</span></h3>
                                        <p>Dolores maiores dicta dolore. Natoque placeat libero sunt sagittis debitis?
                                            Egestas non non qui quos, semper aperiam lacinia eum nam! Pede beatae. Soluta,
                                            convallis irure accusamus voluptatum ornare saepe cupidatat.</p>
                                    </div>
                                    <div class="itinerary-timeline-wrap">
                                        <ul>
                                            <li>
                                                <div class="timeline-content">
                                                    <div class="day-count">Day <span>1</span></div>
                                                    <h4>Ancient Rome Visit</h4>
                                                    <p>Nostra semper ultricies eu leo eros orci porta provident, fugit?
                                                        Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti
                                                        pretium.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-content">
                                                    <div class="day-count">Day <span>2</span></div>
                                                    <h4>Classic Rome Sightseeing</h4>
                                                    <p>Nostra semper ultricies eu leo eros orci porta provident, fugit?
                                                        Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti
                                                        pretium.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-content">
                                                    <div class="day-count">Day <span>3</span></div>
                                                    <h4>Vatican City Visit</h4>
                                                    <p>Nostra semper ultricies eu leo eros orci porta provident, fugit?
                                                        Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti
                                                        pretium.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-content">
                                                    <div class="day-count">Day <span>4</span></div>
                                                    <h4>Italian Food Tour</h4>
                                                    <p>Nostra semper ultricies eu leo eros orci porta provident, fugit?
                                                        Pariatur interdum assumenda, qui aliquip ipsa! Dictum natus potenti
                                                        pretium.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="summary-review">
                                        <div class="review-score">
                                            <span>4.9</span>
                                        </div>
                                        <div class="review-score-content">
                                            <h3>
                                                Excellent
                                                <span>( Based on 24 reviews )</span>
                                            </h3>
                                            <p>Tincidunt iaculis pede mus lobortis hendrerit eveniet impedit aenean mauris
                                                qui, pharetra rem doloremque laboris euismod deserunt non, cupiditate,
                                                vestibulum.</p>
                                        </div>
                                    </div>
                                    <!-- review comment html -->
                                    <div class="comment-area">
                                        <h3 class="comment-title">3 Reviews</h3>
                                        <div class="comment-area-inner">
                                            <ol>
                                                <li>
                                                    <figure class="comment-thumb">
                                                        <img src="assets/images/img20.jpg" alt="">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <div class="comment-header">
                                                            <h5 class="author-name">Tom Sawyer</h5>
                                                            <span class="post-on">Jana 10 2020</span>
                                                            <div class="rating-wrap">
                                                                <div class="rating-start" title="Rated 5 out of 5">
                                                                    <span style="width: 90%;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Officia amet posuere voluptates, mollit montes eaque accusamus
                                                            laboriosam quisque cupidatat dolor pariatur, pariatur auctor.
                                                        </p>
                                                        <a href="#" class="reply"><i
                                                                class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <ol>
                                                        <li>
                                                            <figure class="comment-thumb">
                                                                <img src="assets/images/img21.jpg" alt="">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <div class="comment-header">
                                                                    <h5 class="author-name">John Doe</h5>
                                                                    <span class="post-on">Jana 10 2020</span>
                                                                    <div class="rating-wrap">
                                                                        <div class="rating-start"
                                                                            title="Rated 5 out of 5">
                                                                            <span style="width: 90%"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p>Officia amet posuere voluptates, mollit montes eaque
                                                                    accusamus laboriosam quisque cupidatat dolor pariatur,
                                                                    pariatur auctor.</p>
                                                                <a href="#" class="reply"><i
                                                                        class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                            <ol>
                                                <li>
                                                    <figure class="comment-thumb">
                                                        <img src="assets/images/img22.jpg" alt="">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <div class="comment-header">
                                                            <h5 class="author-name">Jaan Smith</h5>
                                                            <span class="post-on">Jana 10 2020</span>
                                                            <div class="rating-wrap">
                                                                <div class="rating-start" title="Rated 5 out of 5">
                                                                    <span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Officia amet posuere voluptates, mollit montes eaque accusamus
                                                            laboriosam quisque cupidatat dolor pariatur, pariatur auctor.
                                                        </p>
                                                        <a href="#" class="reply"><i
                                                                class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="comment-form-wrap">
                                            <h3 class="comment-title">Leave a Review</h3>
                                            <form class="comment-form">
                                                <div class="full-width rate-wrap">
                                                    <label>Your rating</label>
                                                    <div class="procduct-rate">
                                                        <span></span>
                                                    </div>
                                                </div>
                                                <p>
                                                    <input type="text" name="name" placeholder="Name">
                                                </p>
                                                <p>
                                                    <input type="text" name="name" placeholder="Last name">
                                                </p>
                                                <p>
                                                    <input type="email" name="email" placeholder="Email">
                                                </p>
                                                <p>
                                                    <input type="text" name="subject" placeholder="Subject">
                                                </p>
                                                <p>
                                                    <textarea rows="6" placeholder="Your review"></textarea>
                                                </p>
                                                <p>
                                                    <input type="submit" name="submit" value="Submit">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="map" role="tabpanel" aria-labelledby="map-tab">
                                    <div class="map-area">
                                        <iframe
                                            src="https://maps.google.com/maps?q={{ $kamar_hotels->hotel->nama_hotel }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                            height="450" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-tour-gallery">
                            <h3>GALLERY / PHOTOS</h3>
                            <div class="single-tour-slider">
                                <div class="single-tour-item">
                                    <figure class="feature-image">
                                        <img src="assets/images/img28.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="single-tour-item">
                                    <figure class="feature-image">
                                        <img src="assets/images/img29.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="single-tour-item">
                                    <figure class="feature-image">
                                        <img src="assets/images/img32.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="single-tour-item">
                                    <figure class="feature-image">
                                        <img src="assets/images/img33.jpg" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="package-price">
                            <h5 class="price">
                                <span>IDR {{ number_format($kamar_hotels->price,0,",",".") }}</span> / per kamar
                            </h5>
                            <div class="start-wrap">
                                <div class="rating-start" title="Rated 5 out of 5">
                                    <span style="width: 60%"></span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-bg booking-form-wrap">
                            <h4 class="bg-title">Booking</h4>
                            <form action="{{ route('booking_hotel.simpan') }}" method="post" class="booking-form">
                                @csrf
                                <input type="hidden" name="hotel" value="{{ $kamar_hotels->hotel->nama_hotel }}">
                                <input type="hidden" name="kamar" value="{{ $kamar_hotels->nama_kamar }}">
                                <input type="hidden" name="description" value="{{ $kamar_hotels->hotel->nama_hotel.' '.$kamar_hotels->nama_kamar }}">
                                <input type="hidden" name="amount" value="{{ $kamar_hotels->price }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name_booking" type="text" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="email_booking" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="phone_booking" type="text" placeholder="Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input class="input-date-picker" type="text" name="booking_date" autocomplete="off"
                                                readonly="readonly" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group submit-btn">
                                            <input type="submit" name="submit" value="Booking Now">
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
@endsection
