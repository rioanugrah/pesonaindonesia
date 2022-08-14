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
@include('backend.cooperation.modalUpload')
@include('backend.cooperation.modalDetail')
@include('backend.cooperation.modalEdit')
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
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                {{-- <th>Upload Berkas</th> --}}
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
    {{-- <script src="{{ asset('backend/assets2/js/pages/form-advanced.init.js') }}"></script> --}}
    
    {{-- <script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                // {
                //     data: 'berkas',
                //     name: 'berkas'
                // },
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

        $('#status-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('cooperation.status') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        $('#detail').modal('hide');
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

        function berkas(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/cooperation') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    document.getElementById('berkas_modal_title').innerHTML = result.cooperation.nama_perusahaan;
                    document.getElementById('berkas_nama').innerHTML = result.cooperation.nama;
                    document.getElementById('berkas_nama_perusahaan').innerHTML = result.cooperation.nama_perusahaan;
                    document.getElementById('berkas_alamat_perusahaan').innerHTML = result.cooperation.alamat_perusahaan;
                    $('#berkas_id').val(result.cooperation.id);
                    // $('#berkas_nama_perusahaan').val(result.cooperation.nama_perusahaan);
                    // $('#edit_alamat_perusahaan').val(result.perusahaan.alamat_perusahaan);
                    // $('#edit_penanggung_jawab').val(result.perusahaan.penanggung_jawab);
                    // $('#edit_jabatan').val(result.perusahaan.jabatan);
                    // $('#edit_siup').val(result.perusahaan.siup);
                    // $('#edit_npwp').val(result.perusahaan.npwp);

                    $('#upload').modal('show');
                }
            })
        }

        function detail(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/cooperation') }}"+'/'+id,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    // document.getElementById('berkas_modal_title').innerHTML = result.cooperation.nama_perusahaan;
                    // document.getElementById('detail_nama_perusahaan').innerHTML = result.cooperation.nama_perusahaan;
                    $('#detail_id').val(result.cooperation.id);
                    $('#detail_nama').val(result.cooperation.nama);
                    $('#detail_email').val(result.cooperation.email);
                    $('#detail_nama_perusahaan').val(result.cooperation.nama_perusahaan);
                    $('#detail_alamat_perusahaan').val(result.cooperation.alamat_perusahaan);
                    $('#detail_provinsi').val(result.cooperation.provinsi);
                    $('#detail_kabkota').val(result.cooperation.kab_kota);
                    $('#detail_kodepos').val(result.cooperation.kode_pos);
                    // document.getElementById('pdfViewer').innerHTML = '<iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ asset("backend/berkas/coorporate") }}/'+result.cooperation.berkas+'" frameborder="0" style="width: 100%; height: 560px"></iframe>'
                    document.getElementById('pdfViewer').innerHTML = '<iframe src="{{ asset("backend/berkas/coorporate") }}/'+result.cooperation.berkas+'" frameborder="0" style="width: 100%; height: 560px"></iframe>'
                    // document.getElementById('berkas_nama_perusahaan').innerHTML = result.cooperation.nama_perusahaan;
                    // document.getElementById('berkas_alamat_perusahaan').innerHTML = result.cooperation.alamat_perusahaan;

                    $('#detail').modal('show');
                }
            })
        }

        function edit(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/cooperation') }}"+'/'+id+'/edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result){
                    // document.getElementById('berkas_modal_title').innerHTML = result.cooperation.nama_perusahaan;
                    // document.getElementById('detail_nama_perusahaan').innerHTML = result.cooperation.nama_perusahaan;
                    $('#edit_id').val(result.cooperation.id);
                    $('#edit_nama').val(result.cooperation.nama);
                    $('#edit_email').val(result.cooperation.email);
                    $('#edit_nama_perusahaan').val(result.cooperation.nama_perusahaan);
                    $('#edit_alamat_perusahaan').val(result.cooperation.alamat_perusahaan);
                    $('#edit_kategori').val(result.cooperation.kategori);
                    $('.edit_provinsi').val(result.cooperation.provinsi);
                    $('.edit_kabkota').val(result.cooperation.kab_kota);
                    $('#edit_kodepos').val(result.cooperation.kode_pos);
                    $('#edit_telp_kantor').val(result.cooperation.telp_kantor);
                    $('#edit_telp_selular').val(result.cooperation.telp_selular);
                    $('#edit_no_fax').val(result.cooperation.no_fax);
                    
                    document.getElementById('edit_title').innerHTML = result.cooperation.nama_perusahaan;
                    // $('#edit_nama').val(result.cooperation.nama);
                    
                    // document.getElementById('pdfViewer').innerHTML = '<iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ asset("backend/berkas/coorporate") }}/'+result.cooperation.berkas+'" frameborder="0" style="width: 100%; height: 560px"></iframe>'
                    // document.getElementById('pdfViewer').innerHTML = '<iframe src="{{ asset("backend/berkas/coorporate") }}/'+result.cooperation.berkas+'" frameborder="0" style="width: 100%; height: 560px"></iframe>'
                    // document.getElementById('berkas_nama_perusahaan').innerHTML = result.cooperation.nama_perusahaan;
                    // document.getElementById('berkas_alamat_perusahaan').innerHTML = result.cooperation.alamat_perusahaan;

                    $('#edit').modal('show');
                }
            })
        }

        $('#berkas-form').submit(function(e) {
            // alert('coba');
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('cooperation.upload_berkas') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        iziToast.success({
                            title: result.message_title,
                            message: result.message_content
                        });
                        // this.reset();
                        $('#upload').modal('hide');
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
