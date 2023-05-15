@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>
@php
    $data_pria = json_decode($honeymoon_order->data_pria,true);
    $data_wanita = json_decode($honeymoon_order->data_wanita,true);
@endphp
@section('title')
    Pembayaran {{ $honeymoon_order->kode_invoice }}
@endsection
@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ $asset }}/images/bg/bg_video.webp);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url({{ $asset }}/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Konfirmasi</h1>
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
                        <div class="booking-box-title d-md-flex align-items-center bg-title p-4 mb-4 rounded text-md-start text-center">
                            <i class="fa fa-check px-4 py-3 bg-white rounded title fs-5"></i>
                            <div class="title-content ms-md-3">
                                <h3 class="mb-1 white">Terima kasih. Pesanan Anda Dikonfirmasi Sekarang.</h3>
                                <p class="mb-0 white">Email konfirmasi telah dikirim ke alamat email yang Anda berikan.</p>
                            </div>
                        </div>
                        <div class="travellers-info mb-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Jumlah Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="theme2"><b>{{ $honeymoon_order->honeymoon->nama_paket }}</b></td>
                                        <td class="theme2"><b>{{ $honeymoon_order->qty }}</b></td>
                                        <td class="theme2"><b>{{ $honeymoon_order->created_at }}</b></td>
                                        <td class="theme2"><b>Rp. {{ number_format($honeymoon_order->price,0,',','.') }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="travellers-info mb-4">
                            <h4>Information Honeymoon</h4>
                            <table>
                                <tr>
                                    <td>Nomor Pesanan</td>
                                    <td><b>{{ $honeymoon_order->kode_invoice }}</b></td>
                                </tr>
                                <tr>
                                    <td>Nama Mempelai Pria</td>
                                    <td><b>{{ $data_pria['first_name'].' '.$data_pria['last_name'] }}</b></td>
                                </tr>
                                <tr>
                                    <td>Nama Mempelai Wanita</td>
                                    <td><b>{{ $data_wanita['first_name'].' '.$data_wanita['last_name'] }}</b></td>
                                </tr>
                                <tr>
                                    <td>Alamat Email</td>
                                    <td><b>{{ $honeymoon_order->email }}</b></td>
                                </tr>
                            </table>
                        </div>
                        <div class="booking-border mb-4">
                            <h4 class="border-b pb-2 mb-2">Pembayaran</h4>
                            <table>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td><b>{{ $status }}</b></td>
                                </tr>
                                @if ($status_pembayaran != 3)
                                <tr>
                                    <td>Nama Bank</td>
                                    <td><b>{{ $dataPayment['bank_name'] }}</b></td>
                                </tr>
                                <tr>
                                    <td>No. Virtual Account</td>
                                    <td><b>{{ $dataPayment['va_number'] }}</b></td>
                                </tr>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td><b>{{ $dataPayment['username_display'] }}</b></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kedaluwarsa Pembayaran</td>
                                    <td><b>{{ date("d F Y H:i:s", substr($dataPayment['trx_expiration_time'], 0, 10)) }}</b></td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <div class="booking-border mb-4">
                            <h4 class="border-b pb-2 mb-2">Cara Pembayaran</h4>
                            <table>
                                <tbody>
                                    @if ($dataPayment['bank_name'] == 'BNI')
                                    <tr >
                                        <td ><b>ATM</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Masukkan kartu debit/ATM Anda</td>
                                    </tr>
                                    <tr >
                                        <td >2. Masukkan PIN Anda</td>
                                    </tr>
                                    <tr >
                                        <td >3. Pilih Menu Lain > Transfer</td>
                                    </tr>
                                    <tr >
                                        <td >4. Pilih rekening asal dan pilih rekening tujuan ke rekening BNI</td>
                                    </tr>
                                    <tr >
                                        <td >5. Masukkan nomor Virtual Account BNI OY! Anda</td>
                                    </tr>
                                    <tr >
                                        <td >6. Masukkan jumlah nominal</td>
                                    </tr>
                                    <tr >
                                        <td >7. Ikuti petunjuk hingga transaksi selesai</td>
                                    </tr>
                                    <tr >
                                        <td ><b>Mobile Banking</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Pilih Transfer > Antar Rekening BNI</td>
                                    </tr>
                                    <tr >
                                        <td >2. Pilih Rekening Tujuan > Input Rekening Baru. Masukkan nomor rekening dengan nomor Virtual Account Anda - <b>{{ $dataPayment['va_number'] }}</b> dan klik Lanjut, kemudian klik Lanjut lagi.</td>
                                    </tr>
                                    <tr >
                                        <td >3. Masukkan jumlah pembayaran sejumlah tagihan Anda, lalu klik Lanjutkan.</td>
                                    </tr>
                                    <tr >
                                        <td >4. Periksa detail konfirmasi. Pastikan Nama Rekening Tujuan adalah nama penerima Anda dan nominal transaksi sudah benar. Jika benar, masukkan password transaksi dan klik Lanjut.</td>
                                    </tr>
                                    <tr >
                                        <td >5. Ikuti petunjuk hingga transaksi selesai</td>
                                    </tr>
                                    
                                    @elseif ($dataPayment['bank_name'] == 'BRI')
                                    <tr >
                                        <td ><b>ATM</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Pilih menu Transaksi Lain</td>
                                    </tr>
                                    <tr >
                                        <td >2. Pilih menu Pembayaran</td>
                                    </tr>
                                    <tr >
                                        <td >3. Pilih menu Lainnya</td>
                                    </tr>
                                    <tr >
                                        <td >4. Pilih menu BRIVA</td>
                                    </tr>
                                    <tr >
                                        <td >5. Masukkan nomor Virtual Account BRI OY! Anda</td>
                                    </tr>
                                    <tr >
                                        <td >6. Pilih Ya untuk memproses pembayaran</td>
                                    </tr>
                                    <tr >
                                        <td ><b>Mobile Banking</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Masuk ke aplikasi BRI Mobile dan pilih Mobile Banking BRI</td>
                                    </tr>
                                    <tr >
                                        <td >2. Pilih menu Info</td>
                                    </tr>
                                    <tr >
                                        <td >3. Pilih menu BRIVA</td>
                                    </tr>
                                    <tr >
                                        <td >4. Masukkan nomor Virtual Account BRI OY! Anda - <b>{{ $dataPayment['va_number'] }}</b></td>
                                    </tr>
                                    <tr >
                                        <td >5. Masukkan PIN Mobile/SMS Banking BRI</td>
                                    </tr>
                                    <tr >
                                        <td >6. Anda akan mendapatkan notifikasi pembayaran melalui SMS</td>
                                    </tr>
                                    <tr >
                                        <td ><b>Internet Banking</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Login pada halaman Internet Banking BRI</td>
                                    </tr>
                                    <tr >
                                        <td >2. Pilih menu Pembayaran</td>
                                    </tr>
                                    <tr >
                                        <td >3. Pilih menu BRIVA</td>
                                    </tr>
                                    <tr >
                                        <td >4. Masukkan nomor Virtual Account BRI OY! Anda</td>
                                    </tr>
                                    <tr >
                                        <td >5. Masukkan password Internet Banking BRI</td>
                                    </tr>
                                    <tr >
                                        <td >6. Masukkan mToken Internet Banking BRI</td>
                                    </tr>
                                    <tr >
                                        <td >7. Anda akan mendapatkan notifikasi pembayaran</td>
                                    </tr>
                                    @elseif ($dataPayment['bank_name'] == 'BANK MANDIRI')
                                    <tr >
                                        <td ><b>MANDIRI ATM</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Masukkan kartu debit/ATM Anda</td>
                                    </tr>
                                    <tr >
                                        <td >2. Masukkan PIN Anda</td>
                                    </tr>
                                    <tr >
                                        <td >3. Pilih menu Bayar/Beli</td>
                                    </tr>
                                    <tr >
                                        <td >4. Pilih menu Lainnya, hingga menemukan menu Multipayment</td>
                                    </tr>
                                    <tr >
                                        <td >5. Pilih penyedia jasa OY! Indonesia Masukkan kode biller <b>89325</b>, lalu pilih Benar</td>
                                    </tr>
                                    <tr >
                                        <td >6. Masukkan nomor Virtual Account Mandiri OY! Anda - <b>{{ $dataPayment['va_number'] }}</b></td>
                                    </tr>
                                    <tr >
                                        <td >7. Masukkan jumlah nominal</td>
                                    </tr>
                                    <tr >
                                        <td >8. Ikuti petunjuk hingga transaksi selesai</td>
                                    </tr>
                                    <tr >
                                        <td ><b>MANDIRI ONLINE / MOBILE BANKING</b></td>
                                    </tr>
                                    <tr >
                                        <td >1. Masuk ke aplikasi Mandiri Online</td>
                                    </tr>
                                    <tr >
                                        <td >2. Pilih menu Pembayaran</td>
                                    </tr>
                                    <tr >
                                        <td >3. Pilih menu Buat Pembayaran Baru</td>
                                    </tr>
                                    <tr >
                                        <td >4. Pilih menu Multipayment</td>
                                    </tr>
                                    <tr >
                                        <td >5. Pilih penyedia jasa OY! Indonesia</td>
                                    </tr>
                                    <tr >
                                        <td >6. Masukkan nomor VA (klik Tambah Sebagai Nomor Baru) - <b>{{ $dataPayment['va_number'] }}</b></td>
                                    </tr>
                                    <tr >
                                        <td >7. Klik konfirmasi</td>
                                    </tr>
                                    <tr >
                                        <td >8. Masukkan nominal</td>
                                    </tr>
                                    <tr >
                                        <td >9. Konfirmasi pembayaran Anda lalu masukkan PIN mandiri Online Anda</td>
                                    </tr>
                                    <tr >
                                        <td >10. Transaksi selesai, simpan bukti pembayaran Anda</td>
                                    </tr>
                                    @endif
                                </tbody>
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
                                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Whatsapp</span>: 0813-3112-6991</li>
                                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Email</span>: marketing@plesiranindonesia.com</li>
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