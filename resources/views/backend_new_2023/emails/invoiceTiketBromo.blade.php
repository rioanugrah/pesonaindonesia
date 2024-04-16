<html>

<body
    style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table
        style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px orange;">
        <thead>
            <tr>
                <th style="text-align:left;"><img style="max-width: 150px;"
                        src="{{ asset('logo_perusahaan/logo_plesiran_indonesia.png') }}"></th>
                <th style="text-align:right;font-weight:400;">
                    <div>Date</div>
                    <div>{{ $body['date'] }}</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b
                            style="color:green;font-weight:normal;margin:0">{{ $body['status'] }}</b></p>
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span>
                            {{ $body['transaction_code'] }}</p>
                    <p style="font-size:14px;margin:0 0 0 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> Rp. {{ number_format($body['amount'],0,',','.') }}</p>
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px">Name</span> {{ $body['bill_name'] }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Email</span> {{ $body['bill_email'] }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Phone</span> {{ $body['bill_phone'] }}</p>
                    {{-- <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">ID No.</span> 2556-1259-9842</p> --}}
                </td>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Address</span> {{ $body['bill_address'] }}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Quantity</span> {{ $body['qty'] }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
            </tr>
            <tr>
                <td colspan="2" style="padding:15px;">
                    {{-- {{ json_encode($body['items']) }} --}}
                    @foreach ($body['items'] as $item)
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">{{ $item->name }}</span> Rp. {{ number_format($item->price,0,',','.') }}
                    </p>
                    @endforeach
                    {{-- <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Pickup & Drop</span> Rs. 2000 <b
                            style="font-size:12px;font-weight:300;"> /person/day</b></p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Local site seeing with guide</span>
                        Rs. 800 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Tea tourism with guide</span> Rs.
                        500 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">River side camping with
                            guide</span> Rs. 1500 <b style="font-size:12px;font-weight:300;"> /person/day</b></p>
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;"><span
                            style="display:block;font-size:13px;font-weight:normal;">Trackking and hiking with
                            guide</span> Rs. 1000 <b style="font-size:12px;font-weight:300;"> /person/day</b></p> --}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding:15px;">
                    <div>Code Ticket Online :</div>
                    <div style="font-weight: bold">{{ $body['barcode'] }}</div>
                </td>
            </tr>
        </tbody>
        <tfooter>
            <tr>
                <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                    <strong style="display:block;margin:0 0 10px 0;">Regards</strong>
                    Team Pesona Plesiran Indonesia<br>
                    Malang, Jawa Timur
                    <br><br>
                    <b>Phone:</b> 0813-3112-6991<br>
                    <b>Email:</b> marketing@plesiranindonesia.com
                </td>
            </tr>
        </tfooter>
    </table>
</body>

</html>
