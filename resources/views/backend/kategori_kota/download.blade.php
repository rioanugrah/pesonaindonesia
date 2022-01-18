<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perjanjian Kerjasama {{ $perusahaan->nama_perusahaan }} - {{ $cooperation->nama_perusahaan }}</title>

    <style>
        @page {
                margin: 0cm 0cm;
        },
        body{
            font-family: 'Arial, Helvetica, sans-serif';
            margin: 2cm
        },
        header{
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #363e6c;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        },
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #363e6c;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        },
        h2{
            /* text-decoration: underline; */
            text-align: center;
        },
        .p{
            text-align: center;
            margin-top: 5%
        },
        p,ol{
            text-align: justify;
            font-size: 11pt
        },
        td{
            font-size: 11pt
        }
    </style>
</head>
<body>
    <header>
        Pesona Plesiran Indonesia | Perjanjian Kerjasama - Syarat & Ketentuan
    </header>
    <main>
        <h2 style="color: #000000">Perjanjian Kerjasama - Syarat & Ketentuan</h2>
        <table>
            <tr>
                <td>Nama Perusahaan</td>
                <td>:</td>
                <td>{{ $cooperation->nama_perusahaan }}</td>
            </tr>
            <tr>
                <td>Alamat Perusahaan</td>
                <td>:</td>
                <td>{{ $cooperation->alamat_perusahaan }}</td>
            </tr>
        </table>
        <hr>
        <p>Dan <b>{{ $perusahaan->nama_perusahaan }}</b>, sebuah penyedia layanan online melakukan usaha yaitu PLESIRANINDONESIA.COM, dengan nama domain terdaftar yang tidak terbatas www.plesiranindonesia.com (selanjutnya disebut “Pesona Plesiran Indonesia”, “kami”, “milik kami”). {{ $perusahaan->nama_perusahaan }} terdaftar di bawah <b>SIUP: {{ $perusahaan->siup }}</b> dan <b>NPWP: {{ $perusahaan->npwp }}</b>, {{ $perusahaan->alamat_perusahaan }}.</p>
        <p>Pelaksanaan Perjanjian ini dan/atau penggunaan Layanan menunjukkan Pengakuan dan penerimaan tanpa syarat dari semua persyaratan dan ketentuan yang ditetapkan di dalamnya. Untuk menghindari keraguan, istilah “hotel” di dalam Perjanjian ini dapat merujuk pada segala jenis properti akomodasi.</p>
        <h5>LAYANAN KAMI</h5>
        <p>
            Sebagai bagian dari Layanan, kami akan bertindak untuk mempromosikan Hotel Anda 
            (dan, jika berlaku, semua hotel yang berpartisipasi serta disebut di dalam Lampiran) 
            serta melakukan transaksi pemesanan. Dalam melakukannya:
            <ol>
                <li><b>DISTRIBUSI</b>: Kami akan mengatur 
                    detail mengenai Hotel Anda sebagaimana mestinya (“Informasi”) sebagai mana yang Anda berikan 
                    dalam format yang sesuai dan atas persetujuan kami, untuk didistribusikan di situs web dan agen 
                    (“Situs”) yang kami anggap sesuai untuk keperluan mendorong pemesanan mendadak atau menit terakhir 
                    dan setahun penuh untuk Hotel Anda, termasuk namun tidak terbatas pada Traveloka.com.</li>
                <li><b>EKSTRANET</b>:
                    Kami akan menyediakan untuk Anda, akses ke fasilitas online yaitu Ekstranet, untuk memperbarui 
                    tarif dan ketersediaan (baik untuk pemesanan mendadak atau menit terakhir dan sepanjang tahun), 
                    serta Informasi hotel Anda.</li>
                <li><b>RUJUKAN KELUHAN</b>: Kami akan merujuk perselisihan atau keluhan terkait 
                    dengan menginapnya tamu di Hotel Anda untuk Anda selesaikan;</li>
                <li><b>KEAKURATAN</b>: Kami berhak, tanpa pemberitahuan, 
                    untuk mengubah atau menghapus Informasi apa pun di Situs yang, menurut pertimbangan kami sepenuhnya, 
                    mencemarkan, tidak senonoh, tidak akurat secara material, melanggar hukum manapun atau kode praktik periklanan, 
                    atau merujuk langsung ke situs web, email, atau nomor telepon Anda.</li>
                <li><b>KOMISI</b>: Perjanjian ini mengikat 
                    Pihak Hotel Mitra Kerja dari Traveloka untuk membayar kepada Traveloka minimal komisi 15% berdasarkan 
                    tingkat penjualan kotor, termasuk semua pajak dan biaya layanan. Tingkat komisi ini terkait dengan 
                    peringkat Hotel Mitra Kerja pada website Traveloka. Pada setiap titik waktu, Pihak Hotel dapat memutuskan 
                    untuk meningkatkan peringkat Hotel Mitra Kerja di website Traveloka dengan meningkatkan komisi melalui Ekstranet Traveloka.</li>
            </ol>
        </p>
        <h5>KEWAJIBAN ANDA</h5>
        <ol>
            <li><b>INFORMASI KAMAR & TARIF</b>: 
                Anda bertanggung jawab untuk memperbarui Ekstranet secara berkala, memastikan bahwa semua Informasi akurat dan terbaru, 
                termasuk harga, detail tentang ketersediaan kamar, dan Informasi relevan lainnya. Jika informasi yang Anda sediakan salah 
                atau menyesatkan, Anda setuju untuk sepenuhnya memberi ganti rugi kepada kami dan membebaskan kami dari semua kerugian, kewajiban, 
                atau biaya yang harus kami keluarkan sebagai akibatnya. Kami atau mitra bisnis kami tidak akan bertanggung jawab atas setiap kesalahan 
                atau kelebihan pemesanan atau tarif yang salah yang disebabkan oleh ketidakakuratan Anda dalam memperbarui Ekstranet.</li>
            <li>
                <b>INFORMASI PEMBAYARAN</b>: 
                Anda bertanggung jawab untuk memperbarui Extranet dengan Informasi akurat dan terbaru mengenai informasi detail pembayaran. 
                Setiap perubahan oleh Hotel atau dibuat atas nama Hotel yang disampaikan dan diterima oleh Extranet mengenai tingkat komisi, metode pembayaran, 
                jadwal pembayaran dan informasi akuntansi akan menggantikan informasi yang diberikan pada Perjanjian ini, terutama mengenai tingkat komisi 
                (Layanan Kami, Klausul 5); dan informasi akuntansi, jadwal dan metode pembayaran (Klausul Pembayaran, lihat dibawah) dan diterima sebagai mengikat secara hukum oleh kedua belah pihak. Jika informasi yang Anda sediakan salah atau menyesatkan, Anda setuju untuk sepenuhnya memberi ganti rugi kepada kami dan membebaskan kami dari semua kerugian, kewajiban, atau biaya yang harus kami keluarkan sebagai akibatnya. Kami atau mitra bisnis kami tidak akan bertanggung jawab atas setiap kesalahan mengenai informasi pembayaran atau tingkat komisi yang disebabkan oleh ketidakakuratan Anda dalam memperbarui Ekstranet.
            </li>
            <li>
                <b>JAMINAN KAMAR</b>: 
                Jika terjadi pemesanan yang salah atau pemesanan berlebih yang disebabkan oleh kegagalan Anda mematuhi kewajiban nomor 1 di atas, Anda akan mencari akomodasi alternatif untuk tamu dengan standar yang sama atau lebih baik, dan dengan jarak yang wajar dari Hotel awal, menyediakan transportasi gratis dan menanggung selisih tarif kamar diatas tarif bersih yang telah disetujui pada saat pemesanan.
            </li>
            <li>
                <b>PEMENUHAN KONTRAK</b>: 
                Anda terikat untuk menerima tamu sebagai pihak di dalam kontrak, untuk menangani pemesanan sesuai dengan semua informasi yang terkandung di dalamnya, termasuk informasi tambahan dan keinginan yang disampaikan oleh tamu. Sistem kami yang kami gunakan untuk memantau pemesanan ke Hotel Anda melalui faks, email, atau melalui Ekstranet adalah pasti kecuali Anda dapat memberikan bukti banding yang dapat dipercaya.
            </li>
            <li>
                <b>KESAMAAN TARIF</b>: 
                Anda akan memastikan bahwa tarif jual yang Anda perbarui di Ekstranet sekurangkurangnya akan sama menguntungkannya dengan produk yang sama yang tersedia untuk dijual atau dikomunikasikan melalui media online lainnya, termasuk situs web Anda (“Jaminan Kesamaan Tarif”).
            </li>
            <li>
                <b>KESAMAAN KETERSEDIAAN</b>: 
                Anda akan memastikan bahwa ketersediaan yang Anda perbarui di Ekstranet akan mewakili semua paket tarif dan jenis kamar yang tersedia untuk dijual atau dikomunikasikan melalui media online lainnya, termasuk situs web Anda (“Jaminan Kesamaan Ketersediaan”). Sebagai bagian dari Jaminan Kesamaan Ketersediaan, Anda akan memastikan bahwa Traveloka setiap saat memiliki “ketersediaan kamar terakhir” (“KKT”). KKT berarti bahwa Anda harus menjamin bahwa kamar terakhir Anda yang tersedia pada saluran online lainnya, termasuk situs web Anda sendiri, juga disediakan bagi Traveloka.
            </li>
            <li>
                <b>KESAMAAN PROMOSI</b>: 
                Anda akan memastikan bahwa promosi yang Anda perbarui di Ekstranet, dan yang dapat didukung oleh sistem Ekstranet, akan mewakili semua promosi Anda yang tersedia untuk dijual atau dikomunikasikan melalui media online lainnya, termasuk situs web Anda (“Jaminan Kesamaan Promosi”).
            </li>
            <li>
                <b>HAK CIPTA</b>: 
                Anda akan memastikan bahwa Anda memiliki hak dan wewenang yang diperlukan untuk memakai dan melisensikan atau mengizinkan penggunaan hak cipta, merek, atau logo apa pun yang dirujuk di dalam Informasi Anda.
            </li>
        </ol>
        <p>
            Hotel harus memastikan bahwa saat check in, tamu menunjukkan hal berikut: <br>
            Voucher dari Traveloka; danIdentitas dengan foto yang valid serta cocok dengan nama pada voucher. Hotel harus memeriksa bagian ini. Jika salah satu bagian di atas tidak dapat ditunjukkan ke Hotel, atau jika nama pada identitas yang berisi foto tidak cocok dengan nama pada voucher, atau jika ada perbedaan lainnya apa pun, Hotel harus segera menghubungi Traveloka sebelum membolehkan tamu ini check in menggunakan voucher kami. Jika Hotel tidak dapat memeriksa data ini, Traveloka dapat menolak pembayaran pemesanan tersebut.
        </p>
        <table>
            <tr>
                <td></td>
                <td>DIBAYARKAN SEBELUM TAMU DATANG ATAU SEBELUM TAMU CHECK OUT</td>
            </tr>
            <tr>
                <td></td>
                <td>7 HARI SETELAH TAMU CHECK OUT</td>
            </tr>
            <tr>
                <td></td>
                <td>KREDIT FASILITAS BULANAN, DIBAYAR PADA TANGGAL 15 BULAN BERIKUTNYA</td>
            </tr>
        </table>
        {{-- <h4>Surat Perjanjian Kerjasama</h4>
        <p class="p">Yang bertanda tangan di bawah ini :</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Nama Perusahaan</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
        <p>Selanjutnya disebut sebagai pihak pertama</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Nama Perusahaan</td>
                <td>:</td>
                <td>CV Pesona Plesiran Indonesia</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
        <p>Selanjutnya disebut sebagai pihak kedua</p> --}}
    </main>
    <footer>
        Copyright &copy; <?php echo date("Y");?>  CV Pesona Plesiran Indonesia
    </footer>
</body>
</html>