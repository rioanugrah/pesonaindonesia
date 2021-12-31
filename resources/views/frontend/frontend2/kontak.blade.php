@extends('layouts.frontend_3.app')

@section('title')
    Kontak Kami
@endsection

@section('css')
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
    
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url({{ asset('frontend/assets3/images/wallpaper/team_business.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">@yield('title')</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="contact-page-section">
        <div class="contact-form-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-from-wrap">
                            <div class="section-heading">
                                <h5 class="dash-style">GET IN TOUCH</h5>
                                <h2>HUBUNGI KAMI UNTUK MENDAPATKAN INFO LEBIH LANJUT</h2>
                            </div>
                            <form id="upload-form" class="contact-from" enctype="multipart/form-data">
                            @csrf
                                <p>
                                    <input type="text" name="name" placeholder="Your Name*">
                                </p>
                                <p>
                                    <input type="email" name="email" placeholder="Your Email*">
                                </p>
                                <p>
                                    <input type="text" name="subject" placeholder="Subject*">
                                </p>
                                <p>
                                    <textarea rows="8" name="message" placeholder="Your Message*"></textarea>
                                </p>
                                <p>
                                    <input type="submit" name="submit" value="SUBMIT MESSAGE">
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-detail-wrap">
                            <h3>Need help ?? Feel free to contact us !</h3>
                            <div class="details-list">
                                <ul>
                                    <li>
                                        <span class="icon">
                                            <i class="fas fa-map-signs"></i>
                                        </span>
                                        <div class="details-content">
                                            <h4>Location Address</h4>
                                            <span>Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota Malang, Jawa Timur</span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </span>
                                        <div class="details-content">
                                            <h4>Email Address</h4>
                                            <span><a href="mailto:business@plesiranindonesia.com">business@plesiranindonesia.com</a></span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <i class="fas fa-phone-volume"></i>
                                        </span>
                                        <div class="details-content">
                                            <h4>Phone Number</h4>
                                            <span>Telephone: -</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="contct-social social-links">
                                <h3>Follow us on social media..</h3>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-section">
            <iframe
                src="https://maps.google.com/maps?q=Jl.%20Raya%20Tlogowaru%20No.%203&t=&z=13&ie=UTF8&iwloc=&output=embed"
                height="400" allowfullscreen="" loading="lazy"></iframe>
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