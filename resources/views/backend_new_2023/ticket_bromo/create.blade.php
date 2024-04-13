@extends('layouts.backend_new_2023.master')
@section('title')
    Order Ticket Bromo
@endsection
@section('css')
<link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @yield('title')
        @endslot
        @slot('title')
            @yield('title')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form method="post" id="upload-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Booking Date</label>
                        <div class="col-md-9">
                            <select name="booking_date_id" class="form-control booking_date" id="">
                                <option value="">-- Select Booking Date--</option>
                                @foreach ($bromos as $key_bromo => $bromo)
                                @php
                                    $schedule_bromo = strtotime($bromo->tanggal);
                                    $date_now = strtotime(\Carbon\Carbon::now());
                                @endphp
                                @if ($schedule_bromo >= $date_now)
                                <option value="{{ $bromo['id'] }}">{{ $bromo['tanggal'] . ' - ' . $bromo['category_trip'] }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Packet Order</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="packet_order">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Category Trip</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="category_trip">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Quota</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="quota">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Meeting Point</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="meeting_point">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Destination</label>
                        <div class="col-md-9">
                            <ul id="destination"></ul>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Include</label>
                        <div class="col-md-9">
                            <ul id="include"></ul>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Exclude</label>
                        <div class="col-md-9">
                            <ul id="exclude"></ul>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Price</label>
                        <div class="col-md-9">
                            <div id="price"></div>
                        </div>
                    </div>
                    <hr>
                    <div style="font-weight: bold; font-size: 16pt">Booking Reservation</div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="col-form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">No.Telp / Whatsapp</label>
                            <input type="text" name="phone" class="form-control" placeholder="No. Telp / Whatsapp" required>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Address</label>
                            <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label">Number of Teams <br> (Enter <b>0</b> if you don't have members)</label>
                            <input type="text" name="qty_team" class="form-control jumlah" placeholder="Team" required>
                        </div>
                    </div>
                    <div style="font-weight: bold; font-size: 16pt">Member Team</div>
                    <table class="table" id="dynamic_field">
                    </table>
                    <hr>
                    <div style="font-weight: bold; font-size: 16pt">Payment Method</div>
                    <br>
                    <div class="row mb-3">
                        @foreach ($channels as $channel)
                        <div>
                            <input type="radio" name="method" value="{{ $channel->code }}" id="{{ $channel->code }}">
                            <label for="{{ $channel->code }}">{{ $channel->name }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Your Price Summary</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td id="detail_packet_order"></td>
                                <td id="detail_price"></td>
                            </tr>
                            <tr>
                                <td>Number of Travellers</td>
                                <td id="jumlah_order"></td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td id="jumlah_diskon"></td>
                            </tr>
                            <tr>
                                <td>Booking Fee</td>
                                <td id="booking_fee"></td>
                            </tr>
                            <tr>
                                <td style="background-color: #074173; color: white; font-weight: bold">Total</td>
                                <td style="font-weight: bold" id="subTotal"></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="subTotal" id="allTotal">
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $('.booking_date').on('change',function(){
            // alert($('.booking_date').val());
            $.ajax({
                type: 'GET',
                url: "{{ url('b/ticket_bromo/detail_bromo/') }}"+"/"+$('.booking_date').val(),
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    $('.modalloading').modal('show');
                },
                success: function(result){
                    if (result.success == true) {
                        $('#packet_order').val(result.data.title);
                        $('#quota').val(result.data.quota);
                        $('#meeting_point').val(result.data.meeting_point);
                        $('#category_trip').val(result.data.category_trip);

                        localStorage.setItem("quota", result.data.quota);
                        localStorage.setItem("price", result.data.price);
                        localStorage.setItem("discount", result.data.discount);
                        localStorage.setItem("max_quota", result.data.max_quota);

                        var bilangan = result.data.price;

                        var number_string = bilangan.toString(),
                            sisa = number_string.length % 3,
                            rupiah = number_string.substr(0, sisa),
                            ribuan = number_string.substr(sisa).match(/\d{3}/g);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        var destination = result.data.destination;
                        var txt_destination = '';
                        destination.forEach(hasil_destination);
                        function hasil_destination(value,index)
                        {
                            txt_destination = txt_destination+"<li>"+value.destination+"</li>";
                        }
                        document.getElementById('destination').innerHTML = txt_destination;

                        var include = result.data.include;
                        var txt_include = '';
                        include.forEach(hasil_include);
                        function hasil_include(value,index)
                        {
                            txt_include = txt_include+"<li>"+value.include+"</li>";
                        }
                        document.getElementById('include').innerHTML = txt_include;

                        var exclude = result.data.exclude;
                        var txt_exclude = '';
                        exclude.forEach(hasil_exclude);
                        function hasil_exclude(value,index)
                        {
                            txt_exclude = txt_exclude+"<li>"+value.exclude+"</li>";
                        }
                        document.getElementById('exclude').innerHTML = txt_exclude;

                        var include = result.data.include;
                        var txt_include = '';
                        include.forEach(hasil_include);
                        function hasil_include(value,index)
                        {
                            txt_include = txt_include+"<li>"+value.include+"</li>";
                        }
                        document.getElementById('include').innerHTML = txt_include;

                        document.getElementById('price').innerHTML = 'Rp. ' + rupiah;
                        document.getElementById('detail_packet_order').innerHTML = result.data.title;
                        document.getElementById('detail_price').innerHTML = 'Rp. ' + rupiah;
                        // var dataHotel = result.data;
                        // var txt = "";
                        // dataHotel.forEach(hasil_hotel);
                        // function hasil_hotel(value, index)
                        // {
                        //     txt = txt+"<tr>";
                        //     txt = txt+  "<td class='text-center'>"+value.no+"</td>";
                        //     txt = txt+  "<td class='text-center'>"+value.nama_hotel+"</td>";
                        //     txt = txt+  "<td class='text-center'>"+value.lokasi+"</td>";
                        //     txt = txt+  "<td class='text-center'>"+value.jumlah_malam+"</td>";
                        //     txt = txt+  "<td class='text-center'>"+value.check_in+"</td>";
                        //     txt = txt+  "<td class='text-center'>"+
                        //                     "<div class='btn-group'>"+
                        //                         "<button type='button' onclick='editHotel(`"+value.id+"`)' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></button>"+
                        //                         "<button type='button' onclick='deleteHotel(`"+value.id+"`)' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>"
                        //                     "</div>"+
                        //                 +"</td>";
                        //     txt = txt+"</tr>";
                        // }
                        // document.getElementById('daftar_hotel').innerHTML = txt;
                        $('.modalloading').modal('hide');
                    }else{
                        // document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                        //                                                         "<td colspan='6'>Data Hotel Belum Tersedia</td>"+
                        //                                                     "</tr>";
                        $('.modalloading').modal('hide');
                    }
                },
                error: function (request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('.modalloading').modal('hide');
                }
            })
        });

        $('.jumlah').change(function(){
            if ($('#category_trip').val() == 'Open Trip') {
                var price = localStorage.getItem('price');
                // alert(price);
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

                document.getElementById('jumlah_diskon').innerHTML = localStorage.getItem('discount')+'%';
                document.getElementById('booking_fee').innerHTML = 'Free';
                document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
                document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                $('#allTotal').val(penjumlahan);

            }else if($('#category_trip').val() == 'Private') {
                if (($('.jumlah').val() + parseInt(1)) > localStorage.getItem('max_quota')) {
                    alert('Jumlah anggota maksimal ' + localStorage.getItem('max_quota') + ' orang');
                    $('.jumlah').val('');
                }else{
                    var price = (localStorage.getItem('price') - (localStorage.getItem('discount')/100) * localStorage.getItem('price'));
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

                    document.getElementById('jumlah_diskon').innerHTML = localStorage.getItem('discount')+' %';
                    document.getElementById('booking_fee').innerHTML = 'Free';
                    document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
                    document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                    $('#allTotal').val(price);
                }
            }
        });

        $(document).ready(function() {
            var i = 1;
            $('.jumlah').change(function() {
                for (let index = 1; index <= $('.jumlah').val(); index++) {
                    $('#dynamic_field').append('<tr id="row' + index +
                        '" class="dynamic-added"><td><input type="text" name="nama_anggota[]" placeholder="Nama Anggota ' +
                        index +
                        '" class="form-control name_list" required autoComplete="off"></td><td><button type="button" name="remove" id="' +
                        index +
                        '" class="btn btn_remove"><i class="fa fa-times"></i></button></td></tr>'
                    );
                }
            })

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                i--;
            });
        });

        $('#upload-form').submit(function(e) {
            // window.location.href="{{ url('/') }}";
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.ticket_bromo.buy') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('.modalloading').modal('show');
                },
                success: (result) => {
                    if(result.success != false){
                        toastr["success"](result.message_content);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        // $('.modalloading').modal('hide');
                        setTimeout(() => {
                            window.location.href=result.link;
                        }, 5000);
                    }else{
                        toastr["error"](result.error);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('.modalloading').modal('hide');
                    }
                },
                error: function (request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('.modalloading').modal('hide');
                }
            });
        });
    </script>
@endsection
