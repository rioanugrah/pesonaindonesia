@extends('layouts.frontend_5.app')
@section('title')
    Payment - Checkout
@endsection
@section('css')
    <script type="text/javascript" src="{{ $link_url_payment }}" data-client-key="{{ $midtrans_client_key }}"></script>
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
                                        <td colspan="2"><button id="pay-button" class="nir-btn float-lg-end w-25">Bayar
                                                Sekarang</button></td>
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
@section('js')
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    // alert('Pembayaran Berhasil');
                    // window.location.href='{{ route('invoice', ['kode_order' => $kode_order]) }}'

                    $.ajax({
                        type: 'GET',
                        url: "{{ route('invoice.send', ['kode_order' => $kode_order]) }}",
                        contentType: "application/json;  charset=utf-8",
                        cache: false,
                        beforeSend: function() {
                            $("#status").fadeIn();
                            $("#preloader").delay(100).fadeIn("slow");
                        },
                        success: (result) => {
                            if (result.success == true) {
                                window.location.href='{{ route('invoice', ['kode_order' => $kode_order]) }}';
                            }else{
                                alert(result.message_title);
                            }
                            // alert(result);
                            // $('#edit').modal('show');
                            // document.getElementById('edit_pengguna').innerHTML = 'Edit - ' +
                            //     result.data.name;
                            // $('#edit_id').val(result.data.id);
                            // $('#edit_name').val(result.data.name);
                            // $('#edit_email').val(result.data.email);
                            // $('#edit_role').val(result.data.role);
                        },
                        error: function(request, status, error) {
                            // iziToast.error({
                            //     title: 'Error',
                            //     message: error,
                            // });
                        }
                    });

                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result) {
                    alert('Pembayaran Sedang Ditunggu');
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    alert('Pembayaran Gagal');
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onClose: function(result) {
                    alert('You Close the popup without finishing the payment');
                }
            });
        };
    </script>
@endsection
