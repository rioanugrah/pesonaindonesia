@extends('layouts.frontend_4.app')

@section('title')
    Kontak Kami
@endsection
<?php $asset = asset('frontend/assets4/'); ?>
@section('css')
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection

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
                    <h4 class="title-section mt-30"><span class="font-bold">Kontak Kami</span></h4>
                    <div class="cws_divider mb-25 mt-5"></div>
                    <ul class="icon">
                        <li> <a href="mailto:business@plesiranindonesia.com">business@plesiranindonesia.com<i class="flaticon-suntour-email"></i></a></li>
                        <li> <a href="#">Whatsapp: 0813-3112-6991<i class="flaticon-suntour-phone"></i></a></li>
                        <li> <a href="#">Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota Malang, Jawa Timur<i class="flaticon-suntour-map"></i></a></li>
                    </ul>
                    <div class="contact-cws-social"><a href="#" class="cws-social fa fa-twitter"></a><a href="#"
                            class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a><a
                            href="#" class="cws-social fa fa-linkedin"></a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-wrapper">
                    <iframe
                        src="https://maps.google.com/maps?q=Jl.%20Raya%20Tlogowaru%20No.%203&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        allowfullscreen="" loading="lazy"></iframe>
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
                <form id="upload-form" method="post" class="form contact-form alt clearfix">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 clearfix">
                            <div class="input-container">
                                <input type="text" name="name" value="" size="40" placeholder="Name" aria-invalid="false"
                                    aria-required="true" class="form-row form-row-first">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-container">
                                <input type="email" name="email" value="" size="40" placeholder="Email" aria-required="true"
                                    class="form-row form-row-last">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-container">
                                <input type="text" name="subject" value="" size="40" placeholder="Subject" aria-required="true"
                                    class="form-row form-row-last">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <textarea name="message" cols="40" rows="4" placeholder="Comment" aria-invalid="false"
                            aria-required="true"></textarea>
                    </div>
                    <input type="submit" value="Submit Message" class="cws-button alt">
                </form>
                <!-- /contact-form-->
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#upload-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('#image-input-error').text('');
        $.ajax({
            type:'POST',
            url: "{{ route('kontak.simpan') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (result) => {
                if(result.success != false){
                    iziToast.success({
                        position: 'center',
                        title: result.message_title,
                        message: result.message_content
                    });
                    this.reset();
                }else{
                    iziToast.error({
                        title: result.success,
                        message: result.error,
                        position: 'bottomCenter',
                    });
                }
            },
            error: function (request, status, error) {
                iziToast.error({
                    title: 'Error',
                    message: error,
                });
            }
        });
    });
</script>
@endsection