@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('title')
    Payment - {{ $paket->id }}
@endsection
@section('content')
<div class="container page pt-50">
    <div class="row">
        <div class="col-md-12">
            {{-- <form method="post" action="{{ route('frontend.paket.checkout',['slug' => $pakets->slug, 'id' => $paket_lists->id]) }}" enctype="multipart/form-data"
                class="checkout woocommerce-checkout">
                @csrf --}}
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
                                    <td class="product-name">1. {{ $pemesan->first_name.' '.$pemesan->last_name }}</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection