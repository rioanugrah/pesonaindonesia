@extends('layouts.frontend_4.app')

@section('title')
    Checkout
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">checkout</a><i>/</i><a href="#"
                    class="last"><span>Checkout</span></a>
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
                <form name="checkout" method="post" action="{{ route('payment') }}" enctype="multipart/form-data"
                    class="checkout woocommerce-checkout">
                    @csrf
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
                                        <input id="billing_email" type="text" name="email_booking" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                        <label for="billing_phone">Phone<abbr title="required" class="required">*</abbr></label>
                                        <input id="billing_phone" type="text" name="phone_booking" placeholder="" value="" class="input-text">
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <h3 id="order_review_heading" class="mt-0 mb-30">Your order</h3>
                            <input type="hidden" name="date_purchase" value="{{ $data['created_at'] }}">
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
                                                <p>Kode Booking : <b>{{ $data['kode_booking'] }}</b></p>
                                                {{ $data['qty'] }}x {{ $data['item_detail'] }}</td>
                                                <input type="hidden" name="kode_booking" value="{{ $data['kode_booking'] }}">
                                                <input type="hidden" name="description" value="{{ $data['item_detail'] }}">
                                                <input type="hidden" name="qty" value="{{ $data['qty'] }}">
                                            <td><span class="amount">IDR {{ number_format($data['subtotal'],0,",",".") }}</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <td>Cart Subtotal</td>
                                            <td>
                                                <input type="hidden" name="price" value="{{ $data['price'] }}">
                                                <input type="hidden" name="subtotal" value="{{ $data['subtotal'] }}">
                                                <span class="amount">IDR {{ number_format($data['subtotal'],0,",",".") }}</span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <td>PPn 10%</td>
                                            <td>
                                                <input type="hidden" name="ppn" value="{{ $data['ppn'] }}">
                                                <span class="amount">IDR {{ number_format($data['ppn'],0,",",".") }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <th>
                                                <input type="hidden" name="order_total" value="{{ $data['order_total'] }}">
                                                <span class="amount">IDR {{ number_format($data['order_total'],0,",",".") }}</span>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <div class="payment_methods methods">
                                        <div class="payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" name="payment_method" value="bacs"
                                                checked="checked" data-order_button_text="" class="input-radio">
                                            <label for="payment_method_bacs">Direct Bank Transfer</label>
                                        </div>
                                    </div>
                                    <div class="place-order mt-20">
                                        <input id="place_order" type="submit" name="woocommerce_checkout_place_order"
                                            value="Buy Now" data-value="Update Totals"
                                            class="cws-button full-width alt">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ! content-->
        </div>
    </div>
@endsection
