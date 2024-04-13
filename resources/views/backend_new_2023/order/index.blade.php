@extends('layouts.backend_new_2023.master')
@section('title')
    Transactions
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
    <div class="row">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Order</h4>
                <div class="btn-group mt-2 mb-2 pull-right">
                    <a href="{{ route('sitemap') }}" class="btn btn-success" target="_blank">
                        <i class="mdi mdi-plus"></i> Sitemap All
                    </a>
                    <button class="btn btn-primary" onclick="buat()">
                        <i class="mdi mdi-plus"></i> Buat
                    </button>
                    <button onclick="reload()" class="btn btn-primary">Reload</button>
                </div> --}}
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
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
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
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
    </script>
@endsection
