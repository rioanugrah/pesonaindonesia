@extends('layouts.frontend_4.app')

@section('title')
    Confirmation
@endsection

@section('css')
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">confirmation</a><i>/</i>
                <h2><span>Confirmation</span></h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container page">
        <div class="row">
            <div id="alert"></div>
            {{-- <div role="alert" class="alert alert-warning alert-dismissible fade in mb-20">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i
                    class="alert-icon flaticon-warning"></i>
            </div> --}}
            @if ($message = Session::get('danger'))
            @endif
            <div class="col-md-12 mb-md-70">
                <div class="col-md-6">
                    <h3 id="order_review_heading" class="mt-0 mb-30">Billing</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                <tr class="cart_item">
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{ $input['firstname_booking'] }} {{ $input['lastname_booking'] }}</td>
                                </tr>
                                <tr class="cart_item">
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $input['email_booking'] }}</td>
                                </tr>
                                <tr class="cart_item">
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{ $input['phone_booking'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 id="order_review_heading" class="mt-0 mb-30">Order Detail</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                <tr class="cart_item">
                                    <td>Kode Booking</td>
                                    <td>:</td>
                                    <td><b>{{ $input['kode_booking'] }}</b><input type="hidden" value="{{ $input['kode_booking'] }}" id="kode_booking"></td>
                                </tr>
                                <tr class="cart_item">
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td style="width: 55%">{{ $input['description'] }}</td>
                                </tr>
                                <tr class="cart_item">
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td>{{ $input['qty'] }}</td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><span class="amount">IDR {{ number_format($input['price'],0,",",".") }}</span></td>
                                </tr>
                                <tr class="shipping">
                                    <td>PPn 10%</td>
                                    <td>:</td>
                                    <td><span class="amount">IDR {{ number_format($input['ppn'],0,",",".") }}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td><span class="amount">IDR {{ number_format($input['order_total'],0,",",".") }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="frame"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // var xhr = new XMLHttpRequest();
        // xhr.withCredentials = true;

        // xhr.addEventListener("readystatechange", function() {
        // if(this.readyState === 4) {
        //     console.log(this.responseText);
        //     // var data=this.responseText;
        //     // var jsonResponse = JSON.parse(data);
        //     // console.log(jsonResponse.data.amount);
        // }
        // });

        // xhr.open("GET", "https://api-stg.oyindonesia.com/api/payment-checkout/status?partner_tx_id=H-45820220116&send_callback=false");
        // xhr.setRequestHeader("Access-Control-Allow-Origin","*");
        // xhr.setRequestHeader("Content-Type", "application/json");
        // xhr.setRequestHeader("x-oy-username", "businesspesonaplesiranindonesia");
        // xhr.setRequestHeader("x-api-key", "47860502-8fa8-4c73-9f2b-a06cf1cd64fc");

        // xhr.send();

        // $.ajax({
        //     url: 'https://api-stg.oyindonesia.com/api/payment-checkout/status?partner_tx_id=H-45820220116&send_callback=false',
        //     beforeSend: function(xhr) {
        //         xhr.setRequestHeader("Content-Type", "application/json");
        //         xhr.setRequestHeader("x-oy-username", "businesspesonaplesiranindonesia");
        //         xhr.setRequestHeader("x-api-key", "47860502-8fa8-4c73-9f2b-a06cf1cd64fc");
        //     }, success: function(data){
        //         alert(data.data);
        //         //process the JSON data etc
        //     }
        // })

        axios.get('https://api-stg.oyindonesia.com/api/payment-checkout/status?partner_tx_id='+$('#kode_booking').val()+'&send_callback=false', {
        headers: {
            // 'Authorization': `token ${access_token}`
            "Content-Type": "application/json",
            "x-oy-username": "{{ env('OY_INDONESIA_APP_USERNAME') }}",
            "x-api-key": "{{ env('OY_INDONESIA_APP_KEY') }}"
        }
        })
        .then((res) => {
            if(res.data.data.status == 'complete'){
                // document.getElementById('frame').innerHTML = "<iframe width='400' height='800' src='https://pay-stg.oyindonesia.com/invoice/"+$('#kode_booking').val()+"'></iframe>";
                document.getElementById('alert').innerHTML = "<div role='alert' class='alert alert-success alert-dismissible fade in mb-20'>"+
                                                                "<button type='button' data-dismiss='alert' aria-label='Close' class='close'>"+
                                                                "</button>"+ "<i class='alert-icon flaticon-suntour-check'>"+"</i>"+ "PAYMENT " + res.data.data.status +
                                                            "</div>";
            $.ajax({
                type: 'GET',
                url: "{{ url('cart/status') }}"+'/'+$('#kode_booking').val(),
                // url: "{{ route('hotel.edit', ['id' => "+data+"]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    // alert(result.hotel.id);
                    console.log(result.status);
                }
            })
            }else if(res.data.data.status == 'created'){
                // document.getElementById('frame').innerHTML = "<iframe width='400' height='800' src='https://pay-stg.oyindonesia.com/invoice/"+$('#kode_booking').val()+"'></iframe>";
                document.getElementById('alert').innerHTML = "<div role='alert' class='alert alert-info alert-dismissible fade in mb-20'>"+
                                                                "<button type='button' data-dismiss='alert' aria-label='Close' class='close'>"+
                                                                "</button>"+ "<i class='alert-icon flaticon-circle'>"+"</i>"+ "PAYMENT " + res.data.data.status +
                                                            "</div>";
            }
            // alert(res.data.data.amount);
            console.log(res.data)
        })
            .catch((error) => {
            console.error(error)
        })
    </script>
@endsection