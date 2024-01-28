@extends('layouts.backend_new_2023.master')
@section('title')
    Tour
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

    @include('backend_new_2023.tour.modalBuat')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="button-items mb-2">
                        <button class="btn btn-primary btn-xs" onclick="buat()"><i class="uil-plus"></i> Create</button>
                        <button class="btn btn-primary btn-xs" onclick="reload()"><i class="uil-refresh"></i> Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Images</th>
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
            ajax: "{{ route('b.tour') }}",
            columns: [
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'location',
                    name: 'location'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'images',
                    name: 'images'
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

        function reload() {
            table.ajax.reload();
        }

        function buat() {
            $('#buat').modal('show');
        }
</script>
@endsection