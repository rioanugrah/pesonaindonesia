@extends('layouts.frontend_4.app')

@section('title')
    Events {{ $event->title }}
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#"
                    class="last"><span>Event</span></a>
                <h2><span>{{ $event->title }}</span></h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <?php $asset = asset('frontend/assets4/'); ?>
    <div class="container page">
        <div class="row">
            <div class="col-md-8 mb-pd-140">
                <div class="blog-item alt pb-20">
                    <div class="pic">
                        <a href="{{ asset('frontend/assets4/img/events/' . $event->image) }}" target="_blank">
                            <img src="{{ asset('frontend/assets4/img/events/' . $event->image) }}"
                                style="width: 770px; height: 370px; object-fit: cover;"
                                data-at2x="{{ asset('frontend/assets4/img/events/' . $event->image) }}" alt>
                        </a>
                    </div>
                    <div class="blog-item-data clearfix">
                        <h3 class="blog-title">{{ $event->title }}</h3>
                        <p class="post-info">Tanggal dibuat :
                            {{ \Carbon\Carbon::parse($event->created_at)->isoFormat('LLLL') }}</p>
                        <p class="mb-25">{{ $event->deskripsi }}</p>
                        <p class="mb-25">
                        <div>Acara Dimulai : {{ \Carbon\Carbon::parse($event->start_event)->isoFormat('LLLL') }} -
                            @if ($event->finish_event == null)
                                Selesai
                            @else
                                {{ \Carbon\Carbon::parse($event->start_event)->isoFormat('LLLL') }}
                            @endif
                        </div>
                        <div>Pendaftaran Terakhir : {{ $pendaftaran_terakhir }}</div>
                        </p>
                        <div class="quote alt-2 clearfix mb-30 mt-20">
                            <p>Lokasi : {{ $event->location }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <aside class="sb-right pb-50-imp">
                    <div class="cws-widget">
                        <div class="widget-search">
                            <div class="widget-title">Formulir Pendaftaran</div>
                            <form role="search" method="post" id="kirim" class="search-form">
                                @csrf
                                <input type="hidden" name="slug" value="{{ $event->slug }}">
                                <input type="text" placeholder="Email" value="" name="email" title="Email:"
                                    class="form-control mb-10" style="padding-left: 5%">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Nama Depan" value="" name="first_name"
                                            title="Nama Depan:" class="form-control mb-10" style="padding-left: 5%">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Nama Belakang" value="" name="last_name"
                                            title="Nama Belakang:" class="form-control mb-10" style="padding-left: 5%">
                                    </div>
                                </div>
                                <select name="kategori_asal" class="form-control mb-10" id="">
                                    <option>-- Berasal Dari --</option>
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="Universitas">Universitas</option>
                                    <option value="Politeknik">Politeknik</option>
                                    <option value="Instansi">Instansi</option>
                                </select>
                                <input type="text" placeholder="Nama Instansi / SMA/SMK / Kampus" value="" name="asal"
                                    class="form-control mb-10" style="padding-left: 5%">
                                <input type="text" placeholder="No. Telp / WA" value="" name="no_telp"
                                    class="form-control mb-10" style="padding-left: 5%">
                                <textarea name="alamat" placeholder="Alamat" class="form-control mb-10" id="" cols="30"
                                    rows="5"></textarea>
                                {{-- <input type="text" placeholder="Email" value="" name="email"
                                    title="Email:" class="form-control mb-10" style="padding-left: 5%"> --}}
                                <button type="submit" class="btn btn-warning">Submit</button>
                                {{-- <button type="submit" class="search-submit"><i
                                        class="flaticon-suntour-search"></i></button> --}}
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets2/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/js/pages/sweet-alerts.init.js') }}"></script>
    <script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>

    <script>
        $('#kirim').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.eventRegister') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success != false) {
                        Swal.fire({
                            title: result.title,
                            text: result.text,
                            icon: result.icon,
                        })
                        this.reset();
                        table.ajax.reload();
                    }else {
                        iziToast.error({
                            title: result.title,
                            message: result.text
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
