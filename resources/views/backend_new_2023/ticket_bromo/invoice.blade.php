@extends('layouts.backend_new_2023.master')
@section('title')
    Invoice
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Invoice #{{ $transaction->transaction_code }}
                            @switch($transaction->status)
                                @case('Paid')
                                    <span class="badge bg-success font-size-12 ms-2">PAID</span>
                                    @break
                                @case('Unpaid')
                                    <span class="badge bg-warning font-size-12 ms-2">UNPAID</span>
                                    @break
                                @case('Not Paid')
                                    <span class="badge bg-danger font-size-12 ms-2">NOT PAID</span>
                                    @break
                                @default

                            @endswitch
                        </h4>
                        <div class="mb-4">
                            <img src="{{ asset('backend_2023/images/logo_plesiran_new_black.webp') }}" height="40">
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Pesona Plesiran Indonesia, <br> Jl. Raya Tlogowaru No.3, Tlogowaru, <br> Malang, Jawa Timur</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> business@plesiranindonesia.com</p>
                            <p><i class="uil uil-phone me-1"></i> 0813-3112-6951 <br> 0858-6722-4494</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2">{{ json_decode($transaction->transaction_order)->first_name.' '.json_decode($transaction->transaction_order)->last_name }}</h5>
                                <p class="mb-1">{{ json_decode($transaction->transaction_order)->address }}</p>
                                <p class="mb-1">{{ json_decode($transaction->transaction_order)->email }}</p>
                                <p>{{ json_decode($transaction->transaction_order)->phone }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-16 mb-1">Invoice No:</h5>
                                    <p>#{{ $transaction->transaction_code }}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                                    <p>{{ $transaction->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <h5 class="font-size-15">Order summary</h5>

                        <div class="table-responsive">
                            <table class="table table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">01</th>
                                        <td>
                                            <h5 class="font-size-15 mb-1">{{ $transaction->transaction_unit }}</h5>
                                            <ul class="list-inline mb-0">
                                                @foreach ($transaction->verifikasi_tiket->verifikasi_tiket_list as $verifikasi_tiket_list)
                                                <li class="list-inline-item">Team : <span class="fw-medium">{{ $verifikasi_tiket_list->nama_order }}</span></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>Rp. {{ number_format($transaction->transaction_price/$transaction->transaction_qty,0,',','.') }}</td>
                                        <td>{{ $transaction->transaction_qty }}</td>
                                        <td class="text-end">Rp. {{ number_format($transaction->transaction_price,0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                        <td class="text-end">Rp. {{ number_format($transaction->transaction_price,0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Fee :</th>
                                        <td class="border-0 text-end">Rp. {{ number_format($detail_payment->data->fee_customer,0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                        <td class="border-0 text-end">
                                            <h4 class="m-0">Rp. {{ number_format($transaction->transaction_price+$detail_payment->data->fee_customer,0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
