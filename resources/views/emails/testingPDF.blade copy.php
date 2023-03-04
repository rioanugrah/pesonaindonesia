{{-- <h4>{{ $details['invoice'] }}</h4> --}}

<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - </title>
    <link rel="stylesheet" href="{{ asset('invoice/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice/assets/css/stamp.css') }}">
</head>
<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style2" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_top_head tm_mb20">
                        <div class="tm_invoice_left">
                            <div class="tm_logo"><img src="{{ asset('invoice/assets/img/logo_new.svg') }}" alt="Logo"></div>
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
                                <b class="tm_f16 tm_primary_color"></b> <br>
                                
                            </p>
                        </div>
                        <div class="tm_invoice_info_right">
                            <div
                                class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">
                                Invoice</div>
                            <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                                <div>
                                    <span class="tm_white_color_60">Total:</span> <br>
                                    <b class="tm_f16 tm_white_color">Rp. </b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice Date:</span> <br>
                                    <b class="tm_f16 tm_white_color"></b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice No:</span> <br>
                                    <b class="tm_f16 tm_white_color">#</b>
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
                                            <th class="tm_width_7 tm_semi_bold tm_accent_color">Item</th>
                                            <th class="tm_width_2 tm_semi_bold tm_accent_color">Price</th>
                                            <th class="tm_width_1 tm_semi_bold tm_accent_color">Qty</th>
                                            <th class="tm_width_2 tm_semi_bold tm_accent_color tm_text_right">Total</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @forelse ($paketLists as $row => $pl)
                                        @if($row % 2 == 0)
                                        <tr class="tm_gray_bg">
                                        @else
                                        <tr>
                                        @endif
                                            <td class="tm_width_7">
                                                <p class="tm_m0 tm_f16 tm_primary_color">{{ $pl->pemesan }}</p>
                                                {{ $pl->paket_order->nama_paket }}
                                            </td>
                                            <td class="tm_width_2">Rp. {{ number_format($pl->paket_order->price/$pl->paket_order->qty,0,",",".") }}</td>
                                            <td class="tm_width_1">{{ $pl->qty }}</td>
                                            <td class="tm_width_2 tm_text_right">Rp. {{ number_format($pl->paket_order->price/$pl->paket_order->qty,0,",",".") }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="tm_width_7">{{ $paket->nama_paket }}</td>
                                            <td class="tm_width_2">Rp. {{ number_format($paket->price,0,",",".") }}</td>
                                            <td class="tm_width_1">{{ $paket->qty }}</td>
                                            <td class="tm_width_2 tm_text_right">Rp. {{ number_format($paket->price,0,",",".") }}</td>
                                        </tr>
                                        @endforelse
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                            <div class="tm_left_footer">
                                <div class="tm_card_note tm_ternary_bg tm_white_color">
                                    {{-- <?php 
                                        if ($bank[0]->kode_bank == '002') {
                                            $nama_bank = 'BRI';
                                        }else if($bank[0]->kode_bank == '009'){
                                            $nama_bank = 'BNI';
                                        }else if($bank[0]->kode_bank == '008'){
                                            $nama_bank = 'Mandiri';
                                        }
                                    ?> --}}
                                    <b>Pembayaran: </b>
                                </div>
                                {{-- <p class="tm_mb2"><b class="tm_primary_color">Important Note:</b></p>
                                <p class="tm_m0">Delivery dates are not guaranteed and Seller has <br>no liability for
                                    damages that may be incurred <br>due to any delay.</p> --}}
                            </div>
                            <div class="tm_right_footer">
                                <table class="tm_mb15">
                                    <tbody>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                                            <td
                                                class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                Rp. </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="tm_width_3 tm_danger_color tm_border_none tm_pt0">Discount 10%
                                            </td>
                                            <td class="tm_width_3 tm_danger_color tm_text_right tm_border_none tm_pt0">
                                                +$164</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Tax 5%</td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">
                                                +$82</td>
                                        </tr> --}}
                                        <tr>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">
                                                Total </td>
                                            <td
                                                class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">
                                                Rp. </td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Status</td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                {{-- @if ($paket->status == 1)
                                                    <div style="color: red">NOT PAID</div>
                                                @elseif ($paket->status == 3)
                                                    <div style="color: green">PAID</div>
                                                @endif --}}
                                            </td>
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
                                    <p class="tm_m0" style="margin-bottom: 2%">Regards,</p>
                                    {{-- @if ($paket->status == 3)
                                    <span class="stamp is-approved">
                                        <img src="{{ asset('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="" srcset="">
                                    </span>
                                    @endif --}}
                                    {{-- <span class="stamp is-approved">Approved</span> --}}
                                    <p class="tm_m0 tm_ternary_color"></p>
                                    <p class="tm_m0 tm_f16 tm_primary_color"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_note tm_font_style_normal tm_text_center">
                        <hr class="tm_mb15">
                        {{-- <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p> --}}
                        <p class="tm_m0">Invoice ini sah dan diproses oleh server. <br> Silahkan hubungi kami apabila anda membutuhkan bantuan</p>
                        <p class="tm_m0" style="font-style: italic">Terakhir diupdate </p>
                    </div><!-- .tm_note -->
                </div>
            </div>
        </div>
        <script src="{{ asset('invoice/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('invoice/assets/js/jspdf.min.js') }}"></script>
        <script src="{{ asset('invoice/assets/js/html2canvas.min.js') }}"></script>
        <script src="{{ asset('invoice/assets/js/main.js') }}"></script>
</body>

</html>
