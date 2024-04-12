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
                                </div>
                            </div>
                            <div class="travellers-info mb-4">
                                <h4>Informasi Wisatawan</h4>
                                <table>
                                    <tr>
                                        <td>Nomor Pesanan</td>
                                        <td>{{ $detail_payment->data->merchant_ref }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Custome</td>
                                        <td>{{ $detail_payment->data->customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $detail_payment->data->customer_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>{{ 'Rp. ' . number_format($detail_payment->data->amount, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @switch($detail_payment->data->status)
                                                @case('UNPAID')
                                                    <span style="color: orange; font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                    @break
                                                @case('PAID')
                                                    <span style="color: green; font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                    @break
                                                @case('FAILED')
                                                    <span style="color: red; font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                    @break
                                                @default

                                            @endswitch
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="travellers-info mb-4">
                                <h4>Detail Pesanan</h4>
                                <table>
                                    <tr>
                                        <td>Item</td>
                                        <td>{{ $transaction->transaction_unit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td>{{ $transaction->transaction_qty }}</td>
                                    </tr>
                                </table>
                                <a href="{{ $detail_payment->data->checkout_url }}" class="nir-btn float-lg-end w-25">PAY NOW</a>
                            </div>
                            <div class="travellers-info mb-4">
                                <h4>Cara Pembayaran</h4>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    @foreach ($detail_payment->data->instructions as $key_instruction => $instruction)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key_instruction }}"
                                                aria-expanded="false" aria-controls="flush-collapse{{ $key_instruction }}">
                                                {{ $instruction->title }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $key_instruction }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <ol>
                                                    @foreach ($instruction->steps as $step)
                                                    <li>{!! $step !!}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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
    {{-- <section class="trending pt-6 pb-0 bg-lgrey">
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
                                </div>
                            </div>
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
                                </table>
                            </div>
                            <div class="travellers-info mb-4">
                                <h4>Cara Pembayaran</h4>
                                <table>
                                    <tr>
                                        <td>Nomor Pesanan</td>
                                        <td></td>
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
    </section> --}}
@endsection
@section('js')
    <script>
        function payment() {
            $('#payment').modal('show');
        }
    </script>
@endsection
