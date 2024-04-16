@php
    $data_pria = json_decode($details->data_pria,true);
    $data_wanita = json_decode($details->data_wanita,true);
@endphp
<div>Terimakasih {{ $data_pria['first_name'].' '.$data_pria['last_name'] }} telah order paket Honeymoon dikami.</div>
<div>Kami mengirimkan bukti invoice untuk anda.</div>
<p>Team Pesona Plesiran Indonesia</p>
<img src="{{ public_path('invoice/assets/img/logo_plesiran_new_black2.webp') }}" alt="Logo PPI"
width="190">
