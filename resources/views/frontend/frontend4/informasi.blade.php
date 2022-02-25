@extends('layouts.frontend_4.app')

@section('title')
    Informasi Kebijakan Pemesanan dan Perjalanan
@endsection

@section('content')
<?php $asset = asset('frontend/assets4/'); ?>
    <div class="container page">
        <div class="row">
            <div class="col-md-12" style="margin-top: -8%">
                <h3 class="text-center">Informasi Umum Kebijakan Pemesanan dan Perjalanan Selama PPKM</h3>
                <p><b>Pemberlakuan pembatasan kegiatan masyarakat (PPKM) level 1-4 di dalam dan di luar wilayah Jawa dan Bali berlangsung selama periode berikut ini:</b></p>
                <ul>
                    <li>Di Jawa dan Bali: 22-28 Februari <a href="https://covid19.go.id/artikel/2022/02/22/instruksi-menteri-dalam-negeri-nomor-12-tahun-2022" style="color: #f38f39">(Inmendagri No. 12 Tahun 2022)</a></li>
                    <li>Di luar Jawa dan Bali: 15-28 Februari 2022 <a href="https://covid19.go.id/artikel/2022/02/15/instruksi-menteri-dalam-negeri-nomor-11-tahun-2022" style="color: #f38f39">(Inmendagri No. 11 Tahun 2022)</a></li>
                </ul>
    
                <h4>Pengecualian Sertifikat Vaksinasi</h4>
                <p>Ketentuan menunjukkan kartu/sertifikat vaksinasi COVID-19 dikecualikan bagi: </p>
                <ul>
                    <li>pelaku perjalanan rutin di jalur darat dalam satu wilayah aglomerasi.</li>
                    <li>pelaku perjalanan berusia di bawah 12 tahun dan</li>
                    <li>pelaku perjalanan dengan kondisi kesehatan khusus atau penyakit komorbid yang tidak dapat divaksinasi. pelaku tersebut wajib melampirkan surat keterangan dokter spesialis dan membawa hasil tes COVID-19 sesuai ketentuan di daerah tujuan.</li>
                </ul>
    
                <h4>Ketentuan Perjalanan untuk Penumpang Anak-anak</h4>
                <p>Pelaku berusia di bawah 12 tahun diperbolehkan melakukan perjalanan dengan syarat:</p>
                <ul>
                    <li>didampingi oleh orang tua/anggota keluarga yang dibuktikan dengan Kartu Keluarga dan</li>
                    <li>membawa hasil negatif tes PCR.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection