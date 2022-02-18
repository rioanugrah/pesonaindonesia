@extends('layouts.backend_2.app')

@section('title')
    Log Activity
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Log Activity</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="Log Activity">Log Activity</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Log Name</th>
                            <th>Deksripsi</th>
                            <th>Lokasi Model</th>
                            <th>Data</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
<script src="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('backend/assets2/js/pages/datatables.init.js') }}"></script>

<script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>

<script>
    var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('log') }}",
            columns: [
                {
                    data: 'log_name',
                    name: 'log_name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'subject_type',
                    name: 'subject_type'
                },
                {
                    data: 'data',
                    name: 'data'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
            ]
        });
</script>
@endsection