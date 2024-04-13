@extends('layouts.backend_new_2023.master')
@section('title')
    Ticket Bromo
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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ticket Bromo</h4>
                    <div class="mt-2 mb-2 pull-right">
                        <a href="{{ route('b.ticket_bromo.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Buy Ticket</a>
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Code Ticket</th>
                                <th>Unit</th>
                                <th>Booking Date</th>
                                <th>Qty</th>
                                <th>Price</th>
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
            ajax: "{{ route('b.ticket_bromo') }}",
            columns: [
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'code_ticket',
                    name: 'code_ticket'
                },
                {
                    data: 'transaction_unit',
                    name: 'transaction_unit'
                },
                {
                    data: 'booking_date',
                    name: 'booking_date'
                },
                {
                    data: 'transaction_qty',
                    name: 'transaction_qty'
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
            // order: [5, 'desc']
        });

        function reload(){
            table.ajax.reload();
        }

    </script>
@endsection
