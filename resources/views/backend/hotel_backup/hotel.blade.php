@extends('layouts.backend_4.app')

@section('title')
    Hotel
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend_2/vendors/data-tables/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_2/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_2/vendors/data-tables/css/select.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_2/css/pages/data-tables.css') }}">
@endsection

@section('content')
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">Scroll - vertical And Horizontal
                                </h4>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Hotel</th>
                                                    <th>Alamat</th>
                                                    <th>Kamar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('backend_2/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend_2/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend_2/vendors/data-tables/js/dataTables.select.min.js') }}"></script>
<script>
    // $('#scroll-vert-hor').DataTable({
    //     "scrollY": 200,
    //     "scrollX": true
    // })
    var table =$('#page-length-option').DataTable({
        "responsive": true,
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
    })
</script>
@endsection