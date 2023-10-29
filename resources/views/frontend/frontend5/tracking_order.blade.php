@extends('layouts.frontend_5.app')
<?php $asset = asset('frontend/assets5/'); ?>
@section('title')
    Tracking Order
@endsection

@section('content')
    <section class="blog" style="padding: 0">
        <div class="container">
            <div class="listing-inner px-5">
                <div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">
                    <form id="cek_tracking" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3 class="border-b pb-2 mb-2 text-center">Cek Pemesanan</h3>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label>ID Pemesanan</label>
                                <input type="text" name="id_pesanan" value="" placeholder="ID Pemesanan" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telp" value="" placeholder="No. Telepon" required>
                            </div>
                            <div class="form-group mb-2" style="text-align: center">
                                <button type="submit" class="nir-btn float-lg-end">Cek Pemesanan</button>
                            </div>
                    </form>
                </div>
            </div>
            <div id="detail"></div>
            <h4>Perlu Bantuan Pemesanan?</h4>
            <div class="sidebar-module-inner">
                <ul class="help-list">
                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Whatsapp</span>:
                        0813-3112-6991</li>
                    <li class="border-b pb-1 mb-1"><span class="font-weight-bold">Email</span>:
                        marketing@plesiranindonesia.com</li>
                </ul>
            </div>
            <h4>Mengapa Memesan Dengan Kami?</h4>
            <div class="sidebar-module-inner">
                <ul class="featured-list-sm">
                    <li class="border-b pb-2 mb-2">
                        <h6 class="mb-0">Tanpa Biaya Pemesanan</h6>
                        Kami tidak membebankan biaya tambahan untuk pemesanan
                    </li>
                    <li class="border-b pb-2 mb-2">
                        <h6 class="mb-0">Tidak Terlihat Pembatalan</h6>
                        Kami tidak membebankan biaya pembatalan atau modifikasi jika rencana berubah
                    </li>
                    <li class="border-b pb-2 mb-2">
                        <h6 class="mb-0">Konfirmasi Instant</h6>
                        Konfirmasi pemesanan instan apakah pemesanan online atau melalui whatsapp
                    </li>
                </ul>
            </div>
        </div>
    </section>
    
    {{-- <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <form action="" method="post">
                                @csrf
                                <div class="customer-information mb-4">
                                    <h3 class="border-b pb-2 mb-2 text-center">Cek Pemesanan</h3>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label>ID Pemesanan</label>
                                            <input type="text" name="first_name" value=""
                                                placeholder="ID Pemesanan" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>No. Telepon</label>
                                            <input type="text" name="first_name" value=""
                                                placeholder="No. Telepon" required>
                                        </div>
                                        <div class="form-group mb-2" style="text-align: center">
                                            <button type="submit" class="nir-btn float-lg-end w-50">Cek Pemesanan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('js')
    <script>
        $('#cek_tracking').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.tracking.cari') }}",
                contentType: "application/json;  charset=utf-8",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#status").fadeIn();
                    $("#preloader").delay(100).fadeIn("slow");
                    // document.getElementById('detail').innerHTML = '<div class="container">'+
                    //                                                 '<div class="custom-loader"></div>'+
                    //                                                 '</div>';
                },
                success: (result) => {
                    if (result.success == true) {
                        // alert(result.data.nama_tiket);
                        $("#preloader").delay(100).fadeOut("slow");
                        var x = document.getElementById('detail');
                        x.style.display = 'block';
                        x.innerHTML = '<div class="listing-inner px-5">'+
                                            '<div class="blog-full mb-4 border-b bg-white box-shadow p-4 rounded border-all">'+
                                                '<div class="border-b">'+
                                                    '<img src="{{ asset("frontend/assets5/") }}/images/logo_plesiran_new_black2.webp" width="200">'+
                                                '</div>'+
                                                '<div class="border-b mb-1">'+
                                                    '<div class="border-b mb-2" style="margin-top: 1%">'+
                                                        '<div>'+'<h5 style="margin: 0">'+result.data.nama_tiket+'</h5>'+'<span style="font-weight: 500">'+result.data.kode_tiket+'</span>'+' <span class="badge bg-'+result.data.color+'">'+result.data.status+'</span></div>'+
                                                    '</div>'+
                                                    '<table>'+
                                                        '<tr>'+
                                                            '<td>Nama Pemesan</td>'+
                                                            '<td>:</td>'+
                                                            '<td>'+result.data.nama_order+'</td>'+
                                                        '</tr>'+
                                                        '<tr>'+
                                                            '<td>Jumlah</td>'+
                                                            '<td>:</td>'+
                                                            '<td>'+result.data.qty+'</td>'+
                                                        '</tr>'+
                                                    '</table>'+
                                                '</div>'+
                                                '<div>'+
                                                    '<h6 style="margin-bottom: 1%">Team Trip</h6>'+
                                                    '<table>'+
                                                        '<thead>'+
                                                            '<tr>'+
                                                                '<td>Nama Team</td>'+
                                                                '<td>Jumlah</td>'+
                                                            '</tr>'+
                                                        '</thead>'+
                                                        '<tbody id="detail_team">'+
                                                        '</tbody>'+
                                                    '</table>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>';
                        var team = result.detail;
                        var txt = "";

                        team.forEach(data_team);

                        function data_team(value,index) {
                            txt =   '<tr>';
                            txt +=  '<td>'+value.nama_order+'</td>';
                            txt +=  '<td>'+value.qty+'</td>';
                            txt +=  '</tr>';
                        }

                        document.getElementById('detail_team').innerHTML = txt;
                    } else {
                        $("#preloader").delay(100).fadeOut("slow");
                        var x = document.getElementById('detail');
                        x.style.display = 'none';
                    }
                },
                error: function(request, status, error) {
                    // iziToast.error({
                    //     title: 'Error',
                    //     message: error,
                    // });
                }
            });
        })
    </script>
@endsection
