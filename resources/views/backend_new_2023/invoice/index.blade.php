@extends('layouts.backend_new_2023.master')
@section('title')
    Invoice List
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

    <div class="row">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="btn-group mt-2 mb-2 pull-right">
                        {{-- <button onclick="buat()" class="btn btn-primary">Buat Invoice</button> --}}
                        <a href="{{ route('b.invoice.create') }}" class="btn btn-primary">Buat Invoice</a>
                        <button onclick="reload()" class="btn btn-info">Refresh Data</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kode Invoice</th>
                                <th>Unit</th>
                                <th>Total</th>
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
            ajax: "{{ route('b.invoice') }}",
            columns: [{
                    data: 'transaction_code',
                    name: 'transaction_code'
                },
                {
                    data: 'transaction_unit',
                    name: 'transaction_unit'
                },
                {
                    data: 'transaction_price',
                    name: 'transaction_price'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [0,'desc']
        });

        function reload() {
            table.ajax.reload();
        }

        function send_invoice(transaction_code) {
            $.ajax({
                type: 'GET',
                url: "{{ url('invoice/') }}"+'/'+transaction_code+'/'+'send',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function() {
                    // $("#status").fadeIn();
                    // $("#preloader").delay(100).fadeIn("slow");
                },
                success: (result) => {
                    toastr["success"](result.message_title);
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
            });
        }
    </script>
@endsection
