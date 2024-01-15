<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVOICE - {{ $order->transaction_code }}</title>
    <style>
        html{
            font-family: Arial, Helvetica, sans-serif
        }
        table,
        td,
        th {
            /* border: 1px solid grey; */
            height: 1.8%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        #watermark {
            position: fixed;

            /** 
                Set a position in the page for your image
                This should center it vertically
            **/
            bottom:   10cm;
            left:     1cm;

            /** Change image dimensions**/
            width:    8cm;
            height:   8cm;

            /** Your watermark should be behind every content**/
            z-index:  -1000;
        }
    </style>
</head>

<body>
    @php
        $transaction_order = json_decode($order->transaction_order);
        // dd($transaction_order);
        if ($order->status == "Unpaid") {
            $status = "<div style='color: orange; text-transform: uppercase; font-weight: bold'>".$order->status."</div>";
        }elseif($order->status == "Paid"){
            $status = "<div style='color: green; text-transform: uppercase; font-weight: bold'>".$order->status."</div>";
        }elseif($order->status == "NotPaid"){
            $status = "<div style='color: red; text-transform: uppercase; font-weight: bold'>".$order->status."</div>";
        }
    @endphp
    <div id="watermark">
        <img src="{{ public_path('invoice/assets/img/logo_plesiran_new_black2.webp') }}"
                        width="600" style="transform: rotate(-30deg); opacity: 0.2;">
    </div>
    <table>
        <tr>
            <td rowspan="5" style="vertical-align: top; width: 55%"><img src="{{ public_path('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="Logo"
                    width="190"></td>
            <td colspan="2" style="font-weight: bolder; text-align: right; font-size: 18pt; height: 5%; vertical-align: top; color: gray">INVOICE</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 9pt; text-align: right">Referensi</td>
            <td style="text-align: right; font-size: 9pt">{!! $order->transaction_code !!}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 9pt; text-align: right">Tanggal</td>
            <td style="text-align: right; font-size: 9pt">{{ $order->created_at->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 9pt; text-align: right">Tgl. Jatuh Tempo</td>
            <td style="text-align: right; font-size: 9pt">{{ $order->created_at->addDay()->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 9pt; text-align: right">Status Invoice</td>
            <td style="text-align: right; font-size: 9pt">{!! $status !!}</td>
        </tr>
        <tr>
            <td style="height: 3%; font-weight: bold; font-size: 11pt;"><div style="color: orange;">Info Perusahaan</div></td>
            <td colspan="2" style="height: 3%; font-weight: bold; font-size: 11pt;"><div style="color: orange">To Customer</div></td>
        </tr>
        <tr>
            <td style="height: 5%; vertical-align: top">
                <div style="font-weight: bold">CV. Pesona Plesiran Indonesia</div>
                <div style="font-size: 10pt; font-style: italic">There is always for away</div>
            </td>
            <td colspan="2" style="vertical-align: top">
                <div style="font-weight: bold">{{ $transaction_order->first_name.' '.$transaction_order->last_name }}</div>
                <div style="font-size: 9pt">Alamat : {{ $transaction_order->address }}</div>
                <div style="font-size: 9pt">No. Telp : {{ $transaction_order->phone }}</div>
            </td>
        </tr>
        <tr>
            <td style="font-size: 9pt">Alamat :  Jl. Raya Tlogowaru No.3, Tlogowaru Kec. 
                <br>Kedungkandang, Kota Malang, Jawa Timur 
                <br>Kota Malang 
                Jawa Timur
            </td>
        </tr>
        <tr>
            <td style="font-size: 9pt">Phone : 0813-3112-6991</td>
        </tr>
        <tr>
            <td style="font-size: 9pt">Email : marketing@plesiranindonesia.com</td>
        </tr>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                {{-- <th style="background-color: orange; font-size: 10pt">Produk</th> --}}
                <th style="height: 3%; background-color: orange; font-size: 10pt; border: 1px solid grey">Deskripsi</th>
                <th style="height: 3%; background-color: orange; font-size: 10pt; border: 1px solid grey; width: 10%">QTY</th>
                <th style="height: 3%; background-color: orange; font-size: 10pt; border: 1px solid grey; width: 15%">Unit Price</th>
                <th style="height: 3%; background-color: orange; font-size: 10pt; border: 1px solid grey; width: 25%">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height: 3%; font-size: 10pt; border: 1px solid grey">{{ $order->transaction_unit }}</td>
                <td style="height: 3%; font-size: 10pt; text-align: center; border: 1px solid grey">{{ $order->transaction_qty }}</td>
                <td style="height: 3%; font-size: 10pt; text-align: right; border: 1px solid grey">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
                <td style="height: 3%; font-size: 10pt; text-align: right; border: 1px solid grey">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">Subtotal</td>
                <td style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">Total Diskon</td>
                <td style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">Rp. 0</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">Pajak</td>
                <td style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">Rp. 0</td>
            </tr>
            <tr>
                <td colspan="3" style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">Total</td>
                <td style="height: 3%; text-align: right; font-size: 10pt; border: 1px solid grey">{{ 'Rp. '.number_format($order->transaction_price,0,',','.') }}</td>
            </tr>
        </tbody>
    </table>
    @php
        $signature = "Signature: CV. Pesona Plesiran Indonesia \n".
                    "Invoice: $order->transaction_code \n".
                    "Order Name: $transaction_order->first_name $transaction_order->last_name \n".
                    "Transaction Date: $order->created_at";
    @endphp
    <div style="margin-top: 5%">
        {!! DNS2D::getBarcodeHTML($signature, 'QRCODE',2,2) !!}
    </div>
    <p style="font-size: 8pt"><b>Note: </b> Invoice ini sah dan diproses secara otomatis dari server. Silahkan hubungi kami apabila anda
membutuhkan bantuan</p>
</body>

</html>
