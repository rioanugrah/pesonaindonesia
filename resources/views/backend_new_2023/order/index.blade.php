@extends('layouts.backend_new_2023.master')
@section('title')
    Order
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
                            <th>Kode Order</th>
                            <th>Nama Order</th>
                            <th>Pemesan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            {{-- <th>Status</th> --}}
                            <th>TGL.Pembelian</th>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('b.order') }}",
        columns: [
            {
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
        order:[5,'desc']
    });
</script>
@endsection