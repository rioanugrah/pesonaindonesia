<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ public_path('invoice/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ public_path('invoice/assets/css/stamp.css') }}">
</head>
@php
    $pemesan = json_decode($order->transaction_order);
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
                                    style="font-size: 10pt">
                                {{ $pemesan->first_name.' '.$pemesan->last_name }}</b><br>
                                {{ $pemesan->address.' '.$pemesan->phone }}<br>
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
                                    <b class="tm_f16 tm_white_color">Rp.
                                        {{ number_format($order->transaction_price, 0, ',', '.') }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice Date:</span> <br>
                                    <b
                                        class="tm_f16 tm_white_color">{{ \Carbon\Carbon::create($order->created_at)->isoFormat('LL') }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice No:</span> <br>
                                    <b class="tm_f16 tm_white_color">{{ $order->transaction_code }}</b>
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
                                            <th class="tm_width_7 tm_semi_bold tm_accent_color">Item
                                            </th>
                                            <th class="tm_width_2 tm_semi_bold tm_accent_color">Price</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Qty</th>
                                            <th class="tm_width_2 tm_semi_bold tm_accent_color tm_text_right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                                <div class="tm_left_footer">
                                </div>
                                <div class="tm_right_footer">
                                    <table class="tm_mb15">
                                        <tbody>
                                            <tr>
                                                <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                                                <td
                                                    class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                    Rp. {{ number_format($order->transaction_price, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">
                                                    Total </td>
                                                <td
                                                    class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">
                                                    Rp. {{ number_format($order->transaction_price, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Status</td>
                                                <td
                                                    class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                    @if ($order->status == 'Not Paid')
                                                        <div style="color: red">NOT PAID</div>
                                                    @elseif ($order->status == 'Paid')
                                                        <div style="color: green">PAID</div>
                                                    @elseif ($order->status == 'Unpaid')
                                                        <div style="color: orange">UNPAID</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tm_note tm_font_style_normal tm_text_center">
                            <hr class="tm_mb15">
                            {{-- <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p> --}}
                            <p class="tm_m0">Invoice ini sah dan diproses secara otomatis dari server. <br> Silahkan hubungi kami apabila
                                anda membutuhkan bantuan</p>
                            <p class="tm_m0" style="font-style: italic">Terakhir diupdate
                                {{ \Carbon\Carbon::parse($order->updated_at)->isoFormat('LLL') }}</p>
                        </div>
                        <div class="tm_invoice_footer tm_type1">
                            <div class="tm_left_footer"></div>
                            <div class="tm_right_footer">
                                <div class="tm_sign tm_text_center">
                                    <p class="tm_m0" style="margin-bottom: 2%">Team Marketing,</p>
                                    @if ($order->status == 'Paid')
                                        <span class="stamp is-approved">
                                            <img src="{{ public_path('invoice/assets/img/logo_plesiran_new_black2.webp') }}"
                                                alt="" srcset="">
                                        </span>
                                    @endif
                                    {{-- <span class="stamp is-approved">Approval</span> --}}
                                    <p class="tm_m0 tm_ternary_color"></p>
                                    <p class="tm_m0 tm_f16 tm_primary_color"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="{{ public_path('invoice/assets/js/jquery.min.js') }}"></script>
        <script src="{{ public_path('invoice/assets/js/jspdf.min.js') }}"></script>
        <script src="{{ public_path('invoice/assets/js/html2canvas.min.js') }}"></script>
        <script src="{{ public_path('invoice/assets/js/main.js') }}"></script>

</body>

</html>
