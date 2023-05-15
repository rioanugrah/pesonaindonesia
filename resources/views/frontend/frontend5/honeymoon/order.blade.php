@extends('layouts.frontend_5.app')
@section('title')
    {{ $honeymoon->nama_paket }} - Order
@endsection

@auth
    <?php
    $user = auth()->user()->name;
    $name = explode(' ', $user);
    $first_name = $name[0];
    $last_name = $name[1];
    ?>
@else
    <?php
    $user = null;
    $first_name = '';
    $last_name = '';
    ?>
@endauth

@section('content')
    <section class="trending pt-6 pb-0 bg-lgrey">
        <form id="form-form" action="{{ route('frontend.honeymoon_buy',['slug'=>$honeymoon->slug]) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <h3 class="border-b pb-2 mb-2">Contact Information</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Male Data</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name_pria" placeholder="First Name" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name_pria" placeholder="Last Name" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Women Data</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name_wanita" placeholder="First Name" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name_wanita" placeholder="Last Name" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <h4>Email</h4>
                                        <input type="email" name="email" placeholder="Email" id="">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <h4>No.Telp / Whatsapp</h4>
                                        <input type="text" name="no_telp" placeholder="No.Telp / Whatsapp" id="">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <h4>Address</h4>
                                        <textarea name="alamat" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <h3 class="border-b pb-2 mb-2 mt-4">Honeymoon Information</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label>Wedding Date</label>
                                            <input type="date" name="wedding_date" id="">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Departure Date</label>
                                            <input type="date" name="departure_date" id="">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Return Date</label>
                                            <input type="date" name="return_date" id="">
                                        </div>
                                    </div>
                                </div>
                                {{-- <button type="submit" onclick="event.preventDefault(); document.getElementById('form-form').submit();" class="nir-btn float-lg-end w-25">BUY NOW</button> --}}
                            </div>
                            <div class="customer-information card-information">
                                <h3 class="border-b pb-2 mb-2">Metode Pembayaran</h3>

                                <div class="trending-topic-main">
                                    <ul class="nav nav-tabs nav-pills nav-fill w-50" id="postsTab1" role="tablist">
                                        <li class="nav-item m-0" role="presentation">
                                            <button aria-controls="bank" aria-selected="false" class="nav-link active"
                                                data-bs-target="#bank" data-bs-toggle="tab" id="bank-tab"
                                                role="tab" type="button">Digital Payment</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="postsTabContent1">
                                        <div aria-labelledby="bank-tab" class="tab-pane fade active show"
                                            id="bank" role="tabpanel">
                                            <div>
                                                <input type="radio" name="payment_method" value="002"
                                                    data-order_button_text="" class="input-radio">
                                                <label for="payment_method_bacs"><img
                                                        src="{{ asset('frontend/assets4/') . '/img/logo_payment/bri.webp' }}"
                                                        alt="BRI" width="200" srcset=""></label>
                                            </div>
                                            <div>
                                                <input type="radio" name="payment_method" value="009"
                                                    data-order_button_text="" class="input-radio">
                                                <label for="payment_method_bacs"><img
                                                        src="{{ asset('frontend/assets4/') . '/img/logo_payment/bni.webp' }}"
                                                        alt="BNI" width="200" srcset=""></label>
                                            </div>
                                            <div>
                                                <input type="radio" name="payment_method" value="008"
                                                    data-order_button_text="" class="input-radio">
                                                <label for="payment_method_bacs"><img
                                                        src="{{ asset('frontend/assets4/') . '/img/logo_payment/mandiri.webp' }}"
                                                        alt="Mandiri" width="200" srcset=""></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-terms border-t pt-3 mt-3">
                                    <div class="d-lg-flex align-items-center">
                                        <div class="form-group mb-2 w-75">
                                            <input type="checkbox"> Dengan melanjutkan, Anda menyetujui Syarat dan Ketentuan.
                                        </div>
                                        {{-- <button type="submit">CONFIRM BOOKING</button> --}}
                                        <a href="javascript:void()" onclick="event.preventDefault(); document.getElementById('form-form').submit();" class="nir-btn float-lg-end w-25">BUY NOW</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-4 ps-ld-4">
                    <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                        <h4>Price Summary</h4>
                        <table>
                            <tbody>
                                <tr>
                                    <td>{{ $honeymoon->nama_paket }}</td>
                                    <td class="theme2">Rp. {{ number_format($honeymoon->price,0,',','.') }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Orders</td>
                                    <td class="theme2">1x</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-title">
                                <tr>
                                    <th class="font-weight-bold white">Total Price</th>
                                    <th class="font-weight-bold white">Rp. {{ number_format($honeymoon->price,0,',','.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
@endsection