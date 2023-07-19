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
                                <th>Nama Barang</th>
                                <th>Nama Pembeli</th>
                                <th>Total</th>
                                <th>Email Pengirim</th>
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
            columns: [
                {
                    data: 'kode_invoice',
                    name: 'kode_invoice'
                },
                {
                    data: 'nama_invoice',
                    name: 'nama_invoice'
                },
                {
                    data: 'nama_pembeli',
                    name: 'nama_pembeli'
                },
                {
                    data: 'total',
                    name: 'total'
                },
                {
                    data: 'email_pembeli',
                    name: 'email_pembeli'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        function reload() {
            table.ajax.reload();
        }
    </script>
@endsection
