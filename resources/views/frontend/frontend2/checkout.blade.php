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
                    <!-- step one form html start -->
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
                                        <label>Confirm Email*</label>
                                        <input type="email" class="form-control" name="email_booking">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone*</label>
                                        <input type="text" class="form-control" name="lastname_booking">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking-content">
                            <div class="form-title">
                                <span>2</span>
                                <h3>Payment Information</h3>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name on card*</label>
                                        <input type="text" class="form-control" name="firstname_booking">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Card number*</label>
                                                <input type="text" id="card_number" name="card_number"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="assets/images/cards.png" alt="Cards">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Expiration date*</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="expire_month" name="expire_month"
                                                            class="form-control" placeholder="MM">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="expire_year" name="expire_year"
                                                            class="form-control" placeholder="Year">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Security code*</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text" id="ccv" name="ccv" class="form-control"
                                                                placeholder="CCV">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <img src="assets/images/icon_ccv.gif" alt="ccv"><small>Last 3
                                                            digits</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="info-content">
                                <h4>Or checkout with Paypal</h4>
                                <p>Lorem ipsum dolor sit amet, vim id accusata sensibus, id ridens quaeque qui. Ne qui
                                    vocent ornatus molestie, reque fierent dissentiunt mel ea.</p>
                                <a href="#">
                                    <img src="assets/images/paypal_bt.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="booking-content">
                            <div class="form-title">
                                <span>3</span>
                                <h3>Billing Address</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Country*</label>
                                        <select class="form-control" name="country" id="country">
                                            <option value="" selected="">Select your country</option>
                                            <option value="Europe">Europe</option>
                                            <option value="United states">United states</option>
                                            <option value="Asia">Asia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Street line 1*</label>
                                        <input type="text" name="street_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Street line 2</label>
                                        <input type="text" name="street_2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>City*</label>
                                        <input type="text" name="city_booking">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label>State*</label>
                                        <input type="text" name="state_booking">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label>Postal code*</label>
                                        <input type="text" name="postal_code">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Additional Information</label>
                                        <textarea rows="6"
                                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--End row -->
                        </div>
                        <div class="form-policy">
                            <h3>Cancellation policy</h3>
                            <div class="form-group">
                                <label class="checkbox-list">
                                    <input type="checkbox" name="s">
                                    <span class="custom-checkbox"></span>
                                    I accept terms and conditions and general policy.
                                </label>
                            </div>
                            <a href="#" class="button-primary">Book Now</a>
                        </div>
                    </div>
                    <!-- step one form html end -->
                </div>
                <div class="col-lg-6">
                    <aside class="sidebar">
                        <div class="widget-bg widget-table-summary">
                            <h4 class="bg-title">Ringkasan</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>{{ $data['item_detail'] }} </strong>
                                        </td>
                                        <td class="text-right">
                                            IDR {{ number_format($data['price'],0,",",".") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Dedicated tour guide</strong>
                                        </td>
                                        <td class="text-right">
                                            $34
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Insurance</strong>
                                        </td>
                                        <td class="text-right">
                                            $34
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>tax</strong>
                                        </td>
                                        <td class="text-right">
                                            13%
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>
                                            <strong>Total cost</strong>
                                        </td>
                                        <td class="text-right">
                                            <strong>IDR {{ number_format($data['price'],0,",",".") }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="widget-bg widget-support-wrap">
                            <div class="icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div class="support-content">
                                <h5>HELP AND SUPPORT</h5>
                                <a href="telto:12345678" class="phone">+11 234 889 00</a>
                                <small>Monday to Friday 9.00am - 7.30pm</small>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
