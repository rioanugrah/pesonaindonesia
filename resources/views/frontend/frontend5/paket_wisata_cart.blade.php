@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>
@section('title')
    {{ $paket_lists->nama_paket }} - Order
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
    <section class="breadcrumb-main pb-20 pt-14"
        style="background-image: url({{ asset('frontend/assets4/img/paket/list/' . $paket_lists->images) }});">
        <div class="section-shape section-shape1 top-inherit bottom-0"
            style="background-image: url({{ $asset }}/images/shape8.png);"></div>
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1 class="mb-3">Booking</h1>
                    <nav aria-label="breadcrumb" class="d-block">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <form id="form-form" action="{{ route('frontend.paket.checkout',['slug' => $pakets->slug, 'id' => $paket_lists->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="customer-information mb-4">
                                    <h3 class="border-b pb-2 mb-2">Traveller Information</h3>
                                    <input type="hidden" id="detail_maksimal" value="{{ $paket_lists->jumlah_paket }}">
                                    {{-- <h5>Let us know who you are</h5> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" value="{{ $first_name }}"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" value="{{ $last_name }}"
                                                    placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email Address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>No. Telp/Whatsapp</label>
                                                <input type="text" name="phone" placeholder="No. Telp/Whatsapp"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Tanggal Berangkat</label>
                                                <input type="date" name="tanggal_berangkat" class="form-control"
                                                    placeholder="" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Alamat</label>
                                                <textarea name="alamat" id="" cols="30" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Jumlah Team (Isi <b>"0"</b> bila tidak memiliki anggota)</label>
                                                <input id="" type="text" name="qty" placeholder=""
                                                    value="" class="input-text jumlah" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Data Anggota</label>
                                                <div id="survey_options">
                                                    <table class="table" id="dynamic_field">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="orderTotal" id="order_total">
                                <div class="customer-information card-information">
                                    <h3 class="border-b pb-2 mb-2">Metode Pembayaran</h3>

                                    <div class="trending-topic-main">
                                        <!-- tab navs -->
                                        <ul class="nav nav-tabs nav-pills nav-fill w-50" id="postsTab1" role="tablist">
                                            <li class="nav-item m-0" role="presentation">
                                                <button aria-controls="bank" aria-selected="false" class="nav-link active"
                                                    data-bs-target="#bank" data-bs-toggle="tab" id="bank-tab"
                                                    role="tab" type="button">Digital Payment</button>
                                            </li>
                                        </ul>
                                        <!-- tab contents -->
                                        <div class="tab-content" id="postsTabContent1">
                                            <!-- paypal posts -->
                                            <div aria-labelledby="bank-tab" class="tab-pane fade active show"
                                                id="bank" role="tabpanel">
                                                {{-- <div class="paypal-card">
                                                <h5 class="mb-2 border-b pb-2"><i class="fab fa-paypal"></i> Paypal</h5>
                                                <ul class="">
                                                    <li class="d-block">To make the payment process secure and complete you will be redirected to Paypal Website.</li>
                                                    <li class="d-block">
                                                        <a href="" class="theme">Checkout via Paypal <i class="fa fa-long-arrow-alt-right"></i></a>
                                                    </li>
                                                    <li class="d-block">The total Amount you will be charged is: <span class="fw-bold theme">$ 245.50</span></li>
                                                </ul>
                                            </div> --}}
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
                                                <input type="checkbox"> By continuing, you agree to the <a
                                                    href="#">Terms and Conditions.</a>
                                            </div>
                                            <a href="javascript:void()" onclick="event.preventDefault(); document.getElementById('form-form').submit();" class="nir-btn float-lg-end w-25">CONFIRM BOOKING</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 ps-ld-4">
                    <div class="sidebar-sticky">
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Detail Pemesanan</h4>
                            <div class="trend-full border-b pb-2 mb-2">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="trend-item2 rounded">
                                            <a href="destination-single1.html"
                                                style="background-image: url({{ asset('frontend/assets4/img/paket/list/' . $paket_lists->images) }});"></a>
                                            <div class="color-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 ps-0">
                                        <div class="trend-content position-relative">
                                            <div class="rating mb-1">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <small>5 Reviews</small>
                                            </div>
                                            <h5 class="mb-1"><a
                                                    href="grid-leftfilter.html">{{ $paket_lists->nama_paket }}</a></h5>
                                            <h6 class="theme mb-0"><i class="icon-location-pin"></i> Indonesia</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Ringkasan Harga</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>{{ $paket_lists->nama_paket }}</td>
                                        <td class="theme2">Rp.
                                            {{ number_format($paket_lists->price - ($paket_lists->diskon / 100) * $paket_lists->price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Order</td>
                                        <td class="theme2"><span id="jumlah_order"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Booking Fee</td>
                                        <td class="theme2">Free</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="theme2"><span id="subTotal"></span></td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-title">
                                    <tr>
                                        <th class="font-weight-bold white">Total Harga</th>
                                        <th class="font-weight-bold white"><span id="orderTotal"></span></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('.jumlah').change(function() {
            if ($('.jumlah').val() > $('#detail_maksimal').val()) {
                alert('Jumlah anggota maksimal ' + $('#detail_maksimal').val() + ' orang');
                $('.jumlah').val('');
            } else {
                if ({{ $paket_lists->kategori_paket_id }} == 2) {
                    var price = {{ $paket_lists->price - ($paket_lists->diskon / 100) * $paket_lists->price }};
                    if ($('.jumlah').val() == 0) {
                        var penjumlahan = 1 * price;
                        var jumlah = 1;
                    } else {
                        var jumlah = parseInt($('.jumlah').val()) + parseInt(1);
                        var penjumlahan = jumlah * price;
                    }

                    var bilangan = penjumlahan;

                    var number_string = bilangan.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
                    document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                    document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
                    $('#order_total').val(penjumlahan);
                } else if ({{ $paket_lists->kategori_paket_id }} == 1) {
                    // var price = {{ $paket_lists->price }};
                    var price = {{ $paket_lists->price - ($paket_lists->diskon / 100) * $paket_lists->price }};

                    var bilangan = price;

                    var number_string = bilangan.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    document.getElementById('jumlah_order').innerHTML = ($('.jumlah').val() + parseInt(1)) + ' pax';
                    document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                    document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
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
        $(document).ready(function() {
            var i = 1;
            // $('#add').click(function(){  
            //     if(i < $('.jumlah').val()){
            //         $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota '+i+'" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="cws-button full-width alt btn_remove">X</button></td></tr>');  
            //         i++;  
            //     }
            // });

            $('.jumlah').change(function() {
                for (let index = 1; index <= $('.jumlah').val(); index++) {
                    $('#dynamic_field').append('<tr id="row' + index +
                        '" class="dynamic-added"><td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota ' +
                        index +
                        '" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' +
                        index +
                        '" class="cws-button full-width alt btn_remove"><i class="fa fa-times"></i></button></td></tr>'
                        );
                }
            })

            // if({{ $paket_lists->kategori_paket_id }} == 1){
            // }

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                i--;
            });
        })
    </script>
@endsection
