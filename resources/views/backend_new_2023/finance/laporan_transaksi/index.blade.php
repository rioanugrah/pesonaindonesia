@extends('layouts.backend_new_2023.master')
@section('title')
    Laporan Transaksi
@endsection
@section('css')
<link href="{{ URL::asset('backend_new/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Akuntansi Transaksi</h4>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Status</th>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('b.laporan_transaksi') }}",
        columns: [
            {
                data: 'kode_order',
                name: 'kode_order'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'keterangan',
                name: 'keterangan'
            },
            {
                data: 'nominal',
                name: 'nominal'
            },
            {
                data: 'status',
                name: 'status',
                orderable: false,
                searchable: false
            },
        ],
        order:[1,'asc']
    });
</script>
@endsection