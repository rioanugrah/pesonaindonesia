@extends('layouts.backend_2.app')

@section('title')SEO | Post @endsection

@section('css')
<link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />

@endsection

@section('content')
@include('backend.seo.post.modalBuat')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">SEO | Post</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">SEO Post</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-md-block">
                <div class="btn-group">
                    <a href="{{ route('sitemap') }}" class="btn btn-success" target="_blank">
                        <i class="mdi mdi-plus"></i> Sitemap All
                    </a>
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
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th>Slug</th>
                            <th>Body</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('post') }}",
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'body',
                    name: 'body',
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
                url: "{{ url('b/perusahaan') }}"+'/'+id+'/edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    document.getElementById('edit_modal_title').innerHTML = result.perusahaan.nama_perusahaan;
                    $('#edit_id').val(result.perusahaan.id);
                    $('#edit_nama_perusahaan').val(result.perusahaan.nama_perusahaan);
                    $('#edit_alamat_perusahaan').val(result.perusahaan.alamat_perusahaan);
                    $('#edit_penanggung_jawab').val(result.perusahaan.penanggung_jawab);
                    $('#edit_jabatan').val(result.perusahaan.jabatan);
                    $('#edit_siup').val(result.perusahaan.siup);
                    $('#edit_npwp').val(result.perusahaan.npwp);

                    $('#edit').modal('show');
                }
            })
        }

        function hapus(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/perusahaan/delete') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        table.ajax.reload();
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
            })
        }

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('post.simpan') }}",
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

        $('#edit-upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('perusahaan.update') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        $('#modal_edit').modal('hide');
                        table.ajax.reload();
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