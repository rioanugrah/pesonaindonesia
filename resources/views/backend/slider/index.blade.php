@extends('layouts.backend.app')

@section('title')
    Slider Website
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
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </nav>
    @include('backend.slider.modalBuat')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Slider</h6>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
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

        function disable() {
            // document.getElementById("input_slider").disabled = true;
            // $("#input_slider").hide();
            document.getElementById("button").style.display = "none";
        }
        function enable() {
            document.getElementById("input_slider").style.display = "block";
            document.getElementById("button").style.display = "none";
        }
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('slider') }}",
            columns: [{
                    data: 'nama_slider',
                    name: 'nama_slider'
                },
                {
                    data: 'image',
                    name: 'image'
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

        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('slider.simpan') }}",
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
                        document.getElementById("button").style.display = "block";
                        document.getElementById("input_slider").style.display = "none";
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
