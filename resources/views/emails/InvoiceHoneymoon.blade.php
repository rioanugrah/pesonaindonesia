<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - {{ $details['kode_invoice'] }}</title>
    <link rel="stylesheet" href="{{ public_path('invoice/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ public_path('invoice/assets/css/stamp.css') }}">
</head>
<?php
// $name = json_decode($order->pemesan);
// $bank = json_decode($order->bank);
// $name_decode = $name['first_name'];
// dd($name[0]->first_name);
?>

@php
    $data_pria = json_decode($details->data_pria,true);
    $data_wanita = json_decode($details->data_wanita,true);
    $data_payment = json_decode($details->payment,true);
@endphp

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style2" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_top_head tm_mb20">
                        <div class="tm_invoice_left">
                            <div class="tm_logo"><img
                                    src="{{ public_path('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="Logo"
                                    width="190"></div>
                            {{-- <div class="tm_logo"><img src="assets/img/logo.svg" alt="Logo"></div> --}}
                        </div>
                        <div class="tm_invoice_right">
                            <div class="tm_grid_row tm_col_3">
                                <div>
                                    <b class="tm_primary_color">Email</b> <br>
                                    business@plesiranindonesia.com
                                </div>
                                <div>
                                    <b class="tm_primary_color">Phone</b> <br>
                                    0813-3112-6991
                                </div>
                                <div>
                                    <b class="tm_primary_color">Address</b> <br>
                                    Jl. Raya Tlogowaru No. 3 Kota Malang, <br>
                                    Jawa Timur
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb10">
                        <div class="tm_invoice_info_left">
                            <p class="tm_mb2"><b>Invoice To:</b></p>
                            <p>
                                <b class="tm_f16 tm_primary_color"
                                    style="font-size: 10pt">{{ $data_pria['first_name'].' '.$data_pria['last_name'] }}</b> <br>
                                {{ $details['email'] }}
                            </p>
                        </div>
                        <div class="tm_invoice_info_right">
                            <div
                                class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">
                                Invoice</div>
                            <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                                <div>
                                    <span class="tm_white_color_60">Total:</span> <br>
                                    <b class="tm_f16 tm_white_color">Rp.
                                        {{ number_format($details['price'], 0, ',', '.') }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice Date:</span> <br>
                                    <b
                                        class="tm_f16 tm_white_color">{{ \Carbon\Carbon::create($details['created_at'])->isoFormat('LL') }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice No:</span> <br>
                                    <b class="tm_f16 tm_white_color">{{ $details['kode_invoice'] }}</b>
                                </div>
                            </div>
                            <table>
                                <tr>
                                    <td>Order</td>
                                    <td>Jumlah Order</td>
                                    <td>Tanggal Order</td>
                                    <td>Status Pembayaran</td>
                                </tr>
                                <tr>
                                    <td>{{ $details->honeymoon->nama_paket }}</td>
                                    <td>{{ $details->qty }}</td>
                                    <td>{{ $details->created_at }}</td>
                                    <td>{{ $status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tm_note tm_font_style_normal tm_text_center">
                        <hr class="tm_mb15">
                        {{-- <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p> --}}
                        <p class="tm_m0">Invoice ini sah dan diproses oleh server. <br> Silahkan hubungi kami apabila
                            anda membutuhkan bantuan</p>
                        <p class="tm_m0" style="font-style: italic">Terakhir diupdate
                            {{ \Carbon\Carbon::parse($details['updated_at'])->isoFormat('LLL') }}</p>
                    </div><!-- .tm_note -->
                </div>
            </div>
            {{-- <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32"
                                ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round"
                                stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
                <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32" />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Download</span>
                </button>
            </div> --}}
        </div>
        <script src="{{ public_path('invoice/assets/js/jquery.min.js') }}"></script>
        <script src="{{ public_path('invoice/assets/js/jspdf.min.js') }}"></script>
        <script src="{{ public_path('invoice/assets/js/html2canvas.min.js') }}"></script>
        <script src="{{ public_path('invoice/assets/js/main.js') }}"></script>

</body>

</html>
