@extends('layouts.backend_new_2023.master')
@section('title')
    Visitor
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
                    <h4 class="card-title">Visitor</h4>
                    <div class="btn-group mt-2 mb-2 pull-right">
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Method</th>
                                <th>IP</th>
                                <th>Request</th>
                                <th>Url</th>
                                <th>Referer</th>
                                <th>Language</th>
                                <th>Useragent</th>
                                <th>Headers</th>
                                <th>Device</th>
                                <th>Platform</th>
                                <th>Browser</th>
                                <th>Visitor Type</th>
                                <th>Visitor ID</th>
                                <th>Dibuat</th>
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
        ajax: "{{ route('visitor') }}",
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'method',
                name: 'method'
            },
            {
                data: 'ip',
                name: 'ip'
            },
            {
                data: 'request',
                name: 'request'
            },
            {
                data: 'url',
                name: 'url'
            },
            {
                data: 'referer',
                name: 'referer'
            },
            {
                data: 'languages',
                name: 'languages'
            },
            {
                data: 'useragent',
                name: 'useragent'
            },
            {
                data: 'headers',
                name: 'headers'
            },
            {
                data: 'device',
                name: 'device'
            },
            {
                data: 'platform',
                name: 'platform'
            },
            {
                data: 'browser',
                name: 'browser'
            },
            {
                data: 'visitor_type',
                name: 'visitor_type'
            },
            {
                data: 'visitor_id',
                name: 'visitor_id'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            // {
            //     data: 'action',
            //     name: 'action',
            //     orderable: false,
            //     searchable: false
            // },
        ],
        order: [[0, 'desc']],
    });
    function reload() {
        table.ajax.reload();
    }
    </script>
@endsection
