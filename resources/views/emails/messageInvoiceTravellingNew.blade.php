@php
    $pemesan = json_decode($order->transaction_order);
@endphp
<div>Terimakasih {{ $pemesan->first_name.' '.$pemesan->last_name }} telah order paket dikami.</div>
<div>Kami akan mengirimkan bukti invoice untuk anda.</div>
<p>Team Pesona Plesiran Indonesia</p>
<img src="{{ public_path('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="Logo PPI"
width="190">