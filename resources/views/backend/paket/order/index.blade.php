@extends('layouts.backend_2.app')

@section('title')
    Order
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">
    {{-- <link href="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Submit-A-Form-By-Sliding-slide-to-submit/css/slide-to-submit.css"
        rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
@include('backend.paket.order.modalBuat')
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
                {{-- <h6 class="card-title">Paket Wisata</h6> --}}
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Order</th>
                                <th>Pemesan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Status</th>
                                {{-- <th>Deskripsi</th> --}}
                                {{-- <th>Harga</th>
                                <th>Diskon</th>
                                <th>Total Harga</th> --}}
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
{{-- <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Submit-A-Form-By-Sliding-slide-to-submit/js/slide-to-submit.js"></script> --}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('paket.order') }}",
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'nama_order',
                name: 'nama_order'
            },
            {
                data: 'pemesan',
                name: 'pemesan'
            },
            {
                data: 'qty',
                name: 'qty'
            },
            {
                data: 'price',
                name: 'price'
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

    function bukti_pembayaran(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('b/paket_order') }}"+'/'+id+'/bukti_pembayaran',
            contentType: "application/json;  charset=utf-8",
            cache: false,
            success: function(result){
                // alert(result.data);
                $('#bukti_id').val(id);
                $('#uploaded_image').html(result.data.images);
                $('#tf').modal('show');
            }
        })
    }

    $('#upload-bukti').submit(function(e) {
        // alert('testing');
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ route('paket.order.bukti_pembayaran.update') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (result) => {
                if(result.success != false){
                    iziToast.success({
                        title: result.message_title,
                        message: result.message_content
                    });
                    table.ajax.reload();
                    $('#tf').modal('hide');
                    // document.getElementById("button").style.display = "block";
                    // document.getElementById("input_slider").style.display = "none";
                }else{
                    iziToast.error({
                        title: result.success,
                        message: result.error
                    });
                }
            },
            error: function (request, status, error) {
                iziToast.error({
                    title: 'Error',
                    message: error,
                });
            }
        });
    });
</script>
@endsection