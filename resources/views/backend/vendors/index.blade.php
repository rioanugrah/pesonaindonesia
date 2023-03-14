@extends('layouts.backend_2.app')

@section('title')
    Vendor
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
@include('backend.vendors.modalBuat')
@include('backend.vendors.modalEdit')
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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Kode Vendor</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Perusahaan</th>
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

<script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('vendors') }}",
        columns: [
            {
                data: 'kode_vendor',
                name: 'kode_vendor'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'perusahaan',
                name: 'perusahaan'
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
        $('#buat').modal('show');
    };

    function reload() {
        table.ajax.reload();
    }

    function edit(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('b/vendors') }}"+'/'+id,
            contentType: "application/json;  charset=utf-8",
            cache: false,
            success: function(result){
                // alert(result.data.id);
                // $('#edit_id').val(result.data.id);
                $('#edit_kode_vendor').val(result.data.kode_vendor);
                $('#edit_nama').val(result.data.nama);
                $('#edit_alamat').val(result.data.alamat);
                $('#edit_email').val(result.data.email);
                $('#edit_no_telp').val(result.data.no_telp);
                $('#edit_perusahaan').val(result.data.perusahaan);
                // $('#edit_kategori_paket_id').val(result.data.kategori_paket_id);
                // $('#edit_deskripsi').val(result.data.deskripsi);
                $('#edit').modal('show');
            }
        })
    }

    $('#upload-form').submit(function(e) {
        e.preventDefault();
        // alert('test');
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('vendors.simpan') }}",
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
                    $('#modalBuat').modal('hide');
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

    $('#upload-edit').submit(function(e) {
        e.preventDefault();
        // alert('test');
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('vendors.update') }}",
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
                    $('#modalEdit').modal('close');
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