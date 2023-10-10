<style>
    body {
        /* margin: auto; */
        font-family: Arial, Helvetica, sans-serif;
        /* margin: auto; */
        /* width: 50%; */
        width: 58mm;
        /* padding: 0; */
    }

    h5 {
        /* text-align: center; */
        font-size: 12pt;
        /* margin-top: 5%;
        margin-bottom: 2.5%; */
    }

    span {
        font-size: 10pt;
    }

    .text-center {
        text-align: center;
    }

    .invoice-to {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .invoice-to-contact {
        font-size: 10pt;
    }

    .notice {
        font-size: 10pt;
        margin-top: 5%;
    }

    table,
    td,
    th {
        border: 1px solid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    @media print {
        body {
            width: 42mm;
        }

        h5 {
            font-size: 6pt;
        }

        span {
            font-size: 4pt;
        }

        table,
        td,
        th {
            border: 0.1px solid;
            font-size: 6pt;
        }

        table {
            width: 96%;
            border-collapse: collapse;
            /* margin: auto; */
        }

        .invoice-to {
            font-size: 9pt;
        }

        .invoice-to-contact {
            font-size: 6pt;
        }

        .notice {
            font-size: 4pt;
            margin-top: 5%;
        }
    }
</style>
<?php
    $pemesan = json_decode($order->transaction_order);
    // dd($pemesan);
?>
<body>
    <div class="text-center">
        <img src="{{ asset('invoice/assets/img/logo_plesiran_new_black2.webp') }}"
                                alt="Logo" width="120"> <br>
        {{-- <h5>Pesona Plesiran Indonesia</h5> --}}
        <span>Whatsapp : 0813-3112-6991</span><br>
        <span>Email : marketing@plesiranindonesia.com</span><br>
        <span>Instagram : @pesonaplesiranid.official</span><br>
        <span>Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, <br> Kota Malang, Jawa Timur</span>
        
        <div class="invoice-to">
            Invoice To: <br>
            <div class="invoice-to-contact">
                {{ $pemesan->first_name . ' ' . $pemesan->last_name }}<br>
                {{ $pemesan->address . ' - ' . $pemesan->phone }} <br>
                {{ $pemesan->email }}
            </div>
        </div>
        <table style="margin-top: 5%;">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $detail_items = json_decode($order->pemesan);
                @endphp
                <tr>
                    <td style="text-align: center">
                        {{ ucwords($order->transaction_unit) }}
                        @if (!empty($detail_items->item_details))
                        <ul>
                            @forelse ($detail_items->item_details as $item)
                            <li>{{ $item->name }}</li>
                            @empty
                                
                            @endforelse
                        </ul>
                        @endif
                    </td>
                    <td style="text-align: center">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
                    <td style="text-align: center">{{ $order->transaction_qty }}</td>
                    <td style="text-align: center">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right">Total</td>
                    <td style="text-align: center">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 5%; margin-bottom: 5%">
            {!! DNS2D::getBarcodeSVG($order->transaction_code, 'QRCODE') !!}
        </div>

        <div class="notice">
            Transaksi ini sah dan diproses oleh server. <br> Silahkan hubungi kami apabila anda membutuhkan bantuan <br>
            Terakhir diupdate {{ \Carbon\Carbon::parse($order->updated_at)->isoFormat('LLL') }}
        </div>
    </div>
</body>
