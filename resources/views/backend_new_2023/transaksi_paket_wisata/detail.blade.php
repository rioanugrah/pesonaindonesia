@extends('layouts.backend_new_2023.master')
@section('title')
    Detail {{ $transaksi_paket_wisata->kode.' - '.$transaksi_paket_wisata->nama_keberangkatan }}
@endsection

@section('css')
    <link href="{{ URL::asset('backend_new/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend_new/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    {{-- @component('common-components.breadcrumb')
        @slot('pagetitle')
            @yield('title')
        @endslot
        @slot('title')
            @yield('title')
        @endslot
    @endcomponent --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <div>
                        {!! \DNS2D::getBarcodeHTML($transaksi_paket_wisata->id, 'QrCode',4,4) !!}
                    </div>
                </div> --}}
                <div class="card-body">
                    {{-- <h5>@yield('title')</h5> --}}
                    @php
                        $explode_durasi_wisata = explode('|',$transaksi_paket_wisata->durasi_wisata);
                    @endphp
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label for="" style="text-transform: uppercase">Kode Keberangkatan</label>
                                <div>{{ $transaksi_paket_wisata->kode }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label for="" style="text-transform: uppercase">Jenis Tujuan</label>
                                <div>{{ $transaksi_paket_wisata->jenis_tujuan }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label for="" style="text-transform: uppercase">Durasi Wisata</label>
                                <div>{{ $explode_durasi_wisata[0].' Hari '.$explode_durasi_wisata[1].' Malam' }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <label class="col-md-3">Nama Pemberangkatan</label>
                        <div class="col-md-9">
                            <div>{{ $transaksi_paket_wisata->nama_keberangkatan }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Jenis Tujuan</label>
                        <div class="col-md-9">
                            <div>{{ $transaksi_paket_wisata->jenis_tujuan }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Tujuan Wisata</label>
                        <div class="col-md-9">
                            @if (empty($transaksi_paket_wisata->tujuan_wisata))
                            <div style="color: red; font-style: italic">Belum diatur</div>
                            @else
                            <div>{{ $transaksi_paket_wisata->tujuan_wisata }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Durasi Wisata</label>
                        <div class="col-md-9">
                            <div>{{ $explode_durasi_wisata[0].' Hari '.$explode_durasi_wisata[1].' Malam' }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Jenis Keberangkatan</label>
                        <div class="col-md-9">
                            <div>{{ $transaksi_paket_wisata->jenis_keberangkatan }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Waktu Keberangkatan</label>
                        <div class="col-md-9">
                            <div>{{ \Carbon\Carbon::create($transaksi_paket_wisata->waktu_keberangkatan)->isoFormat('LLLL') }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Jumlah Pax</label>
                        <div class="col-md-9">
                            <div>{{ $transaksi_paket_wisata->detail_wisata_peserta->count() }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Kuota Peserta</label>
                        <div class="col-md-9">
                            <div>{{ $transaksi_paket_wisata->kuota_peserta }}</div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Tour Leader</label>
                        <div class="col-md-9">
                            @if (empty($transaksi_paket_wisata->tour_leader))
                            <div style="color: red; font-style: italic">Belum tersedia</div>
                            @else
                            <ol>
                                @foreach (json_decode($transaksi_paket_wisata->tour_leader) as $tour_leader)
                                    <li>{{ $tour_leader->leader }}</li>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Objek Wisata</label>
                        <div class="col-md-9">
                            <ol>
                                @foreach (json_decode($transaksi_paket_wisata->objek_wisata) as $key => $objek_wisata)
                                    <li>{{ $objek_wisata->destination }}</li>
                                @endforeach
                            </ol>
                            {{-- <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #58A399; color: white">No</th>
                                        <th class="text-center" style="background-color: #58A399; color: white">Destinasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($transaksi_paket_wisata->objek_wisata) as $key => $objek_wisata)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $objek_wisata->destination }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Daftar Hotel</label>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-responsive hotel">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #891652; color: white">No</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Hotel</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Lokasi</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Jumlah Malam</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Check-In</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi_paket_wisata->detail_wisata_hotel as $key => $detail_wisata_hotel)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $detail_wisata_hotel->nama_hotel }}</td>
                                                <td class="text-center">{{ $detail_wisata_hotel->lokasi }}</td>
                                                <td class="text-center">{{ $detail_wisata_hotel->jumlah_malam }}</td>
                                                <td class="text-center">{{ $detail_wisata_hotel->check_in }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Daftar Maskapai</label>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-responsive maskapai">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #891652; color: white">No</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Nama Maskapai</th>
                                            <th class="text-center" style="background-color: #891652; color: white">No. Penerbangan</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Arah</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Waktu Penerbangan</th>
                                            <th class="text-center" style="background-color: #891652; color: white">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi_paket_wisata->detail_wisata_maskapai as $key => $detail_wisata_maskapai)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $detail_wisata_maskapai->nama_maskapai }}</td>
                                                <td class="text-center">{{ $detail_wisata_maskapai->no_penerbangan }}</td>
                                                <td class="text-center">{{ $detail_wisata_maskapai->arah }}</td>
                                                <td class="text-center">{{ $detail_wisata_maskapai->jam_berangkat }}</td>
                                                <td class="text-center">{{ $detail_wisata_maskapai->remaks }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi_paket_wisata->detail_wisata_peserta as $key => $detail_wisata_peserta)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $detail_wisata_peserta->nama_peserta }}</td>
                                                <td class="text-center">{{ $detail_wisata_peserta->email }}</td>
                                                <td class="text-center">{{ $detail_wisata_peserta->no_telp }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3 row">
                        <label class="col-md-3">Catatan</label>
                        <div class="col-md-9">
                            <p>{{ $transaksi_paket_wisata->remaks }}</p>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3">Status</label>
                        <div class="col-md-9">
                            @if (\Carbon\Carbon::today()->format('Y-m-d H:i') <= \Carbon\Carbon::create($transaksi_paket_wisata->waktu_keberangkatan)->format('Y-m-d H:i'))
                            <div class="badge bg-primary">Belum Berangkat</div>
                            @else
                            <div class="badge bg-success">Telah Berangkat</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('b.transaksi_paket_wisata.edit',['kode' => $transaksi_paket_wisata->kode, 'id' => $transaksi_paket_wisata->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data Pemberangkatan</a>
                    <a class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Data Pemberangkatan</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ URL::asset('backend_new/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('backend_new/libs/toastr/toastr.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.hotel').DataTable();
        $('.maskapai').DataTable();
        $('.peserta').DataTable();
    })
</script>
@endsection
