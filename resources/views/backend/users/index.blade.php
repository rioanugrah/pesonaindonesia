@extends('layouts.backend.app')

@section('title')
    Users
@endsection

@section('css')
    <link href="{{ asset('backend/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/iziToast.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
        </ol>
    </nav>
    @include('backend.users.modalBuat')
    @include('backend.users.modalEdit')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Pengguna</h6>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Akses</th>
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
            ajax: "{{ route('pengguna') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                // {data: 'barcode', name: 'barcode'},
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $(window).keydown(function(e) {
            if (e.keyCode == 113) {
                // alert('hello');
                $('#buat').modal('show');
                // iziToast.success({
                //     title: 'Hey',
                //     message: 'What would you like to add?'
                // });
                e.preventDefault();
            } else if (e.keyCode == 114) {
                table.ajax.reload();
                e.preventDefault();
            } else if (e.keyCode == 115) {
                $('#modalBarcode').modal('show');
                e.preventDefault();
            };
        });

        $(function() {
            'use strict';

            $('.fasilitas').tagsInput({
                'width': '100%',
                'height': '75%',
                'interactive': true,
                'defaultText': 'Add More',
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 20,
                'placeholderColor': '#666666'
            });
        });

        $(function() {
            'use strict';
            $('.upload').dropzone({
                url: '{{ url("/") }}'
            });
        });

        $(function() {
            'use strict';

            //Tinymce editor
            if ($(".editor").length) {
                tinymce.init({
                    selector: '.editor',
                    height: 400,
                    default_text_color: 'red',
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                    ],
                    toolbar1: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                    image_advtab: true,
                    templates: [{
                            title: 'Test template 1',
                            content: 'Test 1'
                        },
                        {
                            title: 'Test template 2',
                            content: 'Test 2'
                        }
                    ],
                    content_css: []
                });
            }

        });

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('pengguna.simpan') }}",
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

        function edit(id) {
            $.ajax({
                type:'GET',
                url: "{{ url('pengguna') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: (result) => {
                    // alert(id);
                    $('#edit').modal('show');
                    document.getElementById('edit_pengguna').innerHTML = 'Edit - '+result.data.name;
                    $('#edit_id').val(result.data.id);
                    $('#edit_name').val(result.data.name);
                    $('#edit_email').val(result.data.email);
                    $('#edit_role').val(result.data.role);
                },
                error: function (request, status, error) {
                    iziToast.error({
                        title: 'Error',
                        message: error,
                    });
                }
            });
        }

        $('#edit-upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('pengguna.update') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        $('#edit').modal('hide');
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

        function hapus(id) {
            $.ajax({
                type:'GET',
                url: "{{ url('pengguna') }}"+'/delete/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message
                        });
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
        }

    </script>
@endsection
