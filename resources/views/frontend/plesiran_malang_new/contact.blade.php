@extends('layouts.f_plesiranmalang.app')
<?php $assets = asset('plesiran_malang/'); ?>
@section('title')
    Contact
@endsection
@section('description')
@endsection
@section('keywords')
    tour, plesiran malang, trip, travel, biro perjalanan, vacation, wisata malang, pesona, plesiran
@endsection
@section('canonical')
    {{ url('contact') }}
@endsection

@section('content')
    <section class="rlr-section">
        <div class="rlr-cta rlr-cta--no-button">
            <h2>Contact us</h2>
        </div>
    </section>
    <section class="rlr-section rlr-section__mt">
        <div class="container">
            <div class="row justify-content-around">
                <!-- Contact form -->
                <div class="col-xl-offset-1 col-xxl-5 col-lg-5">
                    <div class="rlr-contact-form">
                        <div class="rlr-contact-form__header">
                            <div class="rlr-page-title">
                                <span class="rlr-page-title__icon"> <i
                                        class="rlr-icon-font flaticon-fluent-hand-left-20-regular"> </i> </span>
                                <div>
                                    <h2 class="type-h4 rlr-page-title__title">Hai, kami dengan senang hati membantu Anda!</h2>
                                </div>
                            </div>
                        </div>
                        <div class="rlr-contact-form__body">
                            <form action="/">
                                <div class="rlr-contact-form__input-group"><label
                                        class="type-body-medium rlr-contact-form__label">First Name</label> <input
                                        type="text" autocomplete="off" class="form-control" placeholder="First Name"></div>
                                <div class="rlr-contact-form__input-group"><label
                                        class="type-body-medium rlr-contact-form__label">Last Name</label> <input
                                        type="text" autocomplete="off" class="form-control" placeholder="Last Name"></div>
                                <div class="rlr-contact-form__input-group"><label
                                        class="type-body-medium rlr-contact-form__label">Phone</label> <input type="tel"
                                        autocomplete="off" class="form-control" placeholder="XXXXXXXXXX" /></div>
                                <div class="rlr-contact-form__input-group"><label
                                        class="type-body-medium rlr-contact-form__label">Message</label>
                                    <textarea class="form-control form-control--text-area" placeholder="Please Message"
                                        rows="12"></textarea>
                                </div>
                                <div class="rlr-contact-form__input-group"><label
                                        class="type-body-medium rlr-contact-form__label">Email</label> <input type="email"
                                        autocomplete="off" class="form-control" placeholder="Email"></div>
                                <button type="submit"
                                    class="btn rlr-button btn rlr-button custom-class rlr-button--medium rlr-button--rounded rlr-button__color--white rlr-button--brand rlr-button-- rlr-button-- rlr-button__color-- rlr-button-- rlr-button--">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Contact Details -->
                <div class="col-xl-offset-1 col-xxxl-offset-1 col-xxl-4 col-lg-5 mt-5 mt-lg-0">
                    <div class="rlr-contact-details">
                        <div class="rlr-contact-details__details">
                            <div class="rlr-contact-detail-item">
                                <span class="rlr-contact-detail-item__icon"> <i
                                        class="rlr-icon-font flaticon-phone-receiver-silhouette"> </i> </span>
                                <div>
                                    <p class="rlr-contact-detail-item__title">Phone</p>
                                    <h6 class="rlr-contact-detail-item__desc">0813-3112-6991</h6>
                                </div>
                            </div>
                            <div class="rlr-contact-detail-item">
                                <span class="rlr-contact-detail-item__icon"> <i class="rlr-icon-font flaticon-email"> </i>
                                </span>
                                <div>
                                    <p class="rlr-contact-detail-item__title">Email</p>
                                    <h6 class="rlr-contact-detail-item__desc">support@plesiranindonesia.com</h6>
                                </div>
                            </div>
                            <div class="rlr-contact-detail-item">
                                <span class="rlr-contact-detail-item__icon"> <i class="rlr-icon-font flaticon-map-marker">
                                    </i> </span>
                                <div>
                                    <p class="rlr-contact-detail-item__title">Address</p>
                                    <h6 class="rlr-contact-detail-item__desc">Jl. Raya Tlogowaru No.3, Tlogowaru, Kec. Kedungkandang, Malang, Jawa Timur</h6>
                                </div>
                            </div>
                        </div>
                        <div class="rlr-contact-details__map">
                            <iframe
                                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(Jl.%20Raya%20Tlogowaru%20No.%203)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
