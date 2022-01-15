@extends('layouts.frontend_4.app')

@section('title')
    Booking
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">booking</a><i>/</i><a href="#"
                    class="last"><span>Booking</span> List</a>
                <h2><span>Booking</span> List</h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <!-- content-->
            <div class="col-lg-12 woocommerce">
                @if ($message = Session::get('danger'))
                    <div role="alert" class="alert alert-warning alert-dismissible fade in mb-20">
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i
                            class="alert-icon flaticon-warning"></i>{{ $message }}
                    </div>
                @endif
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <table class="shop_table cart">
                        <thead>
                            <tr>
                                <th class="product-thumbnail text-center" style="width: 50%">Kode Booking</th>
                                <th class="product-price text-center">Harga</th>
                                <th class="product-quantity text-center">Jumlah</th>
                                <th class="product-subtotal text-center">Total</th>
                                <th class="product-remove"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $key =>$cart)
                                @if ($cart->is_cart != 'S')
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <div class="toggle style-2">
                                                <div class="content-title text-center">
                                                    <span class="active"><i class="active-icon"></i>{{ $cart->kode_booking }}
                                                    <input type="hidden" name="kode_booking" value="{{ $cart->kode_booking }}" id="">
                                                    </span>
                                                </div>
                                                <div class="content">
                                                    <?php $cartItems = \App\Models\CartItem::where('cart_id', $cart->id)
                                                        ->select('nama_item', 'qty', 'price')
                                                        ->get(); ?>
                                                    @forelse ($cartItems as $cartItem)
                                                        <input type="hidden" name="item_detail"
                                                            value="{{ $cartItem->nama_item }}">
                                                        {{ $cartItem->nama_item }}
                                                    @empty
                                                        <p>Data Tidak Ditemukan</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price text-center">
                                            <span class="amount">IDR
                                                {{ number_format($cartItem->price, 0, ',', '.') }}</span>
                                            <input type="hidden" class="price{{ $key }}" name="price"
                                                value="{{ $cartItem->price }}">
                                        </td>
                                        <td class="product-quantity text-center">
                                            <div class="quantity buttons_added">
                                                <input type="number" step="1" min="0" name="qty" id="jumlah"
                                                    onchange="jml({{ $key }})" title="Qty"
                                                    class="input-text qty text">
                                            </div>
                                        </td>
                                        <td class="product-subtotal text-center">
                                            <input type="hidden" id="amounts2{{ $key }}"
                                                value="{{ $cartItem->price }}">
                                            <span class="amount" id="amounts{{ $key }}">IDR 0</span>
                                        </td>
                                        <td class="product-remove text-center"><a href="#" title="Remove this item"
                                                class="remove"></a>
                                        </td>
                                    </tr>
                                @endif
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data Tidak Tersedia</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="6" class="actions">
                                        <input type="submit" value="Proceed to Checkout" id="kirim" class="cws-button">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    <div class="row mt-60">
                        <div class="col-md-12 mb-md-60">
                            <h2 class="mb-30 mt-0">Cart Totals</h2>
                            <table class="total-table">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <input type="hidden" name="subtotal" id="subtotal">
                                        <td><span class="amount" id="amount_total">IDR 0</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>PPn 10%</th>
                                        <input type="hidden" name="ppn" id="ppn">
                                        <td><span class="amount" id="totalppn">IDR 0</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <input type="hidden" name="order_total" id="order_total">
                                        <td><span class="amount" id="order_total_text">IDR 0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                </div>
                <!-- ! content-->
            </div>
        </div>
    @endsection

    @section('js')
        <script>
            $(document).ready(function() {
                // if(!$('#jumlah').val()){
                //     alert('Jumlah Belum Input');
                //     // e.pre
                // }

                // document.getElementBy('amounts'+this.value).innerHTML= 1;
            })
            $('#kirim').click(function(e) {
                if (!$('#jumlah').val()) {
                    alert('Jumlah Belum Input');
                    e.preventDefault();
                }
            })
            function jml(q) {
                // alert(q);
                var bilangan = $('.price' + q).val() * $('#jumlah').val();
                var bilangan2 = parseInt(bilangan) * (10/100);
                var bilangan3 = parseInt(bilangan) + parseInt(bilangan2);

                var number_string = bilangan.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                var number_string2 = bilangan2.toString(),
                    sisa2 = number_string2.length % 3,
                    rupiah2 = number_string2.substr(0, sisa2),
                    ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }

                var number_string3 = bilangan3.toString(),
                    sisa3 = number_string3.length % 3,
                    rupiah3 = number_string3.substr(0, sisa3),
                    ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);

                if (ribuan3) {
                    separator3 = sisa3 ? '.' : '';
                    rupiah3 += separator3 + ribuan3.join('.');
                }
                // alert(rupiah*jumlah);
                var jmlh = $('#amounts2' + q).val(bilangan);
                // var total = parseInt(bilangan)/10;
                $('#subtotal').val(bilangan);
                $('#ppn').val(bilangan2);
                $('#order_total').val(bilangan3);

                // var ppn = 10%;
                // alert(jmlh);
                document.getElementById('amounts' + q).innerHTML = 'IDR ' + rupiah;
                document.getElementById('amount_total').innerHTML = 'IDR ' + rupiah;
                document.getElementById('totalppn').innerHTML = 'IDR ' + rupiah2;
                document.getElementById('order_total_text').innerHTML = 'IDR ' + rupiah3;
            }
        </script>
    @endsection
