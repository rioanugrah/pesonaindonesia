@extends('layouts.backend_2.app')

@section('title')
    Hotel
@endsection

@section('css')
<link href="{{ asset('backend/assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />

@endsection

@section('content')
@include('backend.hotel.modalBuat')
@include('backend.hotel.modalEdit')
@include('backend.hotel.modalUploadImage')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Data Hotel</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Hotel</li>
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
                                <th>Nama Hotel</th>
                                <th>Alamat</th>
                                <th>Kamar</th>
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
    <script src="{{ asset('backend/assets2/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <script src="{{ asset('backend/assets2/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script>
    
    {{-- <script src="{{ asset('backend/assets2/js/form-wizard.init.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/assets2/js/app.js') }}"></script> --}}
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('hotel') }}",
            columns: [{
                    data: 'nama_hotel',
                    name: 'nama_hotel'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'kamar',
                    name: 'kamar'
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

        $(document).ready(function () {
            'use strict';

            $('.repeater').repeater({
                defaultValues: {
                    'textarea-input': 'foo',
                    'text-input': 'bar',
                    'select-input': 'B',
                    'checkbox-input': ['A', 'B'],
                    'radio-input': 'B'
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {

                }
            });
        });

        function gambar(id) {
            // const data = id;
            $.ajax({
                type: 'GET',
                url: "{{ url('b/hotel') }}"+'/'+id+'/image',
                // url: "{{ route('hotel.edit', ['id' => "+data+"]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    // alert(result.hotel.id);
                    document.getElementById('image_title').innerHTML = 'Hotel '+result.hotel.nama_hotel;
                    $('#image_id').val(result.hotel.id);

                    $('#modal_image').modal('show');
                }
            })
        }

        function edit(id) {
            // const data = id;
            $.ajax({
                type: 'GET',
                url: "{{ url('b/hotel') }}"+'/'+id+'/edit',
                // url: "{{ route('hotel.edit', ['id' => "+data+"]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    // alert(result.hotel.id);
                    document.getElementById('edit_modal_title').innerHTML = 'Hotel '+result.hotel.nama_hotel;
                    $('#edit_id').val(result.hotel.id);
                    $('#edit_nama_hotel').val(result.hotel.nama_hotel);
                    $('#edit_alamat_hotel').val(result.hotel.alamat);
                    $('#edit_deskripsi_hotel').val(result.hotel.deskripsi);
                    $('#edit_layanan').val(result.hotel.layanan);

                    $('#modal_edit').modal('show');
                }
            })
        }

        function hapus(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/hotel/delete') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    iziToast.success({
                        title: result.message_title,
                        message: result.message_content
                    });
                    table.ajax.reload();
                }
            })
        }

        // $('a[href$="#finish"]').click(function(e) {
        //     alert('Test');
        // })

        // $(".number-tab-steps").steps({
        //     headerTag: "h6",
        //     bodyTag: "fieldset",
        //     transitionEffect: "fade",
        //     titleTemplate: '#index# #title#',
        //     labels: {
        //         finish: 'Submit'
        //     },
        //     onFinished: function (event, currentIndex) {
        //         alert("Form submitted.");
        //     }
        // });
        $('#upload-image').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('hotel.upload_image') }}",
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

        $(".number-tab-steps").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide",
            // titleTemplate: '#index# #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function (event, currentIndex) {
                // alert("Form submitted.");
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ route('hotel.simpan') }}",
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
            }
        });

        // $('#upload-form').click(function(e) {
        //     e.preventDefault();
        //     let formData = new FormData(this);
        //     $.ajax({
        //         type:'POST',
        //         url: "{{ route('hotel.simpan') }}",
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: (result) => {
        //             if(result.success != false){
        //                 iziToast.success({
        //                     title: result.message_title,
        //                     message: result.message_content
        //                 });
        //                 this.reset();
        //                 table.ajax.reload();
        //             }else{
        //                 iziToast.error({
        //                     title: result.success,
        //                     message: result.error
        //                 });
        //             }
        //         },
        //         error: function (request, status, error) {
        //             iziToast.error({
        //                 title: 'Error',
        //                 message: error,
        //             });
        //         }
        //     });
        // });
        $('.provinsi').on('change',function(){
            axios.post('{{ url('hotel/kab_kota') }}', {id: $(this).val()})
            .then(function (response) {
                $('.kota_kabupaten').empty();

                $.each(response.data, function (id, nama) {
                    $('.kota_kabupaten').append(new Option(nama, id))
                })
            });
        });
        $('.kota_kabupaten').on('change',function(){
            axios.post('{{ url('hotel/kecamatan') }}', {id: $(this).val()})
            .then(function (response) {
                $('.kecamatan').empty();

                $.each(response.data, function (id, nama) {
                    $('.kecamatan').append(new Option(nama, id))
                })
            });
        });

        $('#edit-upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('hotel.update') }}",
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
