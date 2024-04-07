@extends('layouts.backend_new_2023.master')
@section('title')
    Event
@endsection
@section('css')
    <link href="{{ URL::asset('backend_new/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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

    <div class="row">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Events</h4>
                    <div class="btn-group mt-2 mb-2 pull-right">
                        <a href="{{ route('events.buat') }}" class="btn btn-primary">Tambah</a>
                        <button onclick="reload()" class="btn btn-primary">Reload</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Title</th>
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
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>

    <script>
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('events') }}",
            columns: [
                {
                    data: 'title',
                    name: 'title'
                },{
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
