@extends('layouts.backend_new_2023.master')
@section('title')
    Dashboard
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
    </div>

    <div class="row">
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
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Booking Travelling</h4>
                    <table id="datatable_tour_booking" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Order</th>
                                <th>Tanggal Booking</th>
                                <th>Payment Metode</th>
                                <th>Status</th>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable_tour_booking').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('home.ajax_booking_travelling') }}",
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
                    data: 'tanggal_booking',
                    name: 'tanggal_booking'
                },
                {
                    data: 'payment_metode',
                    name: 'payment_metode'
                },
                {
                    data: 'status',
                    name: 'status'
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

        var options = {
            chart: {
                height: 339,
                type: 'line',
                stacked: false,
                toolbar: {
                    show: false
                }
            },
            stroke: {
                width: [0, 2, 4],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '30%'
                }
            },
            colors: ['#5b73e8', '#dfe2e6', '#f1b44c'],
            series: [{
                    name: 'Desktops',
                    type: 'column',
                    data: [{!! $label_total_sales_tour !!}]
                },
                // {
                //     name: 'Laptops',
                //     type: 'area',
                //     data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
                // }, 
                // {
                //     name: 'Tablets',
                //     type: 'line',
                //     data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
                // }
            ],
            fill: {
                opacity: [0.85, 0.25, 1],
                gradient: {
                    inverseColors: false,
                    shade: 'light',
                    type: "vertical",
                    opacityFrom: 0.85,
                    opacityTo: 0.55,
                    stops: [0, 100, 100, 100]
                }
            },
            labels: {!! $label_periode !!},
            // labels: ['01/20/2023'],
            // labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
            //     '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
            // ],
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime'
            },
            yaxis: {
                title: {
                    text: 'Points'
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function formatter(y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(0) + " points";
                        }

                        return y;
                    }
                }
            },
            grid: {
                borderColor: '#f1f1f1'
            }
        };

        var chart = new ApexCharts(document.querySelector("#sales-analytics-chart"), options);
        chart.render();
    </script>
@endsection
