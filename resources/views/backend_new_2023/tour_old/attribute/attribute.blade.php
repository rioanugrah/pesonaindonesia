@extends('layouts.backend_new_2023.master')

@section('title')
    Tour Attribute
@endsection

@section('css')
    <link href="{{ URL::asset('backend_new/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @yield('title')
        @endslot
        @slot('title')
            @yield('title')
        @endslot
    @endcomponent

    @include('backend_new_2023.tour.attribute.modalBuat')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Attribute</div>
                    <div class="btn-group mt-2 mb-2 pull-right">
                        <button onclick="buat()" class="btn btn-primary">Tambah</button>
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Attribute</th>
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

@section('script')
    <script src="{{ URL::asset('backend_new/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tour.attribute') }}",
            columns: [
                {
                    data: 'nama_attribute',
                    name: 'nama_attribute'
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
            $('.modalBuat').modal('show');
        };

        function reload() {
            table.ajax.reload();
        }

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type: 'POST',
                url: "{{ route('tour.attribute.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success != false) {
                        toastr["success"](result.message_content);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        this.reset();
                        $('#buat').modal('close');
                        table.ajax.reload();
                    } else {
                        toastr["error"](result.error);
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(request, status, error) {
                    toastr["error"](error);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
        });
    </script>
@endsection
