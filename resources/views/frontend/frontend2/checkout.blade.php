@extends('layouts.frontend_3.app')

@section('title')
    Checkout
@endsection

@section('content')
    <section class="inner-banner-wrap">
        <div class="inner-baner-container"
            style="background-image: url({{ asset('frontend/assets3/images/wallpaper/news-6.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Booking</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <div class="step-section booking-section">
        <div class="container">
            <div class="step-link-wrap">
                <div class="step-item active">
                    Your cart
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item active">
                    Your Details
                    <a href="#" class="step-icon"></a>
                </div>
                <div class="step-item">
                    Finish
                    <a href="#" class="step-icon"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 right-sidebar">
                {{-- <form action="{{ route('payment') }}" method="post" enctype="multipart/form-data"> --}}
                <form action="{{ route('payment') }}" method="post">
                    @csrf
                    <div class="booking-form-wrap">
                        <div class="booking-content">
                            <div class="form-title">
                                <span>1</span>
                                <h3>Your Details</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First name*</label>
                                        <input type="text" class="form-control" name="firstname_booking">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last name*</label>
                                        <input type="text" class="form-control" name="lastname_booking">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" name="email_booking">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone*</label>
                                        <input type="text" class="form-control" name="phone_booking">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking-content">
                            <div class="form-title">
                                <span>2</span>
                                <h3>Agreement</h3>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-list">
                                    <input type="checkbox" name="s">
                                    <span class="custom-checkbox"></span>
                                    I accept terms and conditions and general policy.
                                </label>
                            </div>
                            <button type="submit" class="button-primary">Book Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <aside class="sidebar">
                        <div class="widget-bg widget-table-summary">
                            <h4 class="bg-title">Ringkasan</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><strong>Kode Booking : {{ $data['kode_booking'] }}</strong></td>
                                        <input type="hidden" name="kode_booking" value="{{ $data['kode_booking'] }}">
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>{{ $data['qty'] }}x {{ $data['item_detail'] }} </strong>
                                            <input type="hidden" name="qty" value="{{ $data['qty'] }}">
                                            <input type="hidden" name="description" value="{{ $data['item_detail'] }}">
                                            <input type="hidden" name="date_purchase" value="{{ $data['created_at'] }}">
                                        </td>
                                        <td class="text-right">
                                            IDR {{ number_format($data['price'],0,",",".") }}
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>
                                            <strong>Total cost</strong>
                                        </td>
                                        <td class="text-right">
                                            <strong>IDR {{ number_format($data['price'],0,",",".") }}</strong>
                                            <input type="hidden" name="amount" value="{{ $data['price'] }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </aside>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- {{ dd(auth()->user()->id_unique) }} --}}
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#upload-form').click(function(e) {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            // document.write(today);

            var data = JSON.stringify({
                "partner_tx_id":"H-49220220103",
                "description":"",
                "notes":"",
                "sender_name":"Rio Anugrah",
                "amount":"20000",
                "email":"rioanugrah999@gmail.com",
                "phone_number":"082233684670",
                "is_open":false,
                "step":"input-amount",
                "include_admin_fee":true,
                "list_disabled_payment_methods":"",
                "list_enabled_banks":"",
                "va_display_name":"Display Name on VA",
                "expiration": "{{ \Carbon\Carbon::now()->addHour() }}",
                "due_date": today
                });

            var xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            xhr.addEventListener("readystatechange", function() {
            if(this.readyState === 4) {
                console.log(this.responseText);
            }
            });

            xhr.open("POST", "https://api-stg.oyindonesia.com/api/payment-checkout/create-v2");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("x-oy-username", "{{ config('app.oy_username') }}");
            xhr.setRequestHeader("x-api-key", "{{ config('app.oy_api_key') }}");

            xhr.send(data);
        });
    </script>
@endsection