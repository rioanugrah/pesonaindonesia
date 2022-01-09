@extends('layouts.frontend_4.app')

@section('title')
    Kontak Kami
@endsection
<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/teams.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('frontend') }}">home</a><i>/</i><a
                    href="{{ route('kontak') }}" class="last"><span>Kontak</span> Kami</a>
                <h2><span>Kontak</span> Kami</h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-item">
                    <h4 class="title-section mt-30"><span class="font-bold">Contacts</span></h4>
                    <div class="cws_divider mb-25 mt-5"></div>
                    <ul class="icon">
                        <li> <a href="#">support.suntour@example.com<i class="flaticon-suntour-email"></i></a></li>
                        <li> <a href="#">(723)-700-1183<i class="flaticon-suntour-phone"></i></a></li>
                        <li> <a href="#">3710 Ridge Avenue, Erie, PA 16506<i class="flaticon-suntour-map"></i></a></li>
                    </ul>
                    <p class="mt-20">Guests can enjoy a range of massage treatments and beauty therapy at the
                        on-site spa, U Spa. It offers child-minding services, a currency exchange and a reception that is
                        available 24/7. It also has superb facilities for meetings and events. </p>
                    <div class="contact-cws-social"><a href="#" class="cws-social fa fa-twitter"></a><a href="#"
                            class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a><a
                            href="#" class="cws-social fa fa-linkedin"></a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25295.930156304785!2d16.371063311644324!3d48.208404844730474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d07986fcad78b%3A0x73f5a4d267cc4174!2zTmFnbGVyZ2Fzc2UgMTAsIDEwMTAgV2llbiwg0JDQstGB0YLRgNC40Y8!5e0!3m2!1sru!2sua!4v1453294615596"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="element-section pattern bg-gray-3 relative pt-60 pb-100">
        <div class="container">
            <h4 class="title-section mb-20"><span class="font-bold">Contact us</span></h4>
            <div class="widget-contact-form pb-0">
                <!-- contact-form-->
                <div class="email_server_responce"></div>
                <form action="php/contacts-process.php" method="post" class="form contact-form alt clearfix">
                    <div class="row">
                        <div class="col-md-6 clearfix">
                            <div class="input-container">
                                <input type="text" name="name" value="" size="40" placeholder="Name" aria-invalid="false"
                                    aria-required="true" class="form-row form-row-first">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-container">
                                <input type="text" name="email" value="" size="40" placeholder="Email" aria-required="true"
                                    class="form-row form-row-last">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <textarea name="message" cols="40" rows="4" placeholder="Comment" aria-invalid="false"
                            aria-required="true"></textarea>
                    </div>
                    <input type="submit" value="Submit now" class="cws-button alt">
                </form>
                <!-- /contact-form-->
            </div>
        </div>
    </div>
@endsection
