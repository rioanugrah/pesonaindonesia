@extends('layouts.frontend_5.app')
@section('title')
    Tour Wisata
@endsection
@section('canonical')
    {{ route('frontend.tour') }}
@endsection
<?php $assets = asset('frontend/assets5/'); ?>
@section('content')
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $assets }}/images/bg/bg_video.webp);">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $assets }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">@yield('title')</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <section class="blog">
        <div class="container">
            <div class="listing-inner px-5">
                @foreach ($paket_wisatas as $paket_wisata)
                    @php
                        $explode_durasi_wisata = explode('|', $paket_wisata->durasi_wisata);

                        if (\Carbon\Carbon::today() <= $paket_wisata->waktu_keberangkatan) {
                            $status = 'Belum Berangkat';
                            $color = 'primary';
                        } else {
                            $status = 'Sudah Berangkat';
                            $color = 'success';
                        }
                    @endphp
                    <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="theme mb-1">{{ $paket_wisata->nama_keberangkatan }}</h3>
                                <span class="badge bg-{{ $color }}">{{ $status }}</span>
                                <h5 class="mb-2">Tujuan Wisata : {{ $paket_wisata->tujuan_wisata }}</h5>
                                <div class="mb-2">
                                    <div class="theme">Durasi Wisata :</div>
                                    {{ $explode_durasi_wisata[0] . ' Hari ' . $explode_durasi_wisata[1] . ' Malam' }}
                                </div>
                                <div class="mb-2">
                                    <div class="theme">Waktu Keberangkatan :</div>
                                    {{ \Carbon\Carbon::create($paket_wisata->waktu_keberangkatan)->isoFormat('LLLL') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="theme">Destinasi Wisata : </p>
                                <ol>
                                    @foreach (json_decode($paket_wisata->objek_wisata) as $objek_wisata)
                                        <li>{{ $objek_wisata->destination }}</li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="col-md-4">
                                <p class="theme">Kuota Tersedia</p>
                                <div>{{ $paket_wisata->kuota_peserta }}</div>
                                <p class="theme">Kuota Tersisa</p>
                                <div>{{ $paket_wisata->kuota_peserta - $paket_wisata->detail_wisata_peserta->count() }}
                                </div>
                                <button class="nir-btn" style="text-transform: uppercase">Booking Now</button>

                            </div>
                        </div>
                        <hr>
                        <div class="theme mb-2">Akomodasi : </div>
                        @if (!$paket_wisata->detail_wisata_hotel->isEmpty())
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Hotel</th>
                                            <th class="text-center">Lokasi</th>
                                            <th class="text-center">Jumlah Malam</th>
                                            <th class="text-center">Check In</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paket_wisata->detail_wisata_hotel as $hotel)
                                            <tr>
                                                <td class="text-center">{{ $hotel->nama_hotel }}</td>
                                                <td class="text-center">{{ $hotel->lokasi }}</td>
                                                <td class="text-center">{{ $hotel->jumlah_malam }}</td>
                                                <td class="text-center">{{ $hotel->check_in }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        @if (!$paket_wisata->detail_wisata_maskapai->isEmpty())
                            <div class="mb-2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Maskapai</th>
                                            <th class="text-center">No. Penerbangan</th>
                                            <th class="text-center">Arah</th>
                                            <th class="text-center">Waktu Keberangkatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paket_wisata->detail_wisata_maskapai as $maskapai)
                                            <tr>
                                                <td class="text-center">{{ $maskapai->nama_maskapai }}</td>
                                                <td class="text-center">{{ $maskapai->no_penerbangan }}</td>
                                                <td class="text-center">{{ $maskapai->arah }}</td>
                                                <td class="text-center">{{ $maskapai->jam_berangkat }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        {{-- <div>Hotel : {{ $hotel->nama_hotel }}</div>
                    <div>Lokasi : {{ $hotel->lokasi }}</div> --}}
                    </div>
                @endforeach
            </div>
            <h4>Perlu Bantuan Pemesanan?</h4>
            <div class="sidebar-module-inner">
                <ul class="help-list">
                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Whatsapp</span>:
                        0813-3112-6991</li>
                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Email</span>:
                        marketing@plesiranindonesia.com</li>
                </ul>
            </div>
            <h4>Mengapa Memesan Dengan Kami?</h4>
            <div class="sidebar-module-inner">
                <ul class="featured-list-sm">
                    <li class="border-b pb-2 mb-2">
                        <h6 class="mb-0">Tanpa Biaya Pemesanan</h6>
                        Kami tidak membebankan biaya tambahan untuk pemesanan
                    </li>
                    <li class="border-b pb-2 mb-2">
                        <h6 class="mb-0">Tidak Terlihat Pembatalan</h6>
                        Kami tidak membebankan biaya pembatalan atau modifikasi jika rencana berubah
                    </li>
                    <li class="border-b pb-2 mb-2">
                        <h6 class="mb-0">Konfirmasi Instant</h6>
                        Konfirmasi pemesanan instan apakah pemesanan online atau melalui whatsapp
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
