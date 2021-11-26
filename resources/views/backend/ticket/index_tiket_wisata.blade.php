@extends('layouts.backend.app')

@section('title')
    Tiket Wisata
@endsection

@section('css')
<link href="{{ asset('backend/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tiket Wisata</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Tiket Wisata</h6>
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Pembeli</th>
                                <th>Wisata</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('backend/js/iziToast.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('tiket_wisata') }}",
        columns: [{
                data: 'user',
                name: 'user'
            },
            // {data: 'barcode', name: 'barcode'},
            {
                data: 'wisata',
                name: 'wisata'
            },
            {
                data: 'jumlah_tiket',
                name: 'jumlah_tiket'
            },
            {
                data: 'total',
                name: 'total'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
</script>
@endsection