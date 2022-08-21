@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('title')
    Tracking Order
@endsection
@section('content')
<section class="page-section pt-90 pb-80 relative" style="background: #ff9019">
    <div class="container">
      <div class="call-out-box clearfix with-icon">
        <div class="row call-out-wrap">
          <div class="col-md-5">
            {{-- <h6 class="title-section-top gray font-4">subscribe today</h6> --}}
            <h2 class="title-section alt-2"><span>Tracking</span> Order</h2>
            {{-- <i class="flaticon-suntour-email call-out-icon"></i> --}}
          </div>
          <div class="col-md-7">
            <form action="javascript:void()" method="post" class="form contact-form mt-10">
              <div class="input-container">
                <input type="text" placeholder="Kode Tracking" value="" name="kode_tracking" class="newsletter-field mb-0 form-row"><i class="flaticon-suntour-search icon-left"></i>
                <button type="submit" class="subscribe-submit"><i class="flaticon-suntour-arrow icon-right"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
