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
                    <div id="spline_area" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
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
    <script src="{{ URL::asset('backend_new/libs/apexcharts/apexcharts.min.js') }}"></script>
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
            columns: [{
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
            order: [
                [0, 'desc']
            ],
        });

        function reload() {
            table.ajax.reload();
        }

        var options = {
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            series: [{
                name: 'Total Visitor',
                data: @json($count_visitor)
            }, 
            // {
            //     name: 'series2',
            //     data: [32, 60, 34, 46, 34, 52, 41]
            // }
            ],
            colors: ['#5b73e8', '#f1b44c'],
            xaxis: {
                // type: 'datetime',
                // categories: [
                //     "2018-09-19T00:00:00", 
                //     "2018-09-19T01:30:00", 
                //     "2018-09-19T02:30:00", 
                //     "2018-09-19T03:30:00",
                //     "2018-09-19T04:30:00", 
                //     "2018-09-19T05:30:00", 
                //     "2018-09-19T06:30:00"
                // ]
                categories: [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ]
            },
            grid: {
                borderColor: '#f1f1f1'
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#spline_area"), options);
        chart.render();
    </script>
@endsection
