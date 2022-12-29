@extends('layouts.backend_2.app')

@section('title')
    Visitor
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">@yield('title')</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-md-block">
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="reload()">
                        <i class="mdi mdi-reload"></i> Reload
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable">
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
                        <tbody>
                            @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{ $visitor['id'] }}</td>
                                    <td>{!! $visitor['method'] !!}</td>
                                    <td>{{ $visitor['ip'] }}</td>
                                    <td>{{ $visitor['request'] }}</td>
                                    <td>{{ $visitor['url'] }}</td>
                                    <td>{{ $visitor['referer'] }}</td>
                                    <td>{{ $visitor['languages'] }}</td>
                                    <td>{{ $visitor['useragent'] }}</td>
                                    <td>{{ $visitor['headers'] }}</td>
                                    <td>{{ $visitor['device'] }}</td>
                                    <td>{{ $visitor['platform']}}</td>
                                    <td>{{ $visitor['browser'] }}</td>
                                    <td>{{ $visitor['visitor_type'] }}</td>
                                    <td>{{ $visitor['visitor_id']['name'] }}</td>
                                    <td>{{ $visitor['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('backend/assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>

<script src="{{ asset('backend/assets2/js/pages/datatables.init.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // var table = $('.datatable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('visitor') }}",
    //     columns: [
    //         {
    //             data: 'id',
    //             name: 'id'
    //         },
    //         {
    //             data: 'method',
    //             name: 'method'
    //         },
    //         {
    //             data: 'ip',
    //             name: 'ip'
    //         },
    //         {
    //             data: 'request',
    //             name: 'request'
    //         },
    //         {
    //             data: 'url',
    //             name: 'url'
    //         },
    //         {
    //             data: 'referer',
    //             name: 'referer'
    //         },
    //         {
    //             data: 'languages',
    //             name: 'languages'
    //         },
    //         {
    //             data: 'useragent',
    //             name: 'useragent'
    //         },
    //         {
    //             data: 'headers',
    //             name: 'headers'
    //         },
    //         {
    //             data: 'device',
    //             name: 'device'
    //         },
    //         {
    //             data: 'platform',
    //             name: 'platform'
    //         },
    //         {
    //             data: 'browser',
    //             name: 'browser'
    //         },
    //         {
    //             data: 'visitor_type',
    //             name: 'visitor_type'
    //         },
    //         {
    //             data: 'visitor_id',
    //             name: 'visitor_id'
    //         },
    //         {
    //             data: 'created_at',
    //             name: 'created_at'
    //         },
    //         // {
    //         //     data: 'action',
    //         //     name: 'action',
    //         //     orderable: false,
    //         //     searchable: false
    //         // },
    //     ]
    // });
    // function reload() {
    //     table.ajax.reload();
    // }
</script>
@endsection