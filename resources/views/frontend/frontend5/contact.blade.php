@extends('layouts.frontend_5.app')
@section('title')
    Kontak Kami
@endsection
@section('css')
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection
@section('canonical')
    {{ route('kontak') }}
@endsection
<?php $assets = asset('frontend/assets5/'); ?>
@section('description')
    Hubungi Kontak Kami
@endsection

@section('content')
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $assets }}/images/bg/bg_video.webp);">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $assets }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Kontak Kami</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <section class="contact-main pt-6 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <h3 class="mb-1">Informasi Tentang Kami</h3>
                            </div>
                            <div class="contact-info-content row mb-1">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-map-marker-alt theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Lokasi Kantor</h3>
                                            <p class="m-0">Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota
                                                Malang, Jawa Timur</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-phone theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Nomor Telepon</h3>
                                            <p class="m-0">0813-3112-6991</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Alamat Email</h3>
                                            <p class="m-0">business@plesiranindonesia.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-form1" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="map rounded overflow-hiddenb rounded mb-md-4">
                                            <div style="width: 100%">
                                                <iframe height="500"
                                                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(Jl.%20Raya%20Tlogowaru%20No.%203)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div id="contactform-error-msg"></div>

                                        <form method="post" id="upload-form">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <input type="text" name="name" class="form-control" id="fullname"
                                                    placeholder="Nama">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Email">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="text" name="subject" class="form-control" id="phnumber"
                                                    placeholder="Subject">
                                            </div>
                                            <div class="textarea mb-2">
                                                <textarea name="message" placeholder="Enter a message"></textarea>
                                            </div>
                                            <div class="comment-btn text-center">
                                                <button type="submit" class="nir-btn">Kirim</button>
                                                {{-- <input type="submit" class="nir-btn" id="submit2" value="Kirim"> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                type: 'POST',
                url: "{{ route('kontak.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success != false) {
                        iziToast.success({
                            position: 'center',
                            title: result.message_title,
                            message: result.message_content
                        });
                        this.reset();
                    } else {
                        iziToast.error({
                            title: result.success,
                            message: result.error,
                            position: 'bottomCenter',
                        });
                    }
                },
                error: function(request, status, error) {
                    iziToast.error({
                        title: 'Error',
                        message: error,
                    });
                }
            });
        });
    </script>
@endsection
