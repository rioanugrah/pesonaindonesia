@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('css')
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Payment - {{ $paket->id }}
@endsection
@section('content')
<div class="container page pt-50">
    <div class="row">
        <div class="col-md-12">
            <form method="post" id="bukti_transfer" enctype="multipart/form-data"
                class="checkout woocommerce-checkout">
                @csrf
                <input type="hidden" name="email_payment" value="{{ $pemesan->email }}" id="">
                <input type="hidden" name="nama_pembayaran" value="{{ $pemesan->first_name.' '.$pemesan->last_name }}" id="">
                <div class="col-12">
                    <h3 id="order_review_heading" class="mt-0 mb-30">Pemesanan Anda #{{ $paket->id }}</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><b>Product</b></th>
                                    <th class="product-total"><b>Total</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">{{ $paket->nama_paket }} x{{ $paket->qty }}</td>
                                    <td><span class="amount">Rp. {{ number_format($paket->price,2,",",".") }}</span></td>
                                </tr>
                                <tr>
                                    <th class="product-name"><b>Pemesan</b></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="product-name">1. {{ $pemesan->first_name.' '.$pemesan->last_name.' | '.$pemesan->email }} </td>
                                    <td></td>
                                </tr>
                                @foreach ($anggotas as $key => $anggota)
                                <tr>
                                    <td class="product-name">{{ 1+$key+1 }}. {{ $anggota->pemesan }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th><b>Order Total</b></th>
                                    <th><span class="amount">Rp. {{ number_format($paket->price,2,",",".") }}</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- @if ($status_live != false) --}}
                {{-- @if ($status_live != false) --}}
                <div class="col-12">
                    <h3 id="order_review_heading" class="mt-30 mb-30">Status Pembayaran</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">Status Pembayaran : <b>{{ $status }}</b></td>
                                    <td></td>
                                </tr>
                                @if ($status_pembayaran != 3)
                                <tr class="cart_item">
                                    <td class="product-name">Nama Bank : <b>{{ $dataPayment['bank_name'] }}</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Nomor Virtual Account : <b>{{ $dataPayment['va_number'] }}</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Nama Penerima : <b>{{ $dataPayment['username_display'] }}</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Expired Date Payment : <b>{{ date("d F Y H:i:s", substr($dataPayment['trx_expiration_time'], 0, 10)) }}</b></td>
                                    <td></td>
                                </tr>
                                @else
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <a href="{{ route('invoice.tiket_wisata',['id' => $paket->id]) }}" class="cws-button alt" target="_blank"> Invoice</a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endif
                                {{-- <tr class="cart_item">
                                    <td class="product-name">Tanggal Dibuat : <b>{{ \Carbon\Carbon::create($dataPayment['created'])->format('d F Y') }}</b></td>
                                    <td></td>
                                </tr> --}}
                                {{-- @if ($status_pembayaran != 3)
                                <tr class="cart_item">
                                    <td class="product-name">Pembayaran diverifikasi otomatis 1x24 jam</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <a href="{{ $transaksi->url }}" class="cws-button alt" target="_blank">Bayar Sekarang</a>
                                    </td>
                                    <td></td>
                                </tr>
                                @else
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <a href="{{ route('invoice.tiket_wisata',['id' => $paket->id]) }}" class="cws-button alt" target="_blank"> Invoice</a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                    @if ($status_pembayaran == 1)
                    <h3 id="order_review_heading" class="mt-30 mb-30">Cara Pembayaran</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                @if ($dataPayment['bank_name'] == 'BNI')
                                <tr class="cart_item">
                                    <td class="product-name"><b>ATM</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Masukkan kartu debit/ATM Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Masukkan PIN Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Pilih Menu Lain > Transfer</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Pilih rekening asal dan pilih rekening tujuan ke rekening BNI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Masukkan nomor Virtual Account BNI OY! Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">6. Masukkan jumlah nominal</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">7. Ikuti petunjuk hingga transaksi selesai</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name"><b>Mobile Banking</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Pilih Transfer > Antar Rekening BNI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Pilih Rekening Tujuan > Input Rekening Baru. Masukkan nomor rekening dengan nomor Virtual Account Anda - <b>{{ $dataPayment['va_number'] }}</b> dan klik Lanjut, kemudian klik Lanjut lagi.</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Masukkan jumlah pembayaran sejumlah tagihan Anda, lalu klik Lanjutkan.</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Periksa detail konfirmasi. Pastikan Nama Rekening Tujuan adalah nama penerima Anda dan nominal transaksi sudah benar. Jika benar, masukkan password transaksi dan klik Lanjut.</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Ikuti petunjuk hingga transaksi selesai</td>
                                    <td></td>
                                </tr>
                                
                                @elseif ($dataPayment['bank_name'] == 'BRI')
                                <tr class="cart_item">
                                    <td class="product-name"><b>ATM</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Pilih menu Transaksi Lain</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Pilih menu Pembayaran</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Pilih menu Lainnya</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Pilih menu BRIVA</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Masukkan nomor Virtual Account BRI OY! Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">6. Pilih Ya untuk memproses pembayaran</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name"><b>Mobile Banking</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Masuk ke aplikasi BRI Mobile dan pilih Mobile Banking BRI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Pilih menu Info</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Pilih menu BRIVA</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Masukkan nomor Virtual Account BRI OY! Anda - <b>{{ $dataPayment['va_number'] }}</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Masukkan PIN Mobile/SMS Banking BRI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">6. Anda akan mendapatkan notifikasi pembayaran melalui SMS</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name"><b>Internet Banking</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Login pada halaman Internet Banking BRI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Pilih menu Pembayaran</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Pilih menu BRIVA</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Masukkan nomor Virtual Account BRI OY! Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Masukkan password Internet Banking BRI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">6. Masukkan mToken Internet Banking BRI</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">7. Anda akan mendapatkan notifikasi pembayaran</td>
                                    <td></td>
                                </tr>
                                @elseif ($dataPayment['bank_name'] == 'BANK MANDIRI')
                                <tr class="cart_item">
                                    <td class="product-name"><b>MANDIRI ATM</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Masukkan kartu debit/ATM Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Masukkan PIN Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Pilih menu Bayar/Beli</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Pilih menu Lainnya, hingga menemukan menu Multipayment</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Pilih penyedia jasa OY! Indonesia Masukkan kode biller <b>89325</b>, lalu pilih Benar</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">6. Masukkan nomor Virtual Account Mandiri OY! Anda - <b>{{ $dataPayment['va_number'] }}</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">7. Masukkan jumlah nominal</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">8. Ikuti petunjuk hingga transaksi selesai</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name"><b>MANDIRI ONLINE / MOBILE BANKING</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">1. Masuk ke aplikasi Mandiri Online</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">2. Pilih menu Pembayaran</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">3. Pilih menu Buat Pembayaran Baru</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">4. Pilih menu Multipayment</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">5. Pilih penyedia jasa OY! Indonesia</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">6. Masukkan nomor VA (klik Tambah Sebagai Nomor Baru) - <b>{{ $dataPayment['va_number'] }}</b></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">7. Klik konfirmasi</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">8. Masukkan nominal</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">9. Konfirmasi pembayaran Anda lalu masukkan PIN mandiri Online Anda</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">10. Transaksi selesai, simpan bukti pembayaran Anda</td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                {{-- @else
                <div class="col-12">
                    <h3 id="order_review_heading" class="mt-30 mb-30">Pembayaran</h3>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">Nama Bank : {{ $bank->nama_bank }}</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Nama Penerima : {{ $bank->nama_penerima }}</td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Nomor Rekening : <span class="amount"><b>{{ $bank->nomor_rekening }}</b></span></td>
                                    <td></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Status Pembayaran : <b>{{ $status }}</b></td>
                                    <td></td>
                                </tr>
                                @if ($paket->status <= 1)
                                <tr class="cart_item">
                                    <td class="product-name">Upload Bukti Transfer : <input type="file" name="images" id=""><button type="submit" class="cws-button alt">Kirim</button></td>
                                    <td></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif --}}
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>
    <script>
        $('#bukti_transfer').submit(function(e) {
            // alert('testing');
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('frontend.paket.transfer',['id' => $paket->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        setTimeout(location.reload(), 8000);
                        // this.reset();
                        // table.ajax.reload();
                        // document.getElementById("button").style.display = "block";
                        // document.getElementById("input_slider").style.display = "none";
                    }else{
                        iziToast.error({
                            title: result.success,
                            message: result.error
                        });
                    }
                },
                error: function (request, status, error) {
                    iziToast.error({
                        title: 'Error',
                        message: error,
                    });
                }
            });
        });
    </script>
@endsection