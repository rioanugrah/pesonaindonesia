@extends('layouts.backend_new_2023.master')
@section('title')
    Ticket Bromo - {{ $transaction->transaction_unit }}
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @yield('title')
        @endslot
        @slot('title')
            @yield('title')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 text-center">
                                <label>Code : {{ $transaction->transaction_code }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-center">
                                <label>Ref : {{ $transaction->transaction_reference }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <div>
                                            {!! DNS1D::getBarcodeHTML($transaction->verifikasi_tiket->kode_tiket,'C39+',1) !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code Ticket</td>
                                    <td>:</td>
                                    <td>{{ $transaction->verifikasi_tiket->kode_tiket }}</td>
                                </tr>
                                <tr>
                                    <td>Ticket Order</td>
                                    <td>:</td>
                                    <td>{{ $transaction->transaction_unit }}</td>
                                </tr>
                                <tr>
                                    <td>Booking Date</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::create($transaction->verifikasi_tiket->tanggal_booking)->isoFormat('LLLL') }}</td>
                                </tr>
                                <tr>
                                    <td>Customer</td>
                                    <td>:</td>
                                    <td>{{ json_decode($transaction->transaction_order)->first_name . ' ' . json_decode($transaction->transaction_order)->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>{{ json_decode($transaction->transaction_order)->address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ json_decode($transaction->transaction_order)->email }}</td>
                                </tr>
                                <tr>
                                    <td>No.Telp / Whatsapp</td>
                                    <td>:</td>
                                    <td>{{ json_decode($transaction->transaction_order)->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td>:</td>
                                    <td>{{ $transaction->transaction_qty }}</td>
                                </tr>
                                <tr>
                                    <td>SubTotal</td>
                                    <td>:</td>
                                    <td>{{ 'Rp. ' . number_format($detail_payment->data->amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    <td>:</td>
                                    <td>
                                        @switch($transaction->status)
                                            @case('Paid')
                                                <span class="badge bg-success" style="font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                @break
                                            @case('Unpaid')
                                                <span class="badge bg-warning" style="font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                @break
                                            @case('Non Paid')
                                                <span class="badge bg-danger" style="font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                @break
                                            @default

                                        @endswitch
                                    </td>
                                </tr>
                            </table>
                            @if (!$transaction->verifikasi_tiket->verifikasi_tiket_list->isEmpty())
                                <hr>
                                <h5>Member Team</h5>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th class="text-center">Team</th>
                                        <th class="text-center">Quantity</th>
                                    </tr>
                                    @foreach ($transaction->verifikasi_tiket->verifikasi_tiket_list as $verifikasi_tiket_list)
                                        <tr>
                                            <td class="text-center">{{ $verifikasi_tiket_list->nama_order }}</td>
                                            <td class="text-center">{{ $verifikasi_tiket_list->qty }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                            <hr>
                            @switch($detail_payment->data->status)
                                @case('PAID')
                                    <a href="{{ route('b.ticket_bromo.invoice',['reference' => $transaction->transaction_reference]) }}" class="btn btn-info mt-3"><i class="fas fa-file"></i> Invoice</a>
                                    @break
                                @case('FAILED')
                                    <span class="badge bg-danger" style="font-weight: bold">{{ $detail_payment->data->status }}</span>
                                    @break
                                @default

                            @endswitch

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
