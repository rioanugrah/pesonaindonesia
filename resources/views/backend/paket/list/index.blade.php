@extends('layouts.backend_2.app')
@section('title')
    {{ $pakets->nama_paket }}
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
@include('backend.paket.list.modalBuat')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">@yield('title')</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Paket</li>
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
                {{-- <h6 class="card-title">Paket Wisata</h6> --}}
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paket</th>
                                <th>Kategori Paket</th>
                                {{-- <th>Deskripsi</th> --}}
                                <th>Jumlah Paket</th>
                                <th>Harga</th>
                                <th>Diskon</th>
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
<script src="{{ asset('backend/assets2/js/ckeditor/ckeditor.js') }}"></script>
{{-- <script src="{{ asset('backend/assets2/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/js/pages/form-editor.init.js') }}"></script> --}}
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('paket.list',['id' => $pakets->id]) }}",
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'nama_paket',
                name: 'nama_paket'
            },
            {
                data: 'kategori_paket_id',
                name: 'kategori_paket_id'
            },
            {
                data: 'jumlah_paket',
                name: 'jumlah_paket'
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'diskon',
                name: 'diskon'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    // CKEDITOR.replace('ckeditor1', {
    //     extraPlugins: 'editorplaceholder',
    //     editorplaceholder: 'Start typing here...',
    //     removeButtons: 'PasteFromWord'
    // });
    ClassicEditor.create(document.getElementById('ckeditor1'));

    function buat() {
        $('#buat').modal('show');
    };

    function reload() {
        table.ajax.reload();
    }

    $('#upload-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('paket.list.simpan',['id' => $pakets->id]) }}",
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