<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $paket->id }}</title>
    <link rel="stylesheet" href="{{ asset('invoice/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice/assets/css/stamp.css') }}">
</head>
<?php 
    $name = json_decode($paket->pemesan);
    $bank = json_decode($paket->bank);
    // $name_decode = $name['first_name'];
    // dd($name[0]->first_name);
?>
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
                                <b class="tm_f16 tm_primary_color">{{ $name[0]->first_name.' '.$name[0]->last_name }}</b> <br>
                                {{ $name[0]->alamat.' - '.$name[0]->phone}}
                            </p>
                        </div>
                        <div class="tm_invoice_info_right">
                            <div
                                class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide">
                                Invoice</div>
                            <div class="tm_grid_row tm_col_3 tm_invoice_info_in tm_accent_bg">
                                <div>
                                    <span class="tm_white_color_60">Total:</span> <br>
                                    <b class="tm_f16 tm_white_color">Rp. {{ number_format($paket->price,0,",",".") }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice Date:</span> <br>
                                    <b class="tm_f16 tm_white_color">{{ \Carbon\Carbon::create($paket->created_at)->isoFormat('LL') }}</b>
                                </div>
                                <div>
                                    <span class="tm_white_color_60">Invoice No:</span> <br>
                                    <b class="tm_f16 tm_white_color">#{{ $paket->id }}</b>
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
                                    <tbody>
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
                                        {{-- <tr>
                                            <td class="tm_width_7">
                                                <p class="tm_m0 tm_f16 tm_primary_color">Web Development</p>
                                                Convert pixel-perfect frontend and make it dynamic
                                            </td>
                                            <td class="tm_width_2">$600</td>
                                            <td class="tm_width_1">1</td>
                                            <td class="tm_width_2 tm_text_right">$600</td>
                                        </tr>
                                        <tr class="tm_gray_bg">
                                            <td class="tm_width_7">
                                                <p class="tm_m0 tm_f16 tm_primary_color">App Development</p>
                                                Android & Ios Application Development
                                            </td>
                                            <td class="tm_width_2">$200</td>
                                            <td class="tm_width_1">2</td>
                                            <td class="tm_width_2 tm_text_right">$400</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_7">
                                                <p class="tm_m0 tm_f16 tm_primary_color">Digital Marketing</p>
                                                Facebook, Youtube and Google Marketing
                                            </td>
                                            <td class="tm_width_2">$100</td>
                                            <td class="tm_width_1">3</td>
                                            <td class="tm_width_2 tm_text_right">$300</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer tm_mb15 tm_m0_md">
                            <div class="tm_left_footer">
                                <div class="tm_card_note tm_ternary_bg tm_white_color"><b>Pembayaran: </b>{{ $bank[0]->nama_bank.' - '.$bank[0]->nama_penerima }}</div>
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
                                                Rp. {{ number_format($paket->price,0,",",".") }}</td>
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
                                                Rp. {{ number_format($paket->price,0,",",".") }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Status</td>
                                            <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                @if ($paket->status == 1)
                                                    <div style="color: red">NOT PAID</div>
                                                @elseif ($paket->status == 3)
                                                    <div style="color: green">PAID</div>
                                                @endif
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
                                    @if ($paket->status == 3)
                                    <span class="stamp is-approved">
                                        <img src="{{ asset('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="" srcset="">
                                    </span>
                                    @endif
                                    {{-- <span class="stamp is-approved">Approved</span> --}}
                                    <p class="tm_m0 tm_ternary_color">{{ $perusahaan->penanggung_jawab }}</p>
                                    <p class="tm_m0 tm_f16 tm_primary_color">{{ $perusahaan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_note tm_font_style_normal tm_text_center">
                        <hr class="tm_mb15">
                        {{-- <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p> --}}
                        <p class="tm_m0">Invoice ini sah dan diproses oleh server. <br> Silahkan hubungi kami apabila anda membutuhkan bantuan</p>
                        <p class="tm_m0" style="font-style: italic">Terakhir diupdate {{ \Carbon\Carbon::parse($paket->updated_at)->isoFormat('LLL') }}</p>
                    </div><!-- .tm_note -->
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
        <script src="{{ asset('invoice/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('invoice/assets/js/jspdf.min.js') }}"></script>
        <script src="{{ asset('invoice/assets/js/html2canvas.min.js') }}"></script>
        <script src="{{ asset('invoice/assets/js/main.js') }}"></script>
</body>

</html>
