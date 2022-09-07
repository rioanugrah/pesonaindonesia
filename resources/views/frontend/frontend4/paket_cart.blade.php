@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('title')
    {{ $paket_lists->nama_paket }} - Order
@endsection

@section('content')
    <div class="container page pt-50">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('frontend.paket.checkout',['slug' => $pakets->slug, 'id' => $paket_lists->id]) }}" enctype="multipart/form-data"
                    class="checkout woocommerce-checkout">
                    @csrf
                    <div id="customer_details" class="col2-set">
                        <div class="col-1 mb-sm-50">
                            <h3 class="mt-0 mb-30">Billing Details</h3>
                            <input type="hidden" id="detail_maksimal" value="{{ $paket_lists->jumlah_paket }}">
                            {{-- <p class="mb-20">Returning customer? <a href="#">Click here to login</a></p> --}}
                            <div class="billing-wrapper">
                                <div class="woocommerce-billing-fields">
                                    <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                        <label for="billing_first_name">First Name<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="billing_first_name" type="text" name="first_name" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                        <label for="billing_last_name">Last Name<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="billing_last_name" type="text" name="last_name" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <div class="clear"></div>
                                    <p id="billing_address_1_field"
                                        class="form-row form-row-wide address-field validate-required">
                                        <label for="billing_address_1">Address<abbr title="required"
                                                class="required">*</abbr></label>
                                        <textarea name="alamat" id="" cols="30" rows="5"></textarea>
                                        {{-- <input id="billing_address_1" type="text" name="alamat" placeholder="Street address" value="" class="input-text"> --}}
                                    </p>
                                    <div class="clear"></div>
                                    <p id="billing_email_field"
                                        class="form-row form-row-first validate-required validate-email">
                                        <label for="billing_email">Email Address<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="billing_email" type="text" name="email" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <p id="billing_phone_field"
                                        class="form-row form-row-last validate-required validate-phone">
                                        <label for="billing_phone">Phone<abbr title="required"
                                                class="required">*</abbr></label>
                                        <input id="billing_phone" type="text" name="phone" placeholder=""
                                            value="" class="input-text">
                                    </p>
                                    <p id="billing_tgl_field"
                                        class="form-row form-row-last validate-required">
                                        <label for="billing_qty">Tanggal Berangkat<abbr title="required"
                                                class="required">*</abbr></label>
                                        <div class="input-group">
                                            <input type="date" name="tanggal_berangkat" class="form-control" placeholder=""
                                                value="" class="input-text">
                                        </div>
                                    </p>
                                    <div class="clear"></div>
                                    <p id="billing_qty_field"
                                        class="form-row form-row-last validate-required">
                                        <label for="billing_qty">Jumlah<abbr title="required"
                                                class="required">*</abbr></label>
                                        <div class="input-group">
                                            <input id="" type="text" name="qty" placeholder=""
                                                value="" class="input-text jumlah">
                                            {{-- <button type="button" name="add" id="add" class="cws-button alt"><i class="fa fa-plus"></i></button> --}}
                                        </div>
                                    </p>
                                    <p id="billing_qty_field"
                                        class="form-row form-row-last validate-required validate-phone">
                                        {{-- <label for="billing_qty">Tambah Anggota</label> --}}
                                        {{-- <div id="tambah_anggota"></div> --}}
                                        <button type="button" name="add" id="add" class="cws-button alt"><i class="fa fa-plus"></i> Tambah Anggota</button>
                                    </p>
                                </div>
                            </div>
                            {{-- <div id="data_anggota" style="display: none"> --}}
                                <h3 class="mt-50 mb-30">Data Anggota</h3>
                                <div class="billing-wrapper" id="survey_options">
                                    {{-- <div class="woocommerce-billing-fields">
                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label for="billing_first_name">First Name<abbr title="required"
                                                    class="required">*</abbr></label>
                                            <input id="billing_first_name" type="text" name="anggota_firstname[]" placeholder="Firstname"
                                                value="" class="input-text survey_options">
                                        </p>
                                        <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                            <label for="billing_last_name">Last Name<abbr title="required"
                                                    class="required">*</abbr></label>
                                            <input id="billing_last_name" type="text" name="anggota_lastname[]" placeholder="Lastname"
                                                value="" class="input-text survey_options">
                                        </p>
                                        <div class="clear"></div>
                                        <div class="controls">
                                            <a href="javascript:void()" id="add_more_fields"><i class="fa fa-plus"></i> Add More</a>
                                            <a href="javascript:void()" id="remove_fields"><i class="fa fa-plus"></i> Remove Field</a>
                                        </div>
                                    </div> --}}
                                    <div class="woocommerce-billing-fields">
                                        <table class="table" id="dynamic_field">  
                                            {{-- <tr>  
                                                <td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota 1" class="form-control name_list" /></td>  
                                                <td><button type="button" name="add" id="add" class="cws-button full-width alt"><i class="fa fa-plus"></i></button></td>  
                                            </tr>   --}}
                                        </table> 
                                    </div>
                                </div>
                            {{-- </div> --}}
                        </div>
                        <div class="col-2">
                            <h3 id="order_review_heading" class="mt-0 mb-30">Your order</h3>
                            {{-- <p class="mb-20">Have a coupon? <a href="#">Click here to enter your code</a></p> --}}
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">{{ $paket_lists->nama_paket }} <span id="jumlah_order"></span></td>
                                            <td>
                                                <span class="amount">Rp. {{ number_format($paket_lists->price,0,",",".") }}</span>
                                                {{-- <input type="text" value="{{ $paket_lists->price }}" id="price"> --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <td>Cart Subtotal</td>
                                            <td>
                                                <span class="amount" id="subTotal"></span>
                                                {{-- <span class="amount">Rp. {{ number_format($paket_lists->price,2,",",".") }}</span> --}}
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <th>
                                                <span class="amount" id="orderTotal"></span>
                                                {{-- <span class="amount">Rp. {{ number_format($paket_lists->price,2,",",".") }}</span> --}}
                                                <input type="hidden" name="orderTotal" id="order_total">
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <h3 id="order_review_heading" class="mt-30 mb-30">Metode Pembayaran</h3>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <div class="payment_methods methods">
                                        <div class="payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" name="payment_method"
                                                value="BRI" data-order_button_text=""
                                                class="input-radio">
                                            <label for="payment_method_bacs">BRI</label>
                                        </div>
                                        {{-- <div class="payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" name="payment_method"
                                                value="bacs" checked="checked" data-order_button_text=""
                                                class="input-radio">
                                            <label for="payment_method_bacs">Direct Bank Transfer</label>
                                            <div class="payment_box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment reference. Your order won’t be shipped until have
                                                    account.</p>
                                                <ul class="mb-20">
                                                    <li>Etiam lobortis nulla mi, ac lacinia mauris </li>
                                                    <li>Donec tempor erat vel scelerisque posuere</li>
                                                    <li>Nam elementum elit eget tellus faucibus </li>
                                                    <li>Aliquam turpis nibh, dictum eu consequat </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="payment_method_cheque">
                                            <input id="payment_method_cheque" type="radio" name="payment_method"
                                                value="cheque" data-order_button_text="" class="input-radio">
                                            <label for="payment_method_cheque">Cheque Payment</label>
                                            <div style="display:none;" class="payment_box payment_method_cheque">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                        <div class="payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" name="payment_method"
                                                value="paypal" data-order_button_text="Proceed to PayPal"
                                                class="input-radio">
                                            <label for="payment_method_paypal">PayPal <a
                                                    href="https://www.paypal.com/gb/webapps/mpp/paypal-popup"
                                                    onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"
                                                    title="What is PayPal?" class="about_paypal">What is PayPal?</a><img
                                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"
                                                    alt="PayPal Acceptance Mark" class="visible-lg-block"></label>
                                            <div style="display:none;" class="payment_box payment_method_paypal">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="place-order mt-20">
                                        <input id="place_order" type="submit" name="woocommerce_checkout_place_order"
                                            value="Place order" data-value="Update Totals"
                                            class="cws-button full-width alt">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- {{ $paket_lists->kategori_paket_id }} --}}
@endsection

@section('js')
<script>
    $('.jumlah').change(function(){
        if($('.jumlah').val() > $('#detail_maksimal').val()){
            alert('Jumlah anggota melebihi batas yang ditentukan');
            $('.jumlah').val('');
        }else{
            if({{ $paket_lists->kategori_paket_id }} == 2){
                var price = {{ $paket_lists->price }};
                var penjumlahan = $('.jumlah').val() * price;
    
                var bilangan = penjumlahan;
        
                var	number_string = bilangan.toString(),
                    sisa 	= number_string.length % 3,
                    rupiah 	= number_string.substr(0, sisa),
                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                        
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
    
                document.getElementById('jumlah_order').innerHTML = ' - '+$('.jumlah').val()+'x';
                document.getElementById('subTotal').innerHTML = 'Rp. '+rupiah;
                document.getElementById('orderTotal').innerHTML = 'Rp. '+rupiah;
                $('#order_total').val(penjumlahan);
            }else if({{ $paket_lists->kategori_paket_id }} == 1){
                var price = {{ $paket_lists->price }};
    
                var bilangan = price;
        
                var	number_string = bilangan.toString(),
                    sisa 	= number_string.length % 3,
                    rupiah 	= number_string.substr(0, sisa),
                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                        
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
    
                document.getElementById('jumlah_order').innerHTML = ' - '+$('.jumlah').val()+' pax';
                document.getElementById('subTotal').innerHTML = 'Rp. '+rupiah;
                document.getElementById('orderTotal').innerHTML = 'Rp. '+rupiah;
                $('#order_total').val(price);
            }
        }

        
        // const box = document.getElementById('tambah_anggota');
        // // const anggota = document.getElementById('data_anggota');
        // if($('#jumlah').val() > 1){
        //     box.style.display = 'block';
        //     // anggota.style.display = 'block';
        //     box.innerHTML = '<button type="button" name="add" id="add" class="cws-button alt"><i class="fa fa-plus"></i> Tambah Anggota</button>';
        // }else{
        //     box.style.display = 'none';
        //     // anggota.style.display = 'none';
        // }


        // const jumlah = $('#jumlah').val();
        // for (let index = 0; index < array.length; index++) {
        //     const element = array[index];
            
        // }
        // for (let j = 1; j < jumlah; j++) {
        //     // const element = array[j];   
        //     $('#dynamic_field').append('<tr id="row'+j+'" class="dynamic-added"><td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota '+j+'" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+j+'" class="cws-button full-width alt btn_remove">X</button></td></tr>'); 
        //     // j--; 
        // }
        
    })
    // const qty = $('#jumlah').val();
    $(document).ready(function(){
        var i=1;  
        $('#add').click(function(){  
            if(i < $('.jumlah').val()){
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota '+i+'" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="cws-button full-width alt btn_remove">X</button></td></tr>');  
                i++;  
            }
        });

        // if({{ $paket_lists->kategori_paket_id }} == 1){
        // }

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
            i--;
        });  
    })
</script>
@endsection
