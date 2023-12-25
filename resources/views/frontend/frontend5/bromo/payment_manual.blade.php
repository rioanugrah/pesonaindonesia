@extends('layouts.frontend_5.app')
@section('title')
    Payment - Checkout
@endsection
<?php $asset = asset('frontend/assets5/'); ?>
@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $asset }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0"
        style="background-image: url({{ $asset }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Payment - Checkout</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Konfirmasi</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 mb-4">
                <div class="payment-book">
                    <div class="booking-box">
                        <div
                            class="booking-box-title d-md-flex align-items-center bg-title p-4 mb-4 rounded text-md-start text-center">
                            <i class="fa fa-check px-4 py-3 bg-white rounded title fs-5"></i>
                            <div class="title-content ms-md-3">
                                <h3 class="mb-1 white">Terima kasih. Pesanan Anda Dikonfirmasi Sekarang.</h3>
                                {{-- <p class="mb-0 white">Email konfirmasi telah dikirim ke alamat email yang Anda berikan.</p> --}}
                            </div>
                        </div>
                        {{-- <div class="travellers-info mb-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Jumlah Order</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="theme2">{{ $qty }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                        <div class="travellers-info mb-4">
                            <h4>Informasi Wisatawan</h4>
                            <table>
                                <tr>
                                    <td>Nomor Pesanan</td>
                                    <td>{{ $kode_order }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Depan</td>
                                    <td>{{ $first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Belakang</td>
                                    <td>{{ $last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Email</td>
                                    <td>{{ $email }}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>{{ 'Rp. ' . number_format($price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Bukti Pembayaran</td>
                                    <td><input type="file" name="" class="form-control" id=""></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12 mb-4 ps-4">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item bordernone bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Perlu Bantuan Pemesanan?</h4>
                            <div class="sidebar-module-inner">
                                <ul class="help-list">
                                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Whatsapp</span>:
                                        0813-3112-6991</li>
                                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Email</span>:
                                        marketing@plesiranindonesia.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection