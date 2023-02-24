@extends('layouts.backend_2.app')

@section('title')
    Events
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('backend/assets2/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />

@endsection

@section('content')
{{-- @include('backend.events.modalBuat') --}}
@include('backend.events.modalEdit')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Events</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="Events">Events</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-md-block">
                <div class="btn-group">
                    <a href="{{ route('events.buat') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i> Buat
                    </a>
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
                                <th>Title</th>
                                {{-- <th>Deskripsi</th> --}}
                                <th>Lokasi</th>
                                <th>Start Event</th>
                                <th>Finish Event</th>
                                <th>Image</th>
                                <th>Kuota</th>
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
{{-- <script src="{{ asset('backend/assets2/libs/dropzone/min/dropzone.min.js') }}"></script> --}}

<script src="{{ asset('backend/assets2/js/pages/form-editor.init.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/tinymce/tinymce.min.js') }}"></script>

<script>
    var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('events') }}",
            columns: [
                {
                    data: 'title',
                    name: 'title'
                },
                // {
                //     data: 'deskripsi',
                //     name: 'deskripsi'
                // },
                {
                    data: 'location',
                    name: 'location'
                },
                {
                    data: 'start_event',
                    name: 'start_event'
                },
                {
                    data: 'finish_event',
                    name: 'finish_event'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'kuota',
                    name: 'kuota'
                },
                {
                    data: 'is_event',
                    name: 'is_event'
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

        function edit(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/events') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    $('#edit_id').val(result.data.id);
                    $('#edit_title').val(result.data.title);
                    $('#edit_deskripsi').val(result.data.deskripsi);
                    $('#edit_location').val(result.data.location);
                    $('#edit_start_event').val(result.data.start_event);
                    $('#edit_finish_event').val(result.data.finish_event);
                    // $('#edit_nama_slider').val(result.slider.nama_slider);
                    // $('#edit_status').val(result.slider.status);
                    $('#modal_edit').modal('show');
                },
                error: function (request, status, error) {
                    iziToast.error({
                        title: 'Error',
                        message: error,
                    });
                }
            })
        }

        function hapus(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/events/delete') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    iziToast.success({
                        title: result.message_title,
                        message: result.message_content
                    });
                    table.ajax.reload();
                },
                error: function (request, status, error) {
                    iziToast.error({
                        title: 'Error',
                        message: error,
                    });
                }
            })
        }

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('events.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        this.reset();
                        table.ajax.reload();
                        $('#modal_buat').modal('hide');
                    }else{
                        iziToast.error({
                            title: result.message_title,
                            message: result.message_content
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