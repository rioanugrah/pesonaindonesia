@extends('layouts.backend_2.app')
@section('title')
    {{ $coupon->coupons_title }}
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('backend/assets2/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets2/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
@include('backend.coupons.used.modalBuat')
  <div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">{{ $coupon->coupons_title }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="Coupon">{{ $coupon->coupons_title }}</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-md-block">
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="buat()">
                        <i class="mdi mdi-plus"></i> Buat
                    </button>
                    <button class="btn btn-primary" onclick="reload()">
                        <i class="mdi mdi-reload"></i> Reload
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kupon ID</th>
                                <th>Kategori Akomodasi</th>
                                <th>Akomodasi</th>
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
<script src="{{ asset('backend/assets2/libs/select2/js/select2.min.js') }}"></script>

<script>
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('coupon.used',['id' => $coupon->id]) }}",
        columns: [
            {
                data: 'coupons_id',
                name: 'coupons_id'
            },
            {
                data: 'kategori_akomodasi_id',
                name: 'kategori_akomodasi_id'
            },
            {
                data: 'akomodasi_id',
                name: 'akomodasi_id'
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

    function buat() {
        $('#modal_buat').modal('show');
    };

    function reload() {
        table.ajax.reload();
    }

    $('#upload-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('coupon.used.simpan',['id' => $coupon->id]) }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (result) => {
                if (result.success != false) {
                    iziToast.success({
                        title: result.message_title,
                        message: result.message_content
                    });
                    this.reset();
                    table.ajax.reload();
                } else {
                    iziToast.error({
                        title: result.success,
                        message: result.error
                    });
                }
            },
            error: function(request, status, error) {
                iziToast.error({
                    title: 'Error',
                    message: error,
                });
            }
        });
    });
</script>
@endsection