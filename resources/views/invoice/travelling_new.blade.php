<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - {{ $order->kode_order }}</title>
    <link rel="stylesheet" href="{{ asset('invoice/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice/assets/css/stamp.css') }}">
</head>

<body>
    <?php
    $pemesan = json_decode($order->pemesan);
    ?>
</body>
<div class="tm_container">
    <div class="tm_invoice_wrap">
        <div class="tm_invoice tm_style2" id="tm_download_section">
            <div class="tm_invoice_in">
                <div class="tm_invoice_head tm_top_head tm_mb20">
                    <div class="tm_invoice_left">
                        <div class="tm_logo"><img src="{{ asset('invoice/assets/img/logo_plesiran_new_black2.webp') }}"
                                alt="Logo" width="190"></div>
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
                                style="font-size: 10pt">{{ $pemesan->first_name . ' ' . $pemesan->last_name }}</b> <br>
                            {{ $pemesan->address . ' - ' . $pemesan->phone }} <br>
                            {{ $pemesan->email }}
                        </p>
                    </div>
                    <div class="tm_invoice_info_right">
                        <div
                            class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">
                            Invoice</div>
                        <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                            <div>
                                <span class="tm_white_color_60">Total:</span> <br>
                                <b class="tm_f16 tm_white_color">Rp. {{ number_format($order->price, 0, ',', '.') }}</b>
                            </div>
                            <div>
                                <span class="tm_white_color_60">Invoice Date:</span> <br>
                                <b
                                    class="tm_f16 tm_white_color">{{ \Carbon\Carbon::create($order->created_at)->isoFormat('LL') }}</b>
                            </div>
                            <div>
                                <span class="tm_white_color_60">Invoice No:</span> <br>
                                <b class="tm_f16 tm_white_color">{{ $order->kode_order }}</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tm_table tm_style1">
                    <div class="tm_round_border">
                        <div class="tm_table_responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="tm_width_7 tm_semi_bold tm_accent_color">Order</th>
                                        <th class="tm_width_2 tm_semi_bold tm_accent_color">Price</th>
                                        <th class="tm_width_1 tm_semi_bold tm_accent_color">Qty</th>
                                        <th class="tm_width_2 tm_semi_bold tm_accent_color tm_text_right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order_details as $row => $order_detail)
                                        <tr>
                                            @if ($row == 0)
                                                <td class="tm_width_7">
                                                    <p class="tm_m0 tm_f16 tm_primary_color" style="font-size:10pt">
                                                        {{ $order->nama_order . ' - ' . $pemesan->first_name . ' ' . $pemesan->last_name }}
                                                    </p>
                                                </td>
                                                <td class="tm_width_2">Rp.
                                                    {{ number_format($order_detail->order->price / $order_detail->order->qty, 0, ',', '.') }}
                                                </td>
                                                <td class="tm_width_1">{{ $order_detail->qty }}</td>
                                                <td class="tm_width_2 tm_text_right">Rp.
                                                    {{ number_format($order_detail->order->price / $order_detail->order->qty, 0, ',', '.') }}
                                                </td>
                                        </tr>
                                    @endif
                                    <td class="tm_width_7">
                                        <p class="tm_m0 tm_f16 tm_primary_color" style="font-size:10pt">
                                            {{ $order_detail->order->nama_order . ' - ' . $order_detail->pemesan }}</p>
                                    </td>
                                    <td class="tm_width_2">Rp.
                                        {{ number_format($order_detail->order->price / $order_detail->order->qty, 0, ',', '.') }}
                                    </td>
                                    <td class="tm_width_1">{{ $order_detail->qty }}</td>
                                    <td class="tm_width_2 tm_text_right">Rp.
                                        {{ number_format($order_detail->order->price / $order_detail->order->qty, 0, ',', '.') }}
                                    </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="tm_width_7" style="font-size:10pt">
                                            {{ $order->nama_order }}
                                        </td>
                                        <td class="tm_width_2">Rp. {{ number_format($order->price, 0, ',', '.') }}</td>
                                        <td class="tm_width_1">{{ $order->qty }}</td>
                                        <td class="tm_width_2 tm_text_right">Rp.
                                            {{ number_format($order->price, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                        <div class="tm_left_footer">
                        </div>
                        <div class="tm_right_footer">
                            <table class="tm_mb15">
                                <tbody>
                                    <tr>
                                        <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">SUB TOTAL</td>
                                        <td
                                            class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                            Rp. {{ number_format($order->price,0,",",".") }}
                                        </td>
                                        <tr>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">
                                                Total </td>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">
                                                Rp. {{ number_format($order->price,0,",",".") }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Status</td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                @if ($order->status == 'Unpaid')
                                                    <div style="color: red">NOT PAID</div>
                                                @elseif ($order->status == 'Paid')
                                                    <div style="color: green">PAID</div>
                                                @endif
                                            </td>
                                        </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tm_invoice_footer tm_type1">
                        <div class="tm_left_footer"></div>
                        <div class="tm_right_footer">
                            <div class="tm_sign tm_text_center">
                                {{-- <img src="{{ asset('invoice/assets/img/sign.svg') }}" alt="Sign"> --}}
                                <p class="tm_m0" style="margin-bottom: 2%">Team Marketing,</p>
                                @if ($order->status == 'Paid')
                                <span class="stamp is-approved">
                                    <img src="{{ asset('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="" srcset="">
                                </span>
                                <span class="stamp is-approved">Approval</span>
                                @endif
                                <p class="tm_m0 tm_ternary_color"></p>
                                <p class="tm_m0 tm_f16 tm_primary_color"></p>
                                <p>Fabrizio Danindra Kurniawan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tm_note tm_font_style_normal tm_text_center">
                    <hr class="tm_mb15">
                    <p class="tm_m0">Invoice ini sah dan diproses oleh server. <br> Silahkan hubungi kami apabila anda membutuhkan bantuan</p>
                    <p class="tm_m0" style="font-style: italic">Terakhir diupdate {{ \Carbon\Carbon::parse($order->updated_at)->isoFormat('LLL') }}</p>
                </div>
            </div>
        </div>
        <div class="tm_invoice_btns tm_hide_print">
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
        </div>
    </div>
</div>

</html>
