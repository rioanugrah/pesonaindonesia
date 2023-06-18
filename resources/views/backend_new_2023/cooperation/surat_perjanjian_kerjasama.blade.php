<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Perjanjian Kerjasama</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* table {
            width: 100%;
        } */
        @page {
            margin: 0cm 0cm;
            text-align: justify;
        }
        body {
            margin: 1.25cm;
            text-align: justify;
            /* margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm; */
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 0.5cm;

            /** Extra personal styles **/
            background-color: #f4c403;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }

        footer {
            position: fixed;
            bottom: 3cm;
            left: 0cm;
            right: 0cm;
            height: 4cm;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            /* color: white; */
            text-align: center;
            line-height: 1.5cm;
        }
    </style>
</head>

<body>
    {{-- <header>
    </header> --}}
    <header></header>
    <table style="width: 100%">
        <tr>
            <td>
                <img src="{{ public_path('frontend/assets_new/images/logo/logo_plesiran.webp') }}"
                    alt="Logo Pesona Plesiran Indonesia" width="150">
            </td>
            <td style="text-align: center;">
                <div style="font-size: 20pt; font-weight: bold; text-transform: uppercase">CV Pesona Plesiran Indonesia
                </div>
                <div style="font-size: 10pt; font-weight: bold">Agen Perjalanan & Travelling</div>
                <div style="font-size: 9pt">Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota Malang,
                    Jawa Timur</div>
                <div style="font-size: 9pt">Telp. 0813-3112-6991 Email : business@plesiranindonesia.com</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="text-align: center; font-size: 14pt; font-weight: bold; text-transform: uppercase">Surat
                Perjanjian
                Kerjasama Bagi Hasil Usaha</td>
        </tr>
        <tr>
            {{-- <td colspan="2" style="text-align: center; font-size: 10pt;">001/PARTNER/PPI/V/2023</td> --}}
        </tr>
    </table>
    <table>
        <tr>
            <td>
                {{-- <div style="margin-top: 5%">Saya yang bertanda tangan di bawah ini :</div> --}}
                <div style="margin-top: 1.5%">Pada tanggal {{ $cooperations->created_at->isoFormat('DD MMMM Y') }}, kami yang bertanda tangan di bawah ini:</div>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 10%;">
                <table>
                    <tr>
                        <td>
                            <div>Nama</div>
                        </td>
                        <td>
                            <div>:</div>
                        </td>
                        <td>
                            <div>Nurwahid Abdillah</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>Jabatan</div>
                        </td>
                        <td>
                            <div>:</div>
                        </td>
                        <td>
                            <div>Chief Executive Officer - Pesona Plesiran Indonesia</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <div>Alamat</div>
                        </td>
                        <td style="vertical-align: top">
                            <div>:</div>
                        </td>
                        <td>
                            <div>Jl. Raya Tlogowaru No. 3, Tlogowaru Kec. Kedungkandang, Kota Malang, Jawa Timur</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div>Dalam hal ini bertindak untuk dan atas nama <b>CV Pesona Plesiran Indonesia</b> selanjutnya disebut
                    sebagai <b>PIHAK PERTAMA</b>.</div>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 10%;">
                <table>
                    <tr>
                        <td>
                            <div>Nama</div>
                        </td>
                        <td>
                            <div>:</div>
                        </td>
                        <td>
                            <div>{{ $cooperations->nama }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>Jabatan</div>
                        </td>
                        <td>
                            <div>:</div>
                        </td>
                        <td>
                            <div>{{ $cooperations->jabatan }} - {{ $cooperations->nama_perusahaan }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <div>Alamat</div>
                        </td>
                        <td style="vertical-align: top">
                            <div>:</div>
                        </td>
                        <td>
                            <div>{{ $cooperations->alamat_perusahaan }}</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div>Dalam hal ini bertindak untuk dan atas nama <b>{{ $cooperations->nama_perusahaan }}</b> selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: justify;">
                    Dengan perjanjian yang telah disepakati oleh yang berkerjasama : 
                    <ol>
                        <li>Pihak Kedua adalah suatu Perusahaan yang bergerak dibidang {{ $cooperations->kategori }} secara terpadu dan menyeluruh.</li>
                        <li>Pihak Pertama adalah suatu Perusahaan yang bergerak dibidang Agen Perjalanan dan Travelling yang menyediakan Informasi.</li>
                    </ol>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: justify;">
                    Secara bersama - sama kedua pihak bersepakat untuk mengadakan perjanjian kerjasama bagi hasil usaha Agen Perjalanan dan Travelling dengan ketentuan - ketentuan
                    yang diatur dalam pasal-pasal sebagai berikut:
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 1.5%">
                <div style="text-align: center; font-weight: bold">Pasal 1</div>
                <div style="text-align: center; font-weight: bold">Ketentuan Umum</div>
                <div style="text-align: justify;">
                    Dalam Perjanjian ini, istilah-istilah berikut akan mempunyai arti sebagai berikut, kecuali ditentukan lain
                    dalam perjanjian ini :
                    <ol>
                        <li>Perjanjian – adalah Perjanjian Kerjasama Pelayanan Jasa Agen Perjalanan dan Travelling antara Pihak Kedua dan
                            Pihak Pertama ini beserta seluruh lampirannya yang merupakan satu kesatuan yang tidak dapat
                            dipisahkan.
                        </li>
                        <li>Pekerjaan – adalah Pelayanan Jasa Agen Perjalanan dan Travelling yang Diberikan Kedua kepada Pihak Pertama
                            yang rinciannya tertuang dalam Pasal 2 tentang ruang lingkup Pekerjaan.
                        </li>
                    </ol>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 1.5%">
                <div style="text-align: center; font-weight: bold">Pasal 2</div>
                <div style="text-align: center; font-weight: bold">Biaya Jasa</div>
                <div style="text-align: justify;">
                    <ol>
                        <li>Biaya atas pekerjaan dirinci di dalam Lampiran 1 tentang Biaya Jasa.
                        </li>
                        <li>Perubahan atas biaya Pekerjaan yang disebabkan karena hal-hal yang tidak terduga akan
                            diinformasikan Pihak Kedua kepada Pihak Pertama secara tertulis dan harus mendapatkan persetujuan
                            Pihak Pertama.                            
                        </li>
                    </ol>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 1.5%">
                <div style="text-align: center; font-weight: bold">Pasal 3</div>
                <div style="text-align: center; font-weight: bold">Kelalaian dan Sanksi</div>
                <div style="text-align: justify;">
                    <ol>
                        <li>Perjanjian apabila tidak dapat melaksanakan kewajiban sebagaimana
                            dimaksud dalam pasal 3, ayat 1 Perjanjian ini. Akibat kelalaian ini Pihak Pertama mendapat
                            Komplain dari customer. Atas kelalaian tersebut, Pihak Pertama akan memberikan Sanksi baik
                            pengurangan jumlah order, bahkan sampai pemutusan kerjasama kepada Pihak Kedua. merupakan bagian
                            dari Perjanjian kerjasama ini dan ketentuan lain dalam Perjanjian ini akan dianggap tetap berlaku tanpa
                            dipengaruhi oleh ketentuan yang tidak sah, tidak berlaku atau tidak dapat diterapkan tersebut.                                                        
                        </li>
                    </ol>
                </div>
            </td>
        </tr>
    </table>
    <div style="margin-bottom: 5%"></div>
    <table style="width: 100%; text-align: center">
        <tr>
            <td>PIHAK PERTAMA</td>
            <td>PIHAK KEDUA</td>
        </tr>
        <tr>
            <td><div style="margin-top: 15%; margin-bottom: 15%">(TTD)</div></td>
            <td><div style="margin-top: 15%; margin-bottom: 15%">(TTD)</div></td>
        </tr>
        <tr>
            <td style="text-decoration: underline; font-weight: bold">Nurwahid Abdillah</td>
            <td style="text-decoration: underline; font-weight: bold">{{ $cooperations->nama }}</td>
        </tr>
        <tr>
            <td>Chief Executive Officer</td>
            <td>{{ $cooperations->jabatan.' '.$cooperations->nama_perusahaan }}</td>
        </tr>
    </table>
    <footer>
        <img src="{{ public_path('frontend/assets_new/images/bg.webp') }}" style="opacity: 0.5" width="800">
    </footer>
</body>

</html>
