@extends('layouts.backend_2.app')

@section('title')
    Kerjasama
@endsection

@section('css')
<link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />

@endsection

@section('content')
@include('backend.cooperation.modalBuat')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Kerjasama</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kerjasama</li>
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
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Perusahaan</th>
                            <th>Alamat</th>
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
@endsection

@section('js')
    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets2/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend/assets2/js/pages/datatables.init.js') }}"></script>
    
    <script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('cooperation') }}",
            columns: [{
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan'
                },
                // {data: 'barcode', name: 'barcode'},
                {
                    data: 'alamat_perusahaan',
                    name: 'alamat_perusahaan'
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
            $('.upload').dropify();
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

        $(function() {
        'use strict'

        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
        if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
        }
        });

        $('#provinsi').on('change',function(){
            axios.post('{{ url('cooperation/kab_kota') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kab_kota').empty();

                $.each(response.data, function (id, nama) {
                    $('#kab_kota').append(new Option(nama, id))
                })
            });
        });

        function buat() {
            $('#buat').modal('show');
        };

        function reload() {
            table.ajax.reload();
        }

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('cooperation.simpan') }}",
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

    </script>
@endsection
