@extends('layouts.frontend_4.app')

@section('title')
    Checkout {{ $request['kode_booking'] }}
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">checkout</a><i>/</i><a href="#"
                    class="last"><span>{{ $request['kode_booking'] }}</span></a>
                <h2><span>Checkout</span></h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <!-- content-->
            <div class="col-md-12 mb-md-70">
                @if ($message = Session::get('danger'))
                    <div role="alert" class="alert alert-warning alert-dismissible fade in mb-20">
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i
                            class="alert-icon flaticon-warning"></i>{{ $message }}
                    </div>
                @endif
                <form name="checkout" method="get" action="{{ route('payment') }}" enctype="multipart/form-data"
                    class="checkout woocommerce-checkout">
                    {{-- @csrf --}}
                    <div id="customer_details" class="col2-set">
                        <div class="col-1 mb-sm-50">
                            <h3 class="mt-0 mb-30">Billing Details</h3>
                            <div class="billing-wrapper">
                                <div class="woocommerce-billing-fields">
                                    <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                        <label for="billing_first_name">First Name<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="firstname_booking" type="text" name="firstname_booking" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                        <label for="billing_last_name">Last Name<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="lastname_booking" type="text" name="lastname_booking" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <div class="clear"></div>
                                    <p id="billing_email_field" class="form-row form-row-last">
                                        <label for="billing_email">Email</label>
                                        <input id="billing_email" type="text" name="email_booking" placeholder="" value=""
                                            class="input-text">
                                    </p>
                                    <p id="billing_phone_field"
                                        class="form-row form-row-last validate-required validate-phone">
                                        <label for="billing_phone">Phone<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="billing_phone" type="text" name="phone_booking" placeholder="" value=""
                                            class="input-text">
                                    </p>
                                    <p id="billing_jumlah_field" class="form-row form-row-last">
                                        <label for="billing_jumlah">Jumlah</label>
                                        <input id="billing_jumlah" type="number" name="qty" placeholder="" value="" class="input-text">
                                      </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <h3 id="order_review_heading" class="mt-0 mb-30">Your order</h3>
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name" style="width: 55%">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Kode Booking : <b>{{ $request['kode_booking'] }}</b>
                                            <td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <td>{{ $cart_detail->nama_item }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
            <!-- ! content-->
        </div>
    </div>
@endsection

@section('js')
    <script>
        // $(document).change(function() {
            
        // })
        $('#billing_jumlah').change(function(){
            var bilangan1 = $('#billing_jumlah').val() * $('.price').val();
            var bilangan2 = parseInt(bilangan1) * (10 / 100);
            var bilangan3 = parseInt(bilangan1) + parseInt(bilangan2);

            var number_string1 = bilangan1.toString(),
                sisa1 = number_string1.length % 3,
                rupiah1 = number_string1.substr(0, sisa1),
                ribuan1 = number_string1.substr(sisa1).match(/\d{3}/g);

            if (ribuan1) {
                separator1 = sisa1 ? '.' : '';
                rupiah1 += separator1 + ribuan1.join('.');
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

            document.getElementById('amount-total').innerHTML = 'IDR ' + rupiah1;
            document.getElementById('amount-ppn').innerHTML = 'IDR ' + rupiah2;
            document.getElementById('amount-subtotal').innerHTML = 'IDR ' + rupiah3;
            
            $('.total_price').val(bilangan1);
            $('#order_total').val(bilangan3);
            $('#ppn').val(bilangan2);
        })

        // function jml() {
        //     var bilangan1 = $('#billing_jumlah').val() * $('.price').val();
        //     var bilangan2 = parseInt(bilangan1) * (10 / 100);
        //     var bilangan3 = parseInt(bilangan1) + parseInt(bilangan2);

        //     var number_string1 = bilangan1.toString(),
        //         sisa1 = number_string1.length % 3,
        //         rupiah1 = number_string1.substr(0, sisa1),
        //         ribuan1 = number_string1.substr(sisa1).match(/\d{3}/g);

        //     if (ribuan1) {
        //         separator1 = sisa1 ? '.' : '';
        //         rupiah1 += separator1 + ribuan1.join('.');
        //     }

        //     var number_string2 = bilangan2.toString(),
        //         sisa2 = number_string2.length % 3,
        //         rupiah2 = number_string2.substr(0, sisa2),
        //         ribuan2 = number_string2.substr(sisa2).match(/\d{3}/g);

        //     if (ribuan2) {
        //         separator2 = sisa2 ? '.' : '';
        //         rupiah2 += separator2 + ribuan2.join('.');
        //     }

        //     var number_string3 = bilangan3.toString(),
        //         sisa3 = number_string3.length % 3,
        //         rupiah3 = number_string3.substr(0, sisa3),
        //         ribuan3 = number_string3.substr(sisa3).match(/\d{3}/g);

        //     if (ribuan3) {
        //         separator3 = sisa3 ? '.' : '';
        //         rupiah3 += separator3 + ribuan3.join('.');
        //     }

        //     document.getElementById('amount-total').innerHTML += 'IDR ' + rupiah1;
        //     document.getElementById('amount-ppn').innerHTML += 'IDR ' + rupiah2;
        //     document.getElementById('amount-subtotal').innerHTML += 'IDR ' + rupiah3;
            
        //     $('.total_price').val(bilangan1);
        // }
    </script>
@endsection
