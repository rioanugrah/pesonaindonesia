@extends('layouts.backend_new_2023.master')
@section('title')
    Checkout Ticket Bromo - {{ $transaction->transaction_unit }}
@endsection
@section('css')
    <link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
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
                            <div class="mb-3">
                                <label>Code : {{ $transaction->transaction_code }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Ref : {{ $transaction->transaction_reference }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td>Ticket Order</td>
                                    <td>:</td>
                                    <td>{{ $transaction->transaction_unit }}</td>
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
                                    <td>Payment Method</td>
                                    <td>:</td>
                                    <td>{{ $detail_payment->data->payment_name }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Virtual Code</td>
                                    <td>:</td>
                                    <td style="font-weight: bold">{{ $detail_payment->data->pay_code }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    <td>:</td>
                                    <td>
                                        @switch($detail_payment->data->status)
                                            @case('PAID')
                                                <span class="badge bg-success" style="font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                @break
                                            @case('UNPAID')
                                                <span class="badge bg-warning" style="font-weight: bold">{{ $detail_payment->data->status }}</span>
                                                @break
                                            @case('FAILED')
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
                            <h5>Payment Instructions</h5>
                            <div class="accordion" id="accordionExample">
                                @foreach ($detail_payment->data->instructions as $key_instruction => $instruction)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $key_instruction }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $key_instruction }}"
                                                aria-expanded="false" aria-controls="collapse{{ $key_instruction }}">
                                                {{ $instruction->title }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key_instruction }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $key_instruction }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ol>
                                                    @foreach ($instruction->steps as $steps)
                                                        <li>{!! $steps !!}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @switch($detail_payment->data->status)
                                @case('PAID')
                                    <a href="{{ route('b.ticket_bromo.invoice',['reference' => $transaction->transaction_reference]) }}" class="btn btn-info mt-3"><i class="fas fa-file"></i> Invoice</a>
                                    @break
                                @case('UNPAID')
                                <button type="button" onclick="check_payment(`{{ $detail_payment->data->reference }}`)"
                                    class="btn btn-success mt-3">Confirmation Payment</button>
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
@section('script')
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        function check_payment(ref) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/ticket_bromo/checkout/') }}" + "/" + ref + "/check_payment",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function() {
                    $('.modalloading').modal('show');
                },
                success: function(result) {
                    if (result.success == true) {
                        if (result.data.status == 'PAID') {
                            toastr["success"]('Payment Success');
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 5000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }else if(result.data.status == 'UNPAID') {
                            toastr["warning"]('Payment Not Success');
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 5000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                        $('.modalloading').modal('hide');
                        setTimeout(() => {
                            window.location.href=result.data.link;
                        }, 5000);
                    } else {
                        toastr["error"]('Payment Failed');
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        "</tr>";
                        $('.modalloading').modal('hide');
                    }
                },
                error: function(request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('.modalloading').modal('hide');
                }
            })
        }
    </script>
@endsection
