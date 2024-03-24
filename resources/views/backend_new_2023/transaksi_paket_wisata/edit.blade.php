@extends('layouts.backend_new_2023.master')
@section('title')
    Detail {{ $transaksi_paket_wisata->kode . ' - ' . $transaksi_paket_wisata->nama_keberangkatan }}
@endsection
@section('css')
    <link href="{{ URL::asset('backend_new/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend_new/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
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
    @include('backend_new_2023.transaksi_paket_wisata.hotel.modalBuatHotel')
    @include('backend_new_2023.transaksi_paket_wisata.hotel.modalEditHotel')

    @include('backend_new_2023.transaksi_paket_wisata.maskapai.modalBuatMaskapai')
    @include('backend_new_2023.transaksi_paket_wisata.maskapai.modalEditMaskapai')

    @include('backend_new_2023.transaksi_paket_wisata.peserta.modalBuatPeserta')
    @include('backend_new_2023.transaksi_paket_wisata.peserta.modalEditPeserta')
    <div class="row">
        <div class="col-12">
            <form id="update-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Nama Pemberangkatan</label>
                        <div class="col-md-9">
                            <input type="text" name="nama_keberangkatan" class="form-control"
                                value="{{ $transaksi_paket_wisata->nama_keberangkatan }}" placeholder="Nama Pemberangkatan"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Jenis Tujuan</label>
                        <div class="col-md-9">
                            <select name="jenis_tujuan" class="form-control" id="">
                                <option value="">-- Pilih Jenis Tujuan --</option>
                                <option value="Nasional"
                                    {{ $transaksi_paket_wisata->jenis_tujuan == 'Nasional' ? 'selected' : null }}>Nasional
                                </option>
                                <option value="Internasional"
                                    {{ $transaksi_paket_wisata->jenis_tujuan == 'Internasional' ? 'selected' : null }}>
                                    Internasional</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Tujuan Wisata</label>
                        <div class="col-md-9">
                            <input type="text" name="tujuan_wisata" class="form-control"
                                value="{{ $transaksi_paket_wisata->tujuan_wisata }}" placeholder="Tujuan Wisata"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Objek Wisata</label>
                        <div class="col-md-9">
                            <div class="repeater">
                                <div data-repeater-list="group_destination">
                                    @foreach (json_decode($transaksi_paket_wisata->objek_wisata) as $objek_wisata)
                                        <div data-repeater-item class="row mb-3">
                                            <div class="col-11">
                                                <input type="text" name="destination" class="form-control"
                                                    value="{{ $objek_wisata->destination }}" placeholder="Objek Wisata"
                                                    id="">
                                            </div>
                                            <div class="col-1">
                                                <button data-repeater-delete type="button" class="btn btn-danger"><i
                                                        class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Jenis Keberangkatan</label>
                        <div class="col-md-9">
                            <select name="jenis_keberangkatan" class="form-control" id="">
                                <option value="">-- Pilih Jenis Keberangkatan --</option>
                                <option value="Berdasarkan Jadwal Tersedia"
                                    {{ $transaksi_paket_wisata->jenis_keberangkatan == 'Berdasarkan Jadwal Tersedia' ? 'selected' : null }}>Berdasarkan Jadwal Tersedia
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Durasi Wisata</label>
                        @php
                            $explode_durasi_wisata = explode('|', $transaksi_paket_wisata->durasi_wisata);
                        @endphp
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="durasi_hari" value="{{ $explode_durasi_wisata[0] }}"
                                            class="form-control" required>
                                        <div class="input-group-text">Hari</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="durasi_malam" value="{{ $explode_durasi_wisata[1] }}"
                                            class="form-control" required>
                                        <div class="input-group-text">Malam</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Waktu Keberangkatan</label>
                        <div class="col-md-9">
                            <input type="datetime-local" name="waktu_keberangkatan"
                                value="{{ $transaksi_paket_wisata->waktu_keberangkatan }}" class="form-control"
                                id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Kuota Peserta</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-text">Kuota</div>
                                <input type="text" name="kuota_peserta" class="form-control"
                                    value="{{ $transaksi_paket_wisata->kuota_peserta }}" required>
                                <div class="input-group-text">Pax</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Tour Leader</label>
                        <div class="col-md-9">
                            <div class="repeater">
                                <div data-repeater-list="group_tour_leader">
                                    @if (empty($transaksi_paket_wisata->tour_leader))
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-11">
                                            <input type="text" name="leader" class="form-control"
                                                placeholder="Leader"
                                                id="">
                                        </div>
                                        <div class="col-1">
                                            <button data-repeater-delete type="button" class="btn btn-danger"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    @else
                                        @foreach (json_decode($transaksi_paket_wisata->tour_leader) as $tour_leader)
                                            <div data-repeater-item class="row mb-3">
                                                <div class="col-11">
                                                    <input type="text" name="leader" class="form-control"
                                                        value="{{ $tour_leader->leader }}" placeholder="Objek Wisata"
                                                        id="">
                                                </div>
                                                <div class="col-1">
                                                    <button data-repeater-delete type="button" class="btn btn-danger"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Daftar Hotel</label>
                        <div class="col-md-9">
                            <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #891652; color: white">No</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Hotel</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Lokasi</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Jumlah Malam
                                        </th>
                                        <th class="text-center" style="background-color: #891652; color: white">Check-In
                                        </th>
                                        <th class="text-center" style="background-color: #891652; color: white">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="daftar_hotel"></tbody>
                            </table>
                            <button type="button" onclick="buatHotel()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Hotel</button>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Daftar Maskapai</label>
                        <div class="col-md-9">
                            <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #891652; color: white">No</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Nama
                                            Maskapai</th>
                                        <th class="text-center" style="background-color: #891652; color: white">No.
                                            Penerbangan</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Arah</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Waktu
                                            Penerbangan</th>
                                        <th class="text-center" style="background-color: #891652; color: white">Catatan
                                        </th>
                                        <th class="text-center" style="background-color: #891652; color: white">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="daftar_maskapai"></tbody>
                            </table>
                            <button type="button" onclick="buatMaskapai()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Maskapai</button>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Daftar Peserta</label>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-responsive peserta">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #891652; color: white">No</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Nama Peserta</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Email</th>
                                            <th class="text-center" style="background-color: #891652; color: white">No.Telepon</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="daftar_peserta">
                                    </tbody>
                                </table>
                                <button type="button" onclick="buatPeserta()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Peserta</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Catatan</label>
                        <div class="col-md-9">
                            <textarea name="remaks" class="form-control" id="" cols="30" rows="2">{{ $transaksi_paket_wisata->remaks }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/js/pages/sweet-alerts.init.js') }}"></script>
    <script>
        $('.repeater').repeater({
            show: function show() {
                $(this).slideDown();
            },
            hide: function hide(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function ready(setIndexes) {}
        });

        function buatHotel() {
            $('#buatHotel').modal('show');
        };

        function buatMaskapai() {
            $('#buatMaskapai').modal('show');
        };

        function buatPeserta() {
            $('#buatPeserta').modal('show');
        };

        function detailHotel() {
            $.ajax({
                type: 'GET',
                url: "{{ route('b.transaksi_paket_wisata.detail_wisata_hotel',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                                                                            "<td colspan='6'>Loading...</td>"+
                                                                        "</tr>";
                },
                success: function(result){
                    if (result.success == true) {
                        var dataHotel = result.data;
                        var txt = "";
                        dataHotel.forEach(hasil_hotel);
                        function hasil_hotel(value, index)
                        {
                            txt = txt+"<tr>";
                            txt = txt+  "<td class='text-center'>"+value.no+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.nama_hotel+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.lokasi+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.jumlah_malam+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.check_in+"</td>";
                            txt = txt+  "<td class='text-center'>"+
                                            "<div class='btn-group'>"+
                                                "<button type='button' onclick='editHotel(`"+value.id+"`)' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></button>"+
                                                "<button type='button' onclick='deleteHotel(`"+value.id+"`)' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>"
                                            "</div>"+
                                        +"</td>";
                            txt = txt+"</tr>";
                        }
                        document.getElementById('daftar_hotel').innerHTML = txt;
                    }else{
                        document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                                                                                "<td colspan='6'>Data Hotel Belum Tersedia</td>"+
                                                                            "</tr>";
                    }
                },
                error: function (request, status, error) {
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
            })
        };

        function editHotel(t_paket_wisata_id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/management_administrasi/transaksi_paket_wisata/'.$transaksi_paket_wisata->kode.'/'.$transaksi_paket_wisata->id.'/hotel/') }}"+'/'+t_paket_wisata_id+'/'+'edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    // document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                    //                                                         "<td colspan='6'>Loading...</td>"+
                    //                                                     "</tr>";
                },
                success: function(result){
                    if (result.success == true) {
                        $('#edit_hotel_id').val(result.data.id);
                        $('#edit_hotel_lokasi').val(result.data.lokasi);
                        $('#edit_hotel_nama_hotel').val(result.data.nama_hotel);
                        $('#edit_hotel_jumlah_malam').val(result.data.jumlah_malam);
                        $('#edit_hotel_checkin').val(result.data.check_in);
                        $('#editHotel').modal('show');
                    } else {

                    }
                },
                error: function (request, status, error) {
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
            })
        };

        function deleteHotel(t_paket_wisata_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('b/management_administrasi/transaksi_paket_wisata/'.$transaksi_paket_wisata->kode.'/'.$transaksi_paket_wisata->id.'/hotel/') }}"+'/'+t_paket_wisata_id+'/'+'delete',
                        contentType: "application/json;  charset=utf-8",
                        cache: false,
                        beforeSend: function(){
                            document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                                                                                    "<td colspan='6'>Loading...</td>"+
                                                                                "</tr>";
                        },
                        success: function(result){
                            if (result.success == true) {
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
                                detailHotel();
                            }else{
                                toastr["error"](result.message_content);
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
                        error: function (request, status, error) {
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
                } else if ( // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel) {

                }
            });
        };

        $('#update-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.update',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('.modalloading').modal('show');
                },
                success: (result) => {
                    if(result.success != false){
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
                        setInterval(() => {
                            window.location="{{ route('b.transaksi_paket_wisata.detail',['kode' => $transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}";
                        }, 3000);
                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        $('#upload-form-hotel').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.simpan_hotel_wisata',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
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
                        // this.reset();
                        $('#buatHotel').modal('hide');
                        detailHotel();
                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        $('#update-form-hotel').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.update_hotel_wisata',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
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
                        // this.reset();
                        $('#editHotel').modal('hide');
                        detailHotel();
                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        function detailMaskapai() {
            $.ajax({
                type: 'GET',
                url: "{{ route('b.transaksi_paket_wisata.detail_wisata_maskapai',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                                                                            "<td colspan='6'>Loading...</td>"+
                                                                        "</tr>";
                },
                success: function(result){
                    if (result.success == true) {
                        var dataMaskapai = result.data;
                        var txt = "";
                        dataMaskapai.forEach(hasil_maskapai);
                        function hasil_maskapai(value, index)
                        {
                            txt = txt+"<tr>";
                            txt = txt+  "<td class='text-center'>"+value.no+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.nama_maskapai+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.no_penerbangan+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.arah+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.jam_berangkat+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.remaks+"</td>";
                            txt = txt+  "<td class='text-center'>"+
                                            "<div class='btn-group'>"+
                                                "<button type='button' onclick='editMaskapai(`"+value.id+"`)' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></button>"+
                                                "<button type='button' onclick='deleteMaskapai(`"+value.id+"`)' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>"
                                            "</div>"+
                                        +"</td>";
                            txt = txt+"</tr>";
                        }
                        document.getElementById('daftar_maskapai').innerHTML = txt;
                    }else{
                        document.getElementById('daftar_maskapai').innerHtml = "<tr>"+
                                                                                "<td colspan='6'>Data Hotel Belum Tersedia</td>"+
                                                                            "</tr>";
                    }
                },
                error: function (request, status, error) {
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
            })
        };

        function editMaskapai(t_paket_wisata_id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/management_administrasi/transaksi_paket_wisata/'.$transaksi_paket_wisata->kode.'/'.$transaksi_paket_wisata->id.'/maskapai/') }}"+'/'+t_paket_wisata_id+'/'+'edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    // document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                    //                                                         "<td colspan='6'>Loading...</td>"+
                    //                                                     "</tr>";
                },
                success: function(result){
                    if (result.success == true) {
                        $('#edit_maskapai_id').val(result.data.id);
                        $('#edit_maskapai_nama_maskapai').val(result.data.nama_maskapai);
                        $('#edit_maskapai_no_penerbangan').val(result.data.no_penerbangan);
                        $('#edit_maskapai_arah').val(result.data.arah);
                        $('#edit_maskapai_jam_berangkat').val(result.data.jam_berangkat);
                        $('#edit_maskapai_remaks').val(result.data.remaks);
                        $('#editMaskapai').modal('show');
                    } else {

                    }
                },
                error: function (request, status, error) {
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
            })
        };

        function deleteMaskapai(t_paket_wisata_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('b/management_administrasi/transaksi_paket_wisata/'.$transaksi_paket_wisata->kode.'/'.$transaksi_paket_wisata->id.'/maskapai/') }}"+'/'+t_paket_wisata_id+'/'+'delete',
                        contentType: "application/json;  charset=utf-8",
                        cache: false,
                        beforeSend: function(){
                            document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                                                                                    "<td colspan='6'>Loading...</td>"+
                                                                                "</tr>";
                        },
                        success: function(result){
                            if (result.success == true) {
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
                                detailMaskapai();
                            }else{
                                toastr["error"](result.message_content);
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
                        error: function (request, status, error) {
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
                } else if ( // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel) {

                }
            });
        };

        $('#upload-form-maskapai').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.simpan_maskapai_wisata',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
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
                        // this.reset();
                        $('#buatMaskapai').modal('hide');

                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        $('#update-form-maskapai').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.update_maskapai_wisata',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                },
                success: (result) => {
                    if(result.success != false){
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
                        // this.reset();
                        $('#editMaskapai').modal('hide');
                        detailMaskapai();
                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        function detailPeserta() {
            $.ajax({
                type: 'GET',
                url: "{{ route('b.transaksi_paket_wisata.detail_wisata_peserta',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                                                                            "<td colspan='6'>Loading...</td>"+
                                                                        "</tr>";
                },
                success: function(result){
                    if (result.success == true) {
                        var dataPeserta = result.data;
                        var txt = "";
                        dataPeserta.forEach(hasil_peserta);
                        function hasil_peserta(value, index)
                        {
                            txt = txt+"<tr>";
                            txt = txt+  "<td class='text-center'>"+value.no+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.nama_peserta+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.email+"</td>";
                            txt = txt+  "<td class='text-center'>"+value.no_telp+"</td>";
                            txt = txt+  "<td class='text-center'>"+
                                            "<div class='btn-group'>"+
                                                "<button type='button' onclick='editPeserta(`"+value.id+"`)' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></button>"+
                                                "<button type='button' onclick='deletePeserta(`"+value.id+"`)' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>"
                                            "</div>"+
                                        +"</td>";
                            txt = txt+"</tr>";
                        }
                        document.getElementById('daftar_peserta').innerHTML = txt;
                    }else{
                        document.getElementById('daftar_peserta').innerHtml = "<tr>"+
                                                                                "<td colspan='6'>Data Peserta Belum Tersedia</td>"+
                                                                            "</tr>";
                    }
                },
                error: function (request, status, error) {
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
            })
        };

        function editPeserta(t_paket_wisata_id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/management_administrasi/transaksi_paket_wisata/'.$transaksi_paket_wisata->kode.'/'.$transaksi_paket_wisata->id.'/peserta/') }}"+'/'+t_paket_wisata_id+'/'+'edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                beforeSend: function(){
                    // document.getElementById('daftar_hotel').innerHtml = "<tr>"+
                    //                                                         "<td colspan='6'>Loading...</td>"+
                    //                                                     "</tr>";
                },
                success: function(result){
                    if (result.success == true) {
                        $('#edit_peserta_id').val(result.data.id);
                        $('#edit_peserta_nama_peserta').val(result.data.nama_peserta);
                        $('#edit_peserta_email').val(result.data.email);
                        $('#edit_peserta_no_telepon').val(result.data.no_telp);
                        $('#editPeserta').modal('show');
                    } else {

                    }
                },
                error: function (request, status, error) {
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
            })
        };

        $('#upload-form-peserta').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.simpan_peserta_wisata',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
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
                        // this.reset();
                        $('#buatPeserta').modal('hide');
                        this.reset();
                        detailPeserta();
                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        $('#update-form-peserta').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('b.transaksi_paket_wisata.update_peserta_wisata',['kode'=>$transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                },
                success: (result) => {
                    if(result.success != false){
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
                        // this.reset();
                        $('#editPeserta').modal('hide');
                        detailPeserta();
                    }else{
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
                        // alert('test');
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                    }
                },
                error: function (request, status, error) {
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

        $(document).ready(function(){
            detailHotel();
            detailMaskapai();
            detailPeserta();
        })
    </script>
@endsection
