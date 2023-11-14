@extends('layouts.backend_new_2023.master')
@section('title')
    Promosi
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
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('b.promosi.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Create</a>
                    <button onclick="reload()" class="btn btn-primary"><i class="mdi mdi-reload"></i> Reload</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Nama Promosi</th>
                                <th>Deskripsi</th>
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
    <script src="{{ URL::asset('backend_new/libs/ckeditor/ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('b.promosi') }}",
            columns: [{
                    data: 'images',
                    name: 'images'
                },
                {
                    data: 'nama_promosi',
                    name: 'nama_promosi'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        function reload() {
            table.ajax.reload();
        }
    </script>
@endsection
