@extends('layouts.frontend_5.app')
@section('title')
    Invoice {{ $transaction->transaction_code }}
@endsection
<?php $asset = asset('frontend/assets5/'); ?>
@section('content')
    <section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $asset }}/images/bg/bg_video.webp);">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $asset }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Invoice</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
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
                                <h4>Detail Pesanan</h4>
                                <table>
                                    <tr>
                                        <td>Transaction Date</td>
                                        <td>:</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Code</td>
                                        <td>:</td>
                                        <td>#{{ $transaction->transaction_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>No.Reference</td>
                                        <td>:</td>
                                        <td>{{ $transaction->transaction_reference }}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Name</td>
                                        <td>:</td>
                                        <td>{{ json_decode($transaction->transaction_order)->first_name . ' ' . json_decode($transaction->transaction_order)->last_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ json_decode($transaction->transaction_order)->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>{{ json_decode($transaction->transaction_order)->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone / Whatsapp</td>
                                        <td>:</td>
                                        <td>{{ json_decode($transaction->transaction_order)->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Code Ticket Online</td>
                                        <td>:</td>
                                        <td>{{ $transaction->verifikasi_tiket->kode_tiket }}</td>
                                    </tr>
                                </table>
                                <h4 class="mt-3">Detail Items</h4>
                                <table>
                                    @foreach ($detail_payment->data->order_items as $order_item)
                                        <tr>
                                            <td>{{ $order_item->name }}</td>
                                            <td>{{ 'Rp. ' . number_format($order_item->price, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                <button type="button" class="nir-btn float-lg-end w-25 mt-3" onclick="sendEmail(`{{ $transaction->transaction_code }}`)">Send Mail</button>
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
@endsection
@section('js')
    <script>
        function sendEmail(transaction_code) {
            $.ajax({
                type: 'GET',
                url: "{{ route('frontend.bromo.sendEmail', ['transaction_code' => $transaction->transaction_code]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function() {

                },
                success: function(result) {
                    if (result.success == true) {
                        alert(result.message_title+' - '+result.message_content);
                    } else {
                        alert(result.message_title+' - '+result.message_content);
                    }
                },
                error: function(request, status, error) {
                    alert(error);
                }
            });
        }
    </script>
@endsection
