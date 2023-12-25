@extends('layouts.frontend_5.app')
@section('title')
    {{ $bromo->title }}
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
    <form action="{{ route('frontend.bromo.checkout',['id' => $bromo->id, 'tanggal' => \Carbon\Carbon::create($bromo->tanggal)->format('Y-m-d')]) }}" id="form-form" method="post" enctype="multipart/form-data">
        @csrf
        <section class="trending pt-6 pb-0 bg-lgrey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb-4">
                        <div class="payment-book">
                            <div class="booking-box">
                                <div class="customer-information mb-4">
                                    <h3 class="border-b pb-2 mb-2">Booking Reservation</h3>
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
                                                <input type="text" name="phone" placeholder="No. Telp/Whatsapp" required>
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
                                                <label for="">Note: </label>
                                                <label>Jumlah Team (Isi <b>"0"</b> bila tidak memiliki anggota)</label>
                                                <input id="" type="text" name="qty_team" placeholder=""
                                                    value="" class="input-text jumlah" required>
                                                <input type="hidden" name="qty" id="qty">
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
                                    @if (env('PAYMENT_MANUAL') == true)
                                    <div class="booking-terms border-t pt-3 mt-3">
                                        <h3 class="border-b pb-2 mb-2">Payment Methode</h3>
                                        <select name="" id="">
                                            <option value="">-- Change Payment --</option>
                                            <option value="BRI">Bank BRI</option>
                                        </select>
                                    </div>
                                    @endif
                                    <div class="booking-terms border-t pt-3 mt-3">
                                        <div class="d-lg-flex align-items-center">
                                            <div class="form-group mb-2 w-75">
                                                <input type="checkbox"> By continuing, you agree to the <a href="#">Terms
                                                    and Conditions.</a>
                                            </div>
                                            <a href="javascript:void()" onclick="event.preventDefault(); document.getElementById('form-form').submit();" class="nir-btn float-lg-end w-25">CONFIRM BOOKING</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 ps-ld-4">
                        <div class="sidebar-sticky">
                            {{-- <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>{{ $travelling->title }}</td>
                                            <td class="theme2">Rp.
                                                {{ number_format($travelling->current_price - ($travelling->discount / 100) * $travelling->current_price, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Order</td>
                                            <td class="theme2"><span id="jumlah_order"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Diskon</td>
                                            <td class="theme2"><span id="jumlah_diskon"></span></td>
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
                            </div> --}}
                            <div class="trend-check border-b pb-2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="trend-check-item bg-grey rounded p-3 mb-2">
                                            <p class="mb-0">Booking Date</p>
                                            <h6 class="mb-0">
                                                {{ \Carbon\Carbon::create($bromo->tanggal)->isoFormat('dddd, D MMMM YYYY H:mm') . ' WIB' }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                                <h4>Your Price Summary</h4>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>{{ $bromo->title }}</td>
                                            <td class="theme2">{{ 'Rp. ' . number_format($bromo->price, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Travellers</td>
                                            <td class="theme2"><span id="jumlah_order"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <td class="theme2"><span id="jumlah_diskon"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Booking Fee</td>
                                            <td class="theme2"><span id="booking_fee"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td class="theme2"><span id="subTotal"></span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-title">
                                        <tr>
                                            <th class="font-weight-bold white">Amount</th>
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
    </form>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.jumlah').change(function() {
            // if (($('.jumlah').val() + parseInt(1)) > $('#detail_maksimal').val()) {
            //     alert('Jumlah anggota maksimal ' + $('#detail_maksimal').val() + ' orang');
            //     $('.jumlah').val('');
            //     document.getElementById('jumlah_diskon').innerHTML = '0 %';
            // }
            if ('{{ $bromo->category_trip }}' == 'Publik') {
                var price = {{ $bromo->price - ($bromo->discount / 100) * $bromo->price }};
                if ($('.jumlah').val() == 0) {
                    var penjumlahan = 1 * price;
                    var jumlah = 1;
                } else {
                    var jumlah = parseInt($('.jumlah').val()) + parseInt(1);
                    var penjumlahan = jumlah * price;
                }

                $('#qty').val(jumlah);

                var bilangan = penjumlahan;

                var number_string = bilangan.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                document.getElementById('jumlah_diskon').innerHTML = '{{ $bromo->discount }} %';
                document.getElementById('booking_fee').innerHTML = 'Free';
                document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
                document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
                // $('#order_total').val(penjumlahan);
            } else if ('{{ $bromo->category_trip }}' == 'Private') {
                var price = {{ $bromo->price - ($bromo->discount / 100) * $bromo->price }};
                if ($('.jumlah').val() == 0) {
                    var penjumlahan = 1 * price;
                    var jumlah = 1;
                } else {
                    var jumlah = parseInt($('.jumlah').val()) + parseInt(1);
                    var penjumlahan = jumlah * price;
                }

                $('#qty').val(jumlah);

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
                document.getElementById('booking_fee').innerHTML = 'Free';
                document.getElementById('jumlah_order').innerHTML = jumlah + ' pax';
                document.getElementById('subTotal').innerHTML = 'Rp. ' + rupiah;
                document.getElementById('orderTotal').innerHTML = 'Rp. ' + rupiah;
            }
        });

        $(document).ready(function() {
            var i = 1;
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
