@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>

@section('title')
    Tracking Order
@endsection

@section('content')
    <section class="blog">
        <div class="container">
            <div class="listing-inner px-5">
                <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                    <form action="" method="post">
                        @csrf
                        <h3 class="border-b pb-2 mb-2 text-center">Cek Pemesanan</h3>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label>ID Pemesanan</label>
                                <input type="text" name="first_name" value="" placeholder="ID Pemesanan" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>No. Telepon</label>
                                <input type="text" name="first_name" value="" placeholder="No. Telepon" required>
                            </div>
                            <div class="form-group mb-2" style="text-align: center">
                                <button type="submit" class="nir-btn float-lg-end w-50">Cek Pemesanan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <form action="" method="post">
                                @csrf
                                <div class="customer-information mb-4">
                                    <h3 class="border-b pb-2 mb-2 text-center">Cek Pemesanan</h3>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label>ID Pemesanan</label>
                                            <input type="text" name="first_name" value=""
                                                placeholder="ID Pemesanan" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>No. Telepon</label>
                                            <input type="text" name="first_name" value=""
                                                placeholder="No. Telepon" required>
                                        </div>
                                        <div class="form-group mb-2" style="text-align: center">
                                            <button type="submit" class="nir-btn float-lg-end w-50">Cek Pemesanan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('js')
@endsection
