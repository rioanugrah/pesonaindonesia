@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('css')
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Payment - {{ $paket->id }}
@endsection
@section('content')
<div class="container page pt-50">
    <div class="row">
        <div class="col-md-12">
            <form method="post" id="bukti_transfer" enctype="multipart/form-data"
                class="checkout woocommerce-checkout">
                @csrf
                <input type="hidden" name="email_payment" value="{{ $pemesan->email }}" id="">
                <input type="hidden" name="nama_pembayaran" value="{{ $pemesan->first_name.' '.$pemesan->last_name }}" id="">
                <div class="col-12">
                    <h3 id="order_review_heading" class="mt-0 mb-30">Pemesanan Anda #{{ $paket->id }}</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><b>Product</b></th>
                                    <th class="product-total"><b>Total</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">{{ $paket->nama_paket }} x{{ $paket->qty }}</td>
                                    <td><span class="amount">Rp. {{ number_format($paket->price,2,",",".") }}</span></td>
                                </tr>
                                <tr>
                                    <th class="product-name"><b>Pemesan</b></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="product-name">1. {{ $pemesan->first_name.' '.$pemesan->last_name.' | '.$pemesan->email }} </td>
                                    <td></td>
                                </tr>
                                @foreach ($anggotas as $key => $anggota)
                                <tr>
                                    <td class="product-name">{{ 1+$key+1 }}. {{ $anggota->pemesan }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th><b>Order Total</b></th>
                                    <th><span class="amount">Rp. {{ number_format($paket->price,2,",",".") }}</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- @if ($status_live != false) --}}
                {{-- @if ($status_live != false) --}}
                <div class="col-12">
                    <h3 id="order_review_heading" class="mt-30 mb-30">Status Pembayaran</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">Status Pembayaran : <b>{{ $status }}</b></td>
                                    <td></td>
                                </tr>
                                @if ($status_pembayaran != 3)
                                <tr class="cart_item">
                                    <td class="product-name">Pembayaran diverifikasi otomatis 1x24 jam</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <a href="{{ $transaksi->url }}" class="cws-button alt" target="_blank">Bayar Sekarang</a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @else
                <div class="col-12">
                    <h3 id="order_review_heading" class="mt-30 mb-30">Pembayaran</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">Nama Bank : {{ $bank->nama_bank }}</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Nama Penerima : {{ $bank->nama_penerima }}</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Nomor Rekening : <span class="amount"><b>{{ $bank->nomor_rekening }}</b></span></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Status Pembayaran : <b>{{ $status }}</b></td>
                                    <td></td>
                                </tr>
                                @if ($paket->status <= 1)
                                <tr class="cart_item">
                                    <td class="product-name">Upload Bukti Transfer : <input type="file" name="images" id=""><button type="submit" class="cws-button alt">Kirim</button></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif --}}
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>
    <script>
        $('#bukti_transfer').submit(function(e) {
            // alert('testing');
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('frontend.paket.transfer',['id' => $paket->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        setTimeout(location.reload(), 8000);
                        // this.reset();
                        // table.ajax.reload();
                        // document.getElementById("button").style.display = "block";
                        // document.getElementById("input_slider").style.display = "none";
                    }else{
                        iziToast.error({
                            title: result.success,
                            message: result.error
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