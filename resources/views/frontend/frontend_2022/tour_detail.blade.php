@extends('layouts.frontend_2022.app')
@section('title')
    {{ $trip_detail->nama_paket }}
@endsection
@section('content')
    <div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
        <div class="tourmaster-page-wrapper tourmaster-tour-style-1 tourmaster-with-sidebar" id="tourmaster-page-wrapper">

            <div class="tourmaster-single-header"
                style="background-image: url({{ asset('frontend/assets_new/images/paket/list/' . $trip_detail->images) }});">
                <div class="tourmaster-single-header-background-overlay"></div>
                <div class="tourmaster-single-header-top-overlay"></div>
                <div class="tourmaster-single-header-overlay"></div>
                <div class="tourmaster-single-header-container tourmaster-container">
                    <div class="tourmaster-single-header-container-inner">
                        <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                            <h1 class="tourmaster-single-header-title">{{ $trip_detail->nama_paket }}</h1>
                            <div class="tourmaster-tour-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><span
                                    class="tourmaster-tour-rating-text">(1 Review)</span></div>
                        </div>
                        <div class="tourmaster-header-price tourmaster-item-mglr">
                            @if ($trip_detail->diskon != 0)
                                <div class="tourmaster-header-price-ribbon">{{ $trip_detail->diskon }}% Off</div>
                            @endif
                            <div class="tourmaster-header-price-wrap">
                                <div class="tourmaster-header-price-overlay"></div>
                                <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                    @if ($trip_detail->diskon != 0)
                                        <span class="tourmaster-tour-price">
                                            <span class="tourmaster-head" style="color: #fff">From</span>
                                            <span class="tourmaster-tail" style="color: #fff">Rp.
                                                {{ number_format($trip_detail->price, 0, ',', '.') }}</span>
                                        </span>
                                        <br>
                                    @endif
                                    <span class="tourmaster-tour-discount-price" style="font-size: 18pt">Rp.
                                        {{ number_format($trip_detail->price - ($trip_detail->diskon / 100) * $trip_detail->price, 0, ',', '.') }}</span>
                                    <span class="fa fa-info-circle tourmaster-tour-price-info" style="color: #fff"
                                        data-rel="tipsy"
                                        title="The initial price based on 1 adult with the lowest price in low season"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tourmaster-template-wrapper">
                <div class="tourmaster-tour-booking-bar-container tourmaster-container">
                    <form action="" method="post" class="tourmaster-enquiry-form tourmaster-form-field tourmaster-with-border clearfix"
                    id="tourmaster-enquiry-form">
                        @csrf
                        <div class="tourmaster-tour-booking-bar-container-inner">
                            <div class="tourmaster-tour-booking-bar-anchor tourmaster-item-mglr"></div>
                            <div class="tourmaster-tour-booking-bar-wrap tourmaster-item-mglr"
                                id="tourmaster-tour-booking-bar-wrap">
                                <div class="tourmaster-tour-booking-bar-outer">
                                    <div class="tourmaster-header-price tourmaster-item-mglr">
                                        @if ($trip_detail->diskon != 0)
                                            <div class="tourmaster-header-price-ribbon">{{ $trip_detail->diskon }}% Off</div>
                                        @endif
                                        <div class="tourmaster-header-price-wrap">
                                            <div class="tourmaster-header-price-overlay"></div>
                                            <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                @if ($trip_detail->diskon != 0)
                                                    <span class="tourmaster-tour-price">
                                                        <span class="tourmaster-head" style="color: #fff">From</span>
                                                        <span class="tourmaster-tail" style="color: #fff">Rp.
                                                            {{ number_format($trip_detail->price, 0, ',', '.') }}</span>
                                                    </span>
                                                    <br>
                                                @endif
                                                <span class="tourmaster-tour-discount-price" style="font-size: 18pt">Rp.
                                                    {{ number_format($trip_detail->price - ($trip_detail->diskon / 100) * $trip_detail->price, 0, ',', '.') }}</span>
                                                <span class="fa fa-info-circle tourmaster-tour-price-info" style="color: #fff"
                                                    data-rel="tipsy"
                                                    title="The initial price based on 1 adult with the lowest price in low season"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tourmaster-tour-booking-bar-inner">
                                        <div class="tourmaster-booking-tab-title clearfix" id="tourmaster-booking-tab-title">
                                            <div class="tourmaster-booking-tab-title-item" data-tourmaster-tab="booking">Detail
                                                Booking</div>
                                            <div class="tourmaster-booking-tab-title-item tourmaster-active"
                                                data-tourmaster-tab="enquiry">Enquiry Form</div>
                                        </div>
                                        <div class="tourmaster-booking-tab-content" data-tourmaster-tab="booking">
                                            <div
                                                class="tourmaster-single-tour-booking-fields tourmaster-update-header-price tourmaster-form-field tourmaster-with-border">
                                                <div class="tourmaster-tour-booking-date clearfix"><i class="fa fa-cube"></i>
                                                    <div class="tourmaster-tour-booking-date-input">
                                                        <div class="tourmaster-tour-booking-date-display"
                                                            style="font-size: 10pt">{{ $trip_detail->nama_paket }} <span
                                                                id="jumlah_order"></span></div>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-booking-date clearfix"><i class="fa fa-user"></i>
                                                    <div class="tourmaster-tour-booking-next-sign">
                                                        <span></span>
                                                    </div>
                                                    <div class="tourmaster-tour-booking-date-input">
                                                        <div class="tourmaster-tour-booking-date-display"
                                                            style="font-size: 10pt" id="full_name"></div>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-booking-date clearfix"><i class="fa fa-home"></i>
                                                    <div class="tourmaster-tour-booking-next-sign">
                                                        <span></span>
                                                    </div>
                                                    <div class="tourmaster-tour-booking-date-input">
                                                        <div class="tourmaster-tour-booking-date-display"
                                                            style="font-size: 10pt" id="alamat"></div>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-booking-date clearfix"><i
                                                        class="fa fa-calendar"></i>
                                                    <div class="tourmaster-tour-booking-next-sign">
                                                        <span></span>
                                                    </div>
                                                    <div class="tourmaster-tour-booking-date-input">
                                                        <div class="tourmaster-tour-booking-date-display"
                                                            style="font-size: 10pt" id="tanggal_berangkat"></div>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-booking-date clearfix"><i class="fa fa-money"></i>
                                                    <div class="tourmaster-tour-booking-next-sign">
                                                        <span></span>
                                                    </div>
                                                    <div class="tourmaster-tour-booking-date-input">
                                                        <div class="tourmaster-tour-booking-date-display"
                                                            style="font-size: 10pt">
                                                            <span>Total: </span>
                                                            <span id="orderTotal"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tourmaster-lightbox-content-wrap"
                                                data-tmlb-id="proceed-without-login">
                                                <div class="tourmaster-lightbox-head">
                                                    <h3 class="tourmaster-lightbox-title">Proceed Booking</h3><i
                                                        class="tourmaster-lightbox-close icon_close"></i>
                                                </div>
                                                <div class="tourmaster-lightbox-content">
                                                    <div class="tourmaster-login-form2-wrap clearfix">
    
                                                        <div class="tourmaster-login2-right">
                                                            <h3 class="tourmaster-login2-right-title">Don&#039;t have an
                                                                account? Create one.</h3>
                                                            <div class="tourmaster-login2-right-content">
                                                                <div class="tourmaster-login2-right-description">When you book
                                                                    with an account, you will be able to track your payment
                                                                    status, track the confirmation and you can also rate the
                                                                    tour after you finished the tour.</div> <a
                                                                    class="tourmaster-button"
                                                                    href="../../register/indexbd2a.html?redirect=payment">Sign
                                                                    Up</a>
                                                            </div>
                                                            <h3 class="tourmaster-login2-right-title">Or Continue As Guest</h3>
                                                            <a class="tourmaster-button"
                                                                href="../../index4bb8.html?tourmaster-payment">Continue As
                                                                Guest</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tourmaster-booking-tab-content tourmaster-active"
                                            data-tourmaster-tab="enquiry">
                                            <div class="tourmaster-tour-booking-enquiry-wrap">
                                                {{-- <form
                                                    class="tourmaster-enquiry-form tourmaster-form-field tourmaster-with-border clearfix"
                                                    id="tourmaster-enquiry-form"
                                                    data-ajax-url="https://demo.goodlayers.com/traveltour/wp-admin/admin-ajax.php"
                                                    data-action="tourmaster_send_enquiry_form"
                                                    data-validate-error="Please fill all required fields."> --}}
                                                    <input type="hidden" id="detail_maksimal"
                                                        value="{{ $trip_detail->jumlah_paket }}">
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field-first-name tourmaster-type-text clearfix">
                                                        <div class="tourmaster-head">Nama<span class="tourmaster-req">*</span>
                                                        </div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <input type="text" name="full_name" class="full_name"
                                                                value="" data-required />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field-last-name tourmaster-type-text clearfix">
                                                        <div class="tourmaster-head">Alamat<span
                                                                class="tourmaster-req">*</span></div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <textarea name="alamat" class="alamat" data-required></textarea>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field-email-address tourmaster-type-email clearfix">
                                                        <div class="tourmaster-head">Email<span
                                                                class="tourmaster-req">*</span></div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <input type="email" name="email-address" value=""
                                                                data-required />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field-travel-date tourmaster-type-datepicker clearfix">
                                                        <div class="tourmaster-head">Tanggal Berangkat<span
                                                                class="tourmaster-req">*</span></div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <input type="text"
                                                                class="tourmaster-datepicker tanggal_berangkat"
                                                                name="tanggal_berangkat" value="" /><i
                                                                class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                        <div class="tourmaster-head">Pembayaran</div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <select name="bank" class="">
                                                                <option>-- Select Payment --</option>
                                                                @foreach ($payments as $payment)
                                                                <option value="{{ $payment['kode_bank'] }}">{{ $payment['nama_bank'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                        <div class="tourmaster-head">Jumlah Anggota (Kosongkan bila tidak
                                                            memiliki anggota)</div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <input type="text" name="qty" value=""
                                                                class="jumlah" />
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="tourmaster-enquiry-field tourmaster-enquiry-field tourmaster-type-email clearfix">
                                                        <div class="tourmaster-head">Data Anggota<span
                                                                class="tourmaster-req">*</span></div>
                                                        <div class="tourmaster-tail clearfix">
                                                            <table id="dynamic_field"></table>
                                                        </div>
                                                    </div>
                                                    <div class="tourmaster-enquiry-form-message"></div>
                                                    <input type="submit" class="tourmaster-button" value="Booking Now" />
                                                {{-- </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tourmaster-tour-booking-bar-widget  traveltour-sidebar-area">
                                    <div id="text-11" class="widget widget_text traveltour-widget">
                                        <div class="textwidget"><span class="gdlr-core-space-shortcode"
                                                style="margin-top: -20px ;"></span>
                                            <div class="gdlr-core-widget-list-shortcode" id="gdlr-core-widget-list-0">
                                                <h3 class="gdlr-core-widget-list-shortcode-title">Why Book With Us?</h3>
                                                <ul>
                                                    <li><i class="fa fa-dollar"
                                                            style="font-size: 15px ;color: #ffa127 ;margin-right: 13px ;"></i>No-hassle
                                                        best price guarantee</li>
                                                    <li><i class="fa fa-headphones"
                                                            style="font-size: 15px ;color: #ffa127 ;margin-right: 10px ;"></i>Customer
                                                        care available 24/7</li>
                                                    <li><i class="fa fa-star"
                                                            style="font-size: 15px ;color: #ffa127 ;margin-right: 10px ;"></i>Hand-picked
                                                        Tours & Activities</li>
                                                    <li><i class="fa fa-support"
                                                            style="font-size: 15px ;color: #ffa127 ;margin-right: 10px ;"></i>Free
                                                        Travel Insureance</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="text-12" class="widget widget_text traveltour-widget">
                                        <div class="textwidget"><span class="gdlr-core-space-shortcode"
                                                style="margin-top: -10px ;"></span>
                                            <div class="gdlr-core-widget-box-shortcode "
                                                style="color: #c9e2ff ;background-image: url(upload/widget-bg.jpg) ;">
                                                <h3 class="gdlr-core-widget-box-shortcode-title" style="color: #ffffff ;">Get
                                                    a Question?</h3>
                                                <div class="gdlr-core-widget-box-shortcode-content">
                                                    <p>Do not hesitage to give us a call. We are an expert team and we are happy
                                                        to talk to you.</p>
                                                    <p><i class="fa fa-phone"
                                                            style="font-size: 20px ;color: #ffcf2a ;margin-right: 10px ;"></i>
                                                        <span
                                                            style="font-size: 20px; color: #ffcf2a; font-weight: 600;">1.8445.3356.33</span>
                                                    </p>
                                                    <p><i class="fa fa-envelope-o"
                                                            style="font-size: 17px ;color: #ffcf2a ;margin-right: 10px ;"></i>
                                                        <span
                                                            style="font-size: 14px; color: #fff; font-weight: 600;">Help@goodlayers.com</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tourmaster-tour-info-outer">
                    <div class="tourmaster-tour-info-outer-container tourmaster-container">
                        <div class="tourmaster-tour-info-wrap clearfix">
                            <div class="tourmaster-tour-info tourmaster-tour-info-minimum-age tourmaster-item-pdlr"><i
                                    class="fa fa-user"></i>Min Age : 11+</div>
                            <div class="tourmaster-tour-info tourmaster-tour-info-maximum-people tourmaster-item-pdlr"><i
                                    class="fa fa-users"></i>Max People : {{ $trip_detail->jumlah_paket }}</div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-page-builder-body">
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full">
                                <div class="gdlr-core-pbf-element">
                                    <div class="tourmaster-content-navigation-item-wrap clearfix"
                                        style="padding-bottom: 0px;">
                                        <div class="tourmaster-content-navigation-item-outer"
                                            id="tourmaster-content-navigation-item-outer">
                                            <div class="tourmaster-content-navigation-item-container tourmaster-container">
                                                <div class="tourmaster-content-navigation-item tourmaster-item-pdlr"><a
                                                        class="tourmaster-content-navigation-tab tourmaster-active"
                                                        href="#detail">Detail</a><a
                                                        class="tourmaster-content-navigation-tab "
                                                        href="#itinerary">Itinerary</a><a
                                                        class="tourmaster-content-navigation-tab "
                                                        href="#map">Map</a><a
                                                        class="tourmaster-content-navigation-tab "
                                                        href="#photos">Photos</a><a
                                                        class="tourmaster-content-navigation-tab "
                                                        href="#tourmaster-single-review">Reviews</a>
                                                    <div class="tourmaster-content-navigation-slider"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 70px 0px 30px 0px;" data-skin="Blue Icon"
                        id="detail">
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr"
                                        style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                <span class="gdlr-core-title-item-left-icon" style="font-size: 18px ;"><i
                                                        class="fa fa-file-text-o"></i></span>Tour Details<span
                                                    class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div
                                        class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                        <div class="gdlr-core-text-box-item-content">
                                            <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Cras mattis
                                                consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus,
                                                nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec id elit
                                                non mi porta gravida at eget metus. Donec id elit non mi porta gravida at
                                                eget metus.</p>
                                            <p>Aenean lacinia bibendum nulla sed consectetur. Maecenas faucibus mollis
                                                interdum. Cras mattis consectetur purus sit amet fermentum. Curabitur
                                                blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Vivamus
                                                sagittis lacus vel augue laoreet rutrum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 19px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                            style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Departure & Return Location <span
                                                                class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-text-box-item-content">
                                                        <p>John F.K. International Airport (<a href="#">Google
                                                                Map</a>)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 19px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                            style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Departure Time<span
                                                                class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-text-box-item-content">
                                                        <p>3 Hours Before Flight Time</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 19px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                            style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Price Includes<span
                                                                class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
                                                    style="padding-bottom: 10px ;">
                                                    <ul>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Air fares</span>
                                                            </div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">3 Nights Hotel
                                                                    Accomodation</span></div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Tour Guide</span>
                                                            </div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Entrance
                                                                    Fees</span></div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">All transportation
                                                                    in destination location</span></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 19px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                            style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Price Excludes<span
                                                                class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
                                                    style="padding-bottom: 10px ;">
                                                    <ul>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-close"
                                                                    style="color: #7f7f7f ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Guide Service
                                                                    Fee</span></div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-close"
                                                                    style="color: #7f7f7f ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Driver Service
                                                                    Fee</span></div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-close"
                                                                    style="color: #7f7f7f ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Any Private
                                                                    Expenses</span></div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-close"
                                                                    style="color: #7f7f7f ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Room Service
                                                                    Fees</span></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 19px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
                                                    style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                            style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Complementaries<span
                                                                class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix "
                                                    style="padding-bottom: 10px ;">
                                                    <ul>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Umbrella</span>
                                                            </div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Sunscreen</span>
                                                            </div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">T-Shirt</span>
                                                            </div>
                                                        </li>
                                                        <li class=" gdlr-core-skin-divider"><span
                                                                class="gdlr-core-icon-list-icon-wrap"><i
                                                                    class="gdlr-core-icon-list-icon fa fa-check"
                                                                    style="color: #4692e7 ;"></i></span>
                                                            <div class="gdlr-core-icon-list-content-wrap"><span
                                                                    class="gdlr-core-icon-list-content">Entrance
                                                                    Fees</span></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 45px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div
                                        class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                style="font-size: 16px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                What to Expect<span
                                                    class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"
                                        style="padding-bottom: 10px ;">
                                        <div class="gdlr-core-text-box-item-content">
                                            <p>Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Etiam
                                                porta sem malesuada magna mollis euismod. Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.</p>
                                            <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo
                                                risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh
                                                ultricies vehicula ut id elit. Donec ullamcorper nulla non metus auctor
                                                fringilla.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix ">
                                        <ul>
                                            <li class=" gdlr-core-skin-divider"><span
                                                    class="gdlr-core-icon-list-icon-wrap"><i
                                                        class="gdlr-core-icon-list-icon fa fa-dot-circle-o"
                                                        style="color: #4692e7 ;"></i></span>
                                                <div class="gdlr-core-icon-list-content-wrap"><span
                                                        class="gdlr-core-icon-list-content">Ipsum Amet Mattis
                                                        Pellentesque</span></div>
                                            </li>
                                            <li class=" gdlr-core-skin-divider"><span
                                                    class="gdlr-core-icon-list-icon-wrap"><i
                                                        class="gdlr-core-icon-list-icon fa fa-dot-circle-o"
                                                        style="color: #4692e7 ;"></i></span>
                                                <div class="gdlr-core-icon-list-content-wrap"><span
                                                        class="gdlr-core-icon-list-content">Ultricies Vehicula Mollis
                                                        Vestibulum Fringilla</span></div>
                                            </li>
                                            <li class=" gdlr-core-skin-divider"><span
                                                    class="gdlr-core-icon-list-icon-wrap"><i
                                                        class="gdlr-core-icon-list-icon fa fa-dot-circle-o"
                                                        style="color: #4692e7 ;"></i></span>
                                                <div class="gdlr-core-icon-list-content-wrap"><span
                                                        class="gdlr-core-icon-list-content">Condimentum Sollicitudin Fusce
                                                        Vestibulum Ultricies</span></div>
                                            </li>
                                            <li class=" gdlr-core-skin-divider"><span
                                                    class="gdlr-core-icon-list-icon-wrap"><i
                                                        class="gdlr-core-icon-list-icon fa fa-dot-circle-o"
                                                        style="color: #4692e7 ;"></i></span>
                                                <div class="gdlr-core-icon-list-content-wrap"><span
                                                        class="gdlr-core-icon-list-content">Sollicitudin Consectetur Quam
                                                        Ligula Vehicula</span></div>
                                            </li>
                                            <li class=" gdlr-core-skin-divider"><span
                                                    class="gdlr-core-icon-list-icon-wrap"><i
                                                        class="gdlr-core-icon-list-icon fa fa-dot-circle-o"
                                                        style="color: #4692e7 ;"></i></span>
                                                <div class="gdlr-core-icon-list-content-wrap"><span
                                                        class="gdlr-core-icon-list-content">Cursus Pharetra Purus Porta
                                                        Parturient</span></div>
                                            </li>
                                            <li class=" gdlr-core-skin-divider"><span
                                                    class="gdlr-core-icon-list-icon-wrap"><i
                                                        class="gdlr-core-icon-list-icon fa fa-dot-circle-o"
                                                        style="color: #4692e7 ;"></i></span>
                                                <div class="gdlr-core-icon-list-content-wrap"><span
                                                        class="gdlr-core-icon-list-content">Risus Malesuada Tellus Porta
                                                        Commodo</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 15px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 20px 0px 30px 0px;" data-skin="Blue Icon"
                        id="itinerary">
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr"
                                        style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                <span class="gdlr-core-title-item-left-icon" style="font-size: 18px ;"><i
                                                        class="fa fa-bus"></i></span>Itinerary<span
                                                    class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-toggle-box-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-toggle-box-style-background-title gdlr-core-left-align"
                                        style="padding-bottom: 25px ;">
                                        <div class="gdlr-core-toggle-box-item-tab clearfix  gdlr-core-active">
                                            <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon ">
                                            </div>
                                            <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                <h4
                                                    class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">
                                                    <span class="gdlr-core-head">Day 1</span> Arrive in Zürich, Switzerland
                                                </h4>
                                                <div class="gdlr-core-toggle-box-item-content">
                                                    <p>We&#8217;ll meet at 4 p.m. at our hotel in Luzern (Lucerne) for a
                                                        &#8220;Welcome to Switzerland&#8221; meeting. Then we&#8217;ll take
                                                        a meandering evening walk through Switzerland&#8217;s most charming
                                                        lakeside town, and get acquainted with one another over dinner
                                                        together. Sleep in Luzern (2 nights). No bus. Walking: light.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-toggle-box-item-tab clearfix  gdlr-core-active">
                                            <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon ">
                                            </div>
                                            <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                <h4
                                                    class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">
                                                    <span class="gdlr-core-head">Day
                                                        2</span>Zürich–Biel/Bienne–Neuchâtel–Geneva
                                                </h4>
                                                <div class="gdlr-core-toggle-box-item-content">
                                                    <p>Enjoy an orientation walk of Zurich’s OLD TOWN, Switzerland’s center
                                                        of banking and commerce. Then, leave Zurich and start your Swiss
                                                        adventure. You’ll quickly discover that Switzerland isn’t just home
                                                        to the Alps, but also to some of the most beautiful lakes. First,
                                                        stop at the foot of the Jura Mountains in the picturesque town of
                                                        Biel, known as Bienne by French-speaking Swiss, famous for
                                                        watch-making, and explore the historical center. Next, enjoy a
                                                        scenic drive to lakeside Neuchâtel, dominated by the medieval
                                                        cathedral and castle. Time to stroll along the lake promenade before
                                                        continuing to stunning Geneva, the second-largest city in
                                                        Switzerland, with its fantastic lakeside location and breathtaking
                                                        panoramas of the Alps.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-toggle-box-item-tab clearfix  gdlr-core-active">
                                            <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon ">
                                            </div>
                                            <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                <h4
                                                    class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">
                                                    <span class="gdlr-core-head">Day 3</span>Enchanting Engelberg
                                                </h4>
                                                <div class="gdlr-core-toggle-box-item-content">
                                                    <p>Our morning drive takes us from Swiss lakes to Swiss Army. At the
                                                        once-secret Swiss army bunker at Fortress Fürigen, we&#8217;ll see
                                                        part of the massive defense system designed to keep Switzerland
                                                        strong and neutral. Afterward, a short drive into the countryside
                                                        brings us to the charming Alpine village of Engelberg, our
                                                        picturesque home for the next two days. We&#8217;ll settle into our
                                                        lodge then head out for an orientation walk. Our stroll through the
                                                        village will end at the Engelberg Abbey, a Benedictine monastery
                                                        with its own cheese-making operation. You&#8217;ll have free time to
                                                        wander back before dinner together. Sleep in Engelberg (2 nights).
                                                        Bus: 1 hr. Walking: light.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-toggle-box-item-tab clearfix  gdlr-core-active">
                                            <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon ">
                                            </div>
                                            <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                <h4
                                                    class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">
                                                    <span class="gdlr-core-head">Day 4</span>Interlaken Area. Excursion to
                                                    The Jungfrau Massif
                                                </h4>
                                                <div class="gdlr-core-toggle-box-item-content">
                                                    <p>An unforgettable trip to the high Alpine wonderland of ice and snow
                                                        is the true highlight of a visit to Switzerland. Globus Local
                                                        Favorite At an amazing 11,332 feet, the JUNGFRAUJOCH is Europe’s
                                                        highest railway station. Jungfrau’s 13,642-foot summit was first
                                                        ascended in 1811 and in 1912 the rack railway was opened. There are
                                                        lots of things to do here: enjoy the ALPINE SENSATION, THE PANORAMA
                                                        360° EXPERIENCE, and the ICE PALACE. Also receive your JUNGFRAU
                                                        PASSPORT as a souvenir to take home with you. The round trip to the
                                                        “Top of Europe” by MOUNTAIN TRAIN will take most of the day.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-toggle-box-item-tab clearfix  gdlr-core-active">
                                            <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon ">
                                            </div>
                                            <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                <h4
                                                    class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">
                                                    <span class="gdlr-core-head">Day 5</span>Lake Geneva and Château de
                                                    Chillon
                                                </h4>
                                                <div class="gdlr-core-toggle-box-item-content">
                                                    <p>It&#8217;s market day in Lausanne! Enjoy browsing and packing a
                                                        picnic lunch for our 11 a.m. boat cruise on Lake Geneva. A few miles
                                                        down-shore we&#8217;ll dock at Château de Chillon, where we&#8217;ll
                                                        have a guided tour of this delightfully medieval castle on the
                                                        water. On our way back we&#8217;ll take time to peek into the
                                                        vineyards surrounding Lutry before returning to Lausanne. Boat: 2
                                                        hrs. Bus: 1 hr. Walking: moderate.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 25px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"
                                            style="border-bottom-width: 2px ;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 30px 0px;" data-skin="Blue Icon"
                        id="map">
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr"
                                        style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                <span class="gdlr-core-title-item-left-icon" style="font-size: 18px ;"><i
                                                        class="fa fa-map-o"></i></span>Map<span
                                                    class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"
                                        style="padding-bottom: 55px ;">
                                        <div class="gdlr-core-text-box-item-content">
                                            <div class="">
                                                <iframe
                                                    src="https://www.google.com/maps/d/embed?mid=1mGgtylMQHGAKR6HR8r8YLe5W4LU"
                                                    width="100%" height="480"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-divider-item-normal gdlr-core-center-align"
                                        style="margin-bottom: 25px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"
                                            style="border-bottom-width: 2px ;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 30px 0px;" data-skin="Blue Icon"
                        id="photos">
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr"
                                        style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                <span class="gdlr-core-title-item-left-icon" style="font-size: 18px ;"><i
                                                        class="icon_images"></i></span>Photos<span
                                                    class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div
                                        class="gdlr-core-gallery-item gdlr-core-item-pdb clearfix  gdlr-core-gallery-item-style-slider gdlr-core-item-pdlr ">
                                        <div class="gdlr-core-flexslider flexslider gdlr-core-js-2 " data-type="slider"
                                            data-effect="default" data-nav="bullet">
                                            <ul class="slides">
                                                <li>
                                                    <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                        <a class="gdlr-core-ilightbox gdlr-core-js "
                                                            href="upload/pexels-photo-copy-2.jpg"
                                                            data-ilightbox-group="gdlr-core-img-group-1"><img
                                                                src="upload/pexels-photo-copy-2-1500x1000.jpg"
                                                                alt="" width="1500" height="1000" /><span
                                                                class="gdlr-core-image-overlay "><i
                                                                    class="gdlr-core-image-overlay-icon gdlr-core-size-22 fa fa-search"></i></span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                        <a class="gdlr-core-ilightbox gdlr-core-js "
                                                            href="upload/photo-1451337516015-6b6e9a44a8a3.jpg"
                                                            data-ilightbox-group="gdlr-core-img-group-1"><img
                                                                src="upload/photo-1451337516015-6b6e9a44a8a3-1500x1000.jpg"
                                                                alt="" width="1500" height="1000" /><span
                                                                class="gdlr-core-image-overlay "><i
                                                                    class="gdlr-core-image-overlay-icon gdlr-core-size-22 fa fa-search"></i></span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                        <a class="gdlr-core-ilightbox gdlr-core-js "
                                                            href="upload/italian-landscape-mountains-nature.jpg"
                                                            data-ilightbox-group="gdlr-core-img-group-1"><img
                                                                src="upload/italian-landscape-mountains-nature-1500x1000.jpg"
                                                                alt="" width="1500" height="1000" /><span
                                                                class="gdlr-core-image-overlay "><i
                                                                    class="gdlr-core-image-overlay-icon gdlr-core-size-22 fa fa-search"></i></span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                        <a class="gdlr-core-ilightbox gdlr-core-js "
                                                            href="upload/shutterstock_195507533.jpg" data-caption="Map"
                                                            data-ilightbox-group="gdlr-core-img-group-1"><img
                                                                src="upload/shutterstock_195507533-1500x1000.jpg"
                                                                alt="" width="1500" height="1000" /><span
                                                                class="gdlr-core-image-overlay "><i
                                                                    class="gdlr-core-image-overlay-icon gdlr-core-size-22 fa fa-search"></i></span></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="tourmaster-single-related-tour tourmaster-tour-item tourmaster-style-grid">
                    <div class="tourmaster-single-related-tour-container tourmaster-container">
                        <h3 class="tourmaster-single-related-tour-title tourmaster-item-pdlr">Related Tours</h3>
                        <div class="tourmaster-tour-item-holder clearfix ">
                            <div
                                class="gdlr-core-item-list  tourmaster-column-30 tourmaster-item-pdlr tourmaster-column-first">
                                <div class="tourmaster-tour-grid  tourmaster-price-right-title">
                                    <div class="tourmaster-tour-thumbnail tourmaster-media-image">
                                        <a href="../switzerland-7-days-in-zurich-zermatt/index.html"><img
                                                src="upload/shutterstock_178807262-1024x683.jpg" alt=""
                                                width="1024" height="683" /></a>
                                        <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element"
                                            style="color: #ffffff;background-color: #e85e34;">
                                            <div class="tourmaster-thumbnail-ribbon-cornor"
                                                style="border-right-color: rgba(232, 94, 52, 0.5);"></div>20% Off
                                        </div>
                                    </div>
                                    <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background">
                                        <h3 class="tourmaster-tour-title gdlr-core-skin-title"><a
                                                href="../switzerland-7-days-in-zurich-zermatt/index.html">Switzerland
                                                &#8211; 7 Days in Zurich, Zermatt</a></h3>
                                        <div class="tourmaster-tour-price-wrap tourmaster-discount"><span
                                                class="tourmaster-tour-price"><span
                                                    class="tourmaster-head">From</span><span
                                                    class="tourmaster-tail">$4,300</span></span><span
                                                class="tourmaster-tour-discount-price">$3,500</span></div>
                                        <div class="tourmaster-tour-rating"><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><span
                                                class="tourmaster-tour-rating-text">(2 Reviews)</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-item-list  tourmaster-column-30 tourmaster-item-pdlr">
                                <div class="tourmaster-tour-grid  tourmaster-price-right-title">
                                    <div class="tourmaster-tour-thumbnail tourmaster-media-image">
                                        <a href="../italy-6-days-in-rome-venice-milan/index.html"><img
                                                src="upload/shutterstock_245507692-1024x683.jpg" alt=""
                                                width="1024" height="683" /></a>
                                        <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element"
                                            style="color: #ffffff;background-color: #e85e34;">
                                            <div class="tourmaster-thumbnail-ribbon-cornor"
                                                style="border-right-color: rgba(232, 94, 52, 0.5);"></div>25% Off
                                        </div>
                                    </div>
                                    <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background">
                                        <h3 class="tourmaster-tour-title gdlr-core-skin-title"><a
                                                href="../italy-6-days-in-rome-venice-milan/index.html">Enquiry Form Only
                                                &#8211; Italy &#8211; 6 Days</a></h3>
                                        <div class="tourmaster-tour-price-wrap tourmaster-discount"><span
                                                class="tourmaster-tour-price"><span
                                                    class="tourmaster-head">From</span><span
                                                    class="tourmaster-tail">$3,700</span></span><span
                                                class="tourmaster-tour-discount-price">$2,000</span></div>
                                        <div class="tourmaster-tour-rating"><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star-half-o"></i><span
                                                class="tourmaster-tour-rating-text">(1 Review)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="tourmaster-single-review-container tourmaster-container">
                    <div class="tourmaster-single-review-item tourmaster-item-pdlr">
                        <div class="tourmaster-single-review" id="tourmaster-single-review">
                            <div class="tourmaster-single-review-head clearfix">
                                <div class="tourmaster-single-review-head-info clearfix">
                                    <div class="tourmaster-tour-rating"><span class="tourmaster-tour-rating-text">1
                                            Review</span><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="tourmaster-single-review-filter" id="tourmaster-single-review-filter">
                                        <div class="tourmaster-single-review-sort-by"><span class="tourmaster-head">Sort
                                                By:</span><span class="tourmaster-sort-by-field"
                                                data-sort-by="rating">Rating</span><span
                                                class="tourmaster-sort-by-field tourmaster-active"
                                                data-sort-by="date">Date</span></div>
                                        <div
                                            class="tourmaster-single-review-filter-by tourmaster-form-field tourmaster-with-border">
                                            <div class="tourmaster-combobox-wrap">
                                                <select id="tourmaster-filter-by">
                                                    <option value="">Filter By</option>
                                                    <option value="solo">Solo</option>
                                                    <option value="couple">Couple</option>
                                                    <option value="family">Family</option>
                                                    <option value="group">Group</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tourmaster-single-review-content" id="tourmaster-single-review-content"
                                data-tour-id="4643" data-ajax-url="../../wp-admin/admin-ajax.html">
                                <div class="tourmaster-single-review-content-item clearfix">
                                    <div class="tourmaster-single-review-user clearfix">
                                        <div class="tourmaster-single-review-avatar tourmaster-media-image"><img
                                                alt=''
                                                src='https://secure.gravatar.com/avatar/3fd67cef7cae9956b8831c16a70dba11?s=85&amp;d=mm&amp;r=g'
                                                srcset="https://secure.gravatar.com/avatar/3fd67cef7cae9956b8831c16a70dba11?s=170&#038;d=mm&#038;r=g 2x"
                                                class='avatar avatar-85 photo' height='85' width='85' /></div>
                                        <h4 class="tourmaster-single-review-user-name">Jenifer Janeth</h4>
                                        <div class="tourmaster-single-review-user-type">Couple Traveller</div>
                                    </div>
                                    <div class="tourmaster-single-review-detail">
                                        <div class="tourmaster-single-review-detail-description">
                                            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                                                Maecenas faucibus mollis interdum.</p>
                                        </div>
                                        <div class="tourmaster-single-review-detail-rating"><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                                        <div class="tourmaster-single-review-detail-date">January 24, 2017</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.jumlah').change(function() {
            if ($('.jumlah').val() > $('#detail_maksimal').val()) {
                alert('Jumlah anggota maksimal ' + $('#detail_maksimal').val() + ' orang');
                $('.jumlah').val('');
            } else {
                if ({{ $trip_detail->kategori_paket_id }} == 2) {
                    var price = {{ $trip_detail->price - ($trip_detail->diskon / 100) * $trip_detail->price }};
                    if ($('.jumlah').val() == 0) {
                        var penjumlahan = 1 * price;
                        var jumlah = 1;
                    } else {
                        var penjumlahan = $('.jumlah').val() * price;
                        var jumlah = $('.jumlah').val();
                    }

                    var bilangan = penjumlahan;

                    var number_string = bilangan.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    document.getElementById('jumlah_order').innerHTML = ' - ' + jumlah + 'x';
                    // document.getElementById('subTotal').innerHTML = 'Rp. '+rupiah;
                    document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
                    // $('#order_total').val(penjumlahan);
                } else if ({{ $trip_detail->kategori_paket_id }} == 1) {
                    var price = {{ $trip_detail->price - ($trip_detail->diskon / 100) * $trip_detail->price }};

                    var bilangan = price;

                    var number_string = bilangan.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    document.getElementById('jumlah_order').innerHTML = ' - ' + $('.jumlah').val() + ' pax';
                    document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                    document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
                    $('#order_total').val(price);
                }
            }

        })
        $(document).ready(function() {
            var i = 1;

            $('.full_name').change(function() {
                document.getElementById('full_name').innerHTML = $('.full_name').val();
            })
            $('.alamat').change(function() {
                document.getElementById('alamat').innerHTML = $('.alamat').val();
            })
            $('.tanggal_berangkat').change(function() {
                document.getElementById('tanggal_berangkat').innerHTML = $('.tanggal_berangkat').val();
            })

            $('.jumlah').change(function() {
                for (let index = 1; index < $('.jumlah').val(); index++) {
                    $('#dynamic_field').append('<tr id="row' + index +
                        '" class="dynamic-added"><td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota ' +
                        // (index + parseInt(1)) +
                        index +
                        '" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' +
                        index + '" class="cws-button full-width alt btn_remove">X</button></td></tr>');
                }
            })

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                i--;
            });
        })
    </script>
@endsection
