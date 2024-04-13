@extends('layouts.backend_new_2023.master')
@section('title')
    Dashboard
@endsection
@section('css')
    <link href="{{ URL::asset('backend_new/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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

    @include('backend_new_2023.order.detail_bukti_pembayaran')

    {{-- <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="mb-1 mt-1">Rp. <span data-plugin="counterup">{{ number_format($balances['balance'] == null ? 0 : $balances['balance'],0,'.',',') }}</span></h4>
                        <p class="text-muted mb-0">Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Analytics</h4>
                    <div class="mt-3">
                        <ul class="list-inline main-chart mb-0">
                            <li class="list-inline-item chart-border-left me-0 border-0">
                                <h3 class="text-primary">Rp. <span data-plugin="counterup">{{ number_format($sales_income->sum('price'),0,',','.') }}</span><span
                                        class="text-muted d-inline-block font-size-15 ms-3">Income</span></h3>
                            </li>
                            <li class="list-inline-item chart-border-left me-0">
                                <h3><span data-plugin="counterup">{{ $sales_income->count() }}</span><span
                                        class="text-muted d-inline-block font-size-15 ms-3">Sales</span>
                                </h3>
                            </li>
                            <li class="list-inline-item chart-border-left me-0">
                                <h3><span data-plugin="counterup">0</span>%<span
                                        class="text-muted d-inline-block font-size-15 ms-3">Conversation Ratio</span></h3>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3">
                        <div id="sales-analytics-chart" data-colors='["--bs-primary", "#dfe2e6", "--bs-warning"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Transaction</h4>
                    <table id="datatable_tour_booking" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Transaction Code</th>
                                <th>Transaction Unit</th>
                                <th>Recipient User</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Purchase Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable_tour_booking').DataTable({
            processing: true,
            serverSide: true,
            // ajax: "{{ route('home.ajax_booking_travelling') }}",
            // columns: [
            //     {
            //         data: 'kode_order',
            //         name: 'kode_order'
            //     },
            //     {
            //         data: 'nama_order',
            //         name: 'nama_order'
            //     },
            //     {
            //         data: 'tanggal_booking',
            //         name: 'tanggal_booking'
            //     },
            //     {
            //         data: 'payment_metode',
            //         name: 'payment_metode'
            //     },
            //     {
            //         data: 'status',
            //         name: 'status'
            //     },
            //     {
            //         data: 'action',
            //         name: 'action',
            //         orderable: false,
            //         searchable: false
            //     },
            // ]
            ajax: "{{ route('b.transaction') }}",
            columns: [{
                    data: 'kode_order',
                    name: 'kode_order'
                },
                {
                    data: 'nama_order',
                    name: 'nama_order'
                },
                {
                    data: 'pemesan',
                    name: 'pemesan'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                // {
                //     data: 'status',
                //     name: 'status'
                // },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [5, 'desc']
        });

        function reload() {
            table.ajax.reload();
        }

        function bukti_pembayaran(kode_transaksi) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/transaction/bukti_pembayaran') }}" + '/' + kode_transaksi,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    if (result.success = true) {
                        $('#bukti_pembayaran_kode_transaksi').val(result.data.kode_transaksi);
                        document.getElementById('bukti_pembayaran_images').innerHTML = '<img src="'+result.data.images+'" width="250">';
                        $('#detail_bukti_pembayaran').modal('show');
                    } else {

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
                }
            })
        }

        $('#bukti-pembayaran-upload-form').submit(function(e) {
            // alert('coba');
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaction.bukti_pembayaran.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        toastr["success"](result.message_content);
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
                        // this.reset();
                        $('#detail_bukti_pembayaran').modal('hide');
                        table.ajax.reload(null, false);
                    }else{
                        toastr["error"](result.error);
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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
                }
            });
        });

        // function balance() {
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ route('balance') }}",
        //         contentType: "application/json;  charset=utf-8",
        //         cache: false,
        //         success: function(result){
        //             console.log(result);
        //         },
        //         error: function (request, status, error) {

        //         }
        //     })
        // }

        // balance();
    </script>
@endsection
