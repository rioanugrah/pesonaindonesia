@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>
@section('title')
    {{ $travelling->nama_travelling }} - Order
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
    {{-- <section class="breadcrumb-main pb-20 pt-14"
        style="background-image: url({{ asset('frontend/assets4/img/paket/list/' . $travelling->images) }});">
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
    </section> --}}
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <form id="form-form" action="{{ route('frontend.travelling.checkout',['id' => $travelling->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="customer-information mb-4">
                                    <h3 class="border-b pb-2 mb-2">Biodata Travelling</h3>
                                    <input type="hidden" id="detail_maksimal" value="{{ $travelling->jumlah_paket }}">
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
                                            <a href="javascript:void()" onclick="event.preventDefault(); document.getElementById('form-form').submit();" class="nir-btn float-lg-end w-25">CONFIRM BOOKING</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mb-4 ps-ld-4">
                    <div class="sidebar-sticky">
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Detail Pemesanan</h4>
                            <div class="trend-full border-b pb-2 mb-2">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="trend-item2 rounded">
                                            <a href="destination-single1.html"
                                                style="background-image: url({{ asset('frontend/assets_new/images/travelling/' . $travelling->images) }});"></a>
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
                                                    href="grid-leftfilter.html">{{ $travelling->nama_travelling }}</a></h5>
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
                                        <td>{{ $travelling->nama_travelling }}</td>
                                        <td class="theme2">Rp.
                                            {{ number_format($travelling->price - ($travelling->diskon / 100) * $travelling->price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Order</td>
                                        <td class="theme2"><span id="jumlah_order"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Diskon</td>
                                        <td class="theme2"><span id="jumlah_diskon">0 %</span></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Pemesanan</td>
                                        <td class="theme2">Gratis</td>
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
                        <form id="cek_kode" method="post">
                            @csrf
                            <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3">
                                <h4>Kode Promo?</h4>
                                <input type="text" name="kode_promo" id="kode_promo">
                                {{-- <input type="submit" class="nir-btn-black mt-2" value="Apply"> --}}
                                <button type="submit" class="nir-btn-black mt-2">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        $('.jumlah').change(function() {
            // if ($('.jumlah').val() > $('#detail_maksimal').val()) {
            if (($('.jumlah').val() + parseInt(1)) > $('#detail_maksimal').val()) {
                alert('Jumlah anggota maksimal ' + $('#detail_maksimal').val() + ' orang');
                $('.jumlah').val('');
                document.getElementById('jumlah_diskon').innerHTML = '0 %';
            } else {
                if ({{ $travelling->kategori_paket_id }} == 2) {
                    var price = {{ $travelling->price - ($travelling->diskon / 100) * $travelling->price }};
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

                    document.getElementById('jumlah_diskon').innerHTML = '0 %';
                    document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
                    document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                    document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
                    $('#order_total').val(penjumlahan);
                } else if ({{ $travelling->kategori_paket_id }} == 1) {
                    var price = {{ $travelling->price - ($travelling->diskon / 100) * $travelling->price }};
                    if ($('.jumlah').val() == 0) {
                        var penjumlahan = 1 * price;
                        var jumlah = 1;
                    } else {
                        var jumlah = parseInt($('.jumlah').val()) + parseInt(1);
                        var penjumlahan = jumlah * price;
                    }

                    var bilangan = price;

                    var number_string = bilangan.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    document.getElementById('jumlah_diskon').innerHTML = '0 %';
                    document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
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

        });

        $('#cek_kode').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('cek_kode',['id' => $travelling->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success != false) {
                        if({{ $travelling->diskon }} != 0){
                            alert('Voucher Tidak Bisa Digunakan');
                            $('#kode_promo').val('');
                        }else{
                            var diskon = result.data.discount;
                            var hitung_diskon = $('#order_total').val() - (diskon / 100) * $('#order_total').val();
                            
                            var bilangan = hitung_diskon;

                            var number_string = bilangan.toString(),
                                sisa = number_string.length % 3,
                                rupiah = number_string.substr(0, sisa),
                                ribuan = number_string.substr(sisa).match(/\d{3}/g);

                            if (ribuan) {
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            $('#order_total').val(hitung_diskon);
                            document.getElementById('jumlah_diskon').innerHTML = result.data.discount + ' %';
                            document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                            document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
                            // $('#order_total').val() - (diskon / 100) * $('#order_total').val();
                        }


                        // if(result.data.ammount > 0){

                        // }

                        // if(result.data.limit >= result.data.used_limit ){
                        //     alert('Voucher Telah Habis');
                        // }else{

                        // }
                        // iziToast.success({
                        //     title: result.message_title,
                        //     message: result.message_content
                        // });
                        // this.reset();
                        // table.ajax.reload();
                    } else {
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function(request, status, error) {
                    // iziToast.error({
                    //     title: 'Error',
                    //     message: error,
                    // });
                }
            });
        });
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

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                i--;
            });
        })
    </script>
@endsection
