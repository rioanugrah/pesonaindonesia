@extends('layouts.frontend_4.app')
<?php $asset = asset('frontend/assets4/'); ?>
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ $asset }}/css/ticket_wisata.css">
@endsection
@section('title')
    Tracking Order
@endsection
@section('content')
    <section class="page-section pt-90 pb-80 relative" style="background: #ff9019">
        <div class="container">
            <div class="call-out-box clearfix with-icon">
                <div class="row call-out-wrap">
                    <div class="col-md-5">
                        {{-- <h6 class="title-section-top gray font-4">subscribe today</h6> --}}
                        <h2 class="title-section alt-2"><span>Tracking</span> Order</h2>
                        {{-- <i class="flaticon-suntour-email call-out-icon"></i> --}}
                    </div>
                    <div class="col-md-7">
                        <form id="cari-data" enctype="multipart/form-data" method="post" class="form mt-10">
                            @csrf
                            <div class="input-container">
                                <input type="text" placeholder="Kode Tracking" name="kode_tracking"
                                    class="newsletter-field mb-0 form-row"><i class="flaticon-suntour-search icon-left"></i>
                                <button type="submit" class="subscribe-submit"><i
                                        class="flaticon-suntour-arrow icon-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <main class="ticket-system">
        <div class="body">
            <div class="top">
            <h1 class="title">Tunggu sebentar, tiket Anda sedang dicetak</h1>
            <div class="printer" />
            </div>
            <div class="receipts-wrapper">
               <div class="receipts">
                  <div class="receipt">
                    <img src="{{ $asset . '/img/logo_plesiran_new_black2.webp' }}" width="150" alt="" srcset="">
                     <div class="route">
                        <h2>Invoice</h2>
                        <h2>#INV-8217</h2>
                     </div>
                     <div class="details">
                        <div class="item">
                           <span>Paket</span>
                           <h3>Privat Trip Bromo</h3>
                        </div>
                        <div class="item">
                           <span>Harga</span>
                           <h3>Rp. 1.500.000</h3>
                        </div>
                        <div class="item">
                           <span>Luggage</span>
                           <h3>Hand Luggage</h3>
                        </div>
                        <div class="item">
                           <span>Seat</span>
                           <h3>69P</h3>
                        </div>
                     </div>
                  </div>
                  <div class="receipt qr-code">
                     <svg class="qr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.938 29.938">
                        <path d="M7.129 15.683h1.427v1.427h1.426v1.426H2.853V17.11h1.426v-2.853h2.853v1.426h-.003zm18.535 12.83h1.424v-1.426h-1.424v1.426zM8.555 15.683h1.426v-1.426H8.555v1.426zm19.957 12.83h1.427v-1.426h-1.427v1.426zm-17.104 1.425h2.85v-1.426h-2.85v1.426zm12.829 0v-1.426H22.81v1.426h1.427zm-5.702 0h1.426v-2.852h-1.426v2.852zM7.129 11.406v1.426h4.277v-1.426H7.129zm-1.424 1.425v-1.426H2.852v2.852h1.426v-1.426h1.427zm4.276-2.852H.002V.001h9.979v9.978zM8.555 1.427H1.426v7.127h7.129V1.427zm-5.703 25.66h4.276V22.81H2.852v4.277zm14.256-1.427v1.427h1.428V25.66h-1.428zM7.129 2.853H2.853v4.275h4.276V2.853zM29.938.001V9.98h-9.979V.001h9.979zm-1.426 1.426h-7.127v7.127h7.127V1.427zM0 19.957h9.98v9.979H0v-9.979zm1.427 8.556h7.129v-7.129H1.427v7.129zm0-17.107H0v7.129h1.427v-7.129zm18.532 7.127v1.424h1.426v-1.424h-1.426zm-4.277 5.703V22.81h-1.425v1.427h-2.85v2.853h2.85v1.426h1.425v-2.853h1.427v-1.426h-1.427v-.001zM11.408 5.704h2.85V4.276h-2.85v1.428zm11.403 11.405h2.854v1.426h1.425v-4.276h-1.425v-2.853h-1.428v4.277h-4.274v1.427h1.426v1.426h1.426V17.11h-.004zm1.426 4.275H22.81v-1.427h-1.426v2.853h-4.276v1.427h2.854v2.853h1.426v1.426h1.426v-2.853h5.701v-1.426h-4.276v-2.853h-.002zm0 0h1.428v-2.851h-1.428v2.851zm-11.405 0v-1.427h1.424v-1.424h1.425v-1.426h1.427v-2.853h4.276v-2.853h-1.426v1.426h-1.426V7.125h-1.426V4.272h1.426V0h-1.426v2.852H15.68V0h-4.276v2.852h1.426V1.426h1.424v2.85h1.426v4.277h1.426v1.426H15.68v2.852h-1.426V9.979H12.83V8.554h-1.426v2.852h1.426v1.426h-1.426v4.278h1.426v-2.853h1.424v2.853H12.83v1.426h-1.426v4.274h2.85v-1.426h-1.422zm15.68 1.426v-1.426h-2.85v1.426h2.85zM27.086 2.853h-4.275v4.275h4.275V2.853zM15.682 21.384h2.854v-1.427h-1.428v-1.424h-1.427v2.851zm2.853-2.851v-1.426h-1.428v1.426h1.428zm8.551-5.702h2.853v-1.426h-2.853v1.426zm1.426 11.405h1.427V22.81h-1.427v1.426zm0-8.553h1.427v-1.426h-1.427v1.426zm-12.83-7.129h-1.425V9.98h1.425V8.554z"/>
                     </svg>
                     <div class="description">
                        <h2>69Pixels</h2>
                        <p>Show QR-code when requested</p>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </main> --}}
    <div id="hasils"></div>
    {{-- <section class="small-section bg-gray">
        <div class="container">
            <div class="row" id="hasils">
            </div>
        </div>
    </section> --}}
@endsection
@section('js')
    <script>
        $('#cari-data').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.tracking.cari') }}",
                data: formData,
                contentType: "application/json;  charset=utf-8",
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.status != false) {
                        // alert(result.status);
                        const hasilData = result.data;
                        var text = "";
                        hasilData.forEach(checkData);
                        // const pemesan = result.data.order;
                        // alert(result.data.order);
                        // pemesan.forEach(checkPemesan);

                        // function checkPemesan(value, index) {
                            
                        // }

                        function checkData(value, index) {
                            var bilangan = value.price;
	
                            var	number_string = bilangan.toString(),
                                sisa 	= number_string.length % 3,
                                rupiah 	= number_string.substr(0, sisa),
                                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                                    
                            if (ribuan) {
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            // console.table(value.anggota);

                            // text = text + '<section class="small-section bg-gray">'+
                            //                 '<div class="container">'+
                            //                     '<div class="col-md-12">'+
                            //                         '<div class="recom-item">'+
                            //                             '<div class="recom-media"><a href="hotels-details.html">'+
                            //                                 '<div class="pic"><img src="{{ asset("frontend/assets4/img/ticket.jpg") }}" data-at2x="{{ asset("frontend/assets4/img/ticket.jpg") }}" alt></div></a>'+
                            //                             //   '<div class="location"><i class="flaticon-suntour-map"></i> Istanbul, Turkey</div>'+
                            //                             '</div>'+
                            //                             '<div class="recom-item-body"><a href="hotels-details.html">'+
                            //                                 '<h6 class="blog-title">'+ value.nama_paket +'</h6></a>'+
                            //                             //   '<div class="stars stars-4"></div>'+
                            //                             '<div class="recom-price"><span class="font-4">Rp. '+rupiah+'</span></div>'+
                            //                             //   '<p class="mb-30">Quisque egestas a est in convallis. Maecenas pellentesque.</p><a href="hotels-details.html" class="recom-button">Read more</a><a href="hotels-details.html" class="cws-button small alt">Book now</a>'+
                            //                             //   '<div class="action font-2">20%</div>'+
                            //                             '</div>'+
                            //                         '</div>'+
                            //                     '</div>'+
                            //                 '</div>'+
                            //                 '</section>';
                            const hasilAnggota = value.anggota;
                            var text2 = "";
                            hasilAnggota.forEach(checkAnggota);

                            function checkAnggota(value, index) {
                                var i = index+1;
                                text2 = text2+'<div class="details">'+
                                                    '<div class="item">'+
                                                        '<span>Nama Anggota '+i+'</span>'+
                                                        '<h4>'+value.pemesan+'</h4>'+
                                                    '</div>'+
                                                    '<div class="item">'+
                                                        '<span>Jumlah</span>'+
                                                        '<h4>'+value.qty+'</h4>'+
                                                    '</div>'+
                                                '</div>';
                                i++;
                            }

                            text = text + '<main class="ticket-system">'+
                                                '<div class="body">'+
                                                    '<div class="top">'+
                                                        '<h1 class="title">Tunggu sebentar, tiket Anda sedang dicetak</h1>'+
                                                        '<div class="printer" />'+
                                                    '</div>'+
                                                    '<div class="receipts-wrapper">'+
                                                    '<div class="receipts">'+
                                                        '<div class="receipt">'+
                                                            '<img src="{{ asset("frontend/assets4/img/logo_plesiran_new_black2.webp") }}" width="150" alt="" srcset="">'+
                                                            '<div class="route">'+
                                                                '<h4>Invoice</h4>'+
                                                                '<h4>'+value.id+'</h4>'+
                                                            '</div>'+
                                                            '<div class="details">'+
                                                                // '<div class="item">'+
                                                                //     '<span>Invoice</span>'+
                                                                //     '<h4>'+value.id+'</h4>'+
                                                                // '</div>'+
                                                                '<div class="item">'+
                                                                    '<span>Tanggal Pembelian</span>'+
                                                                    '<h4>'+value.tanggal_pembelian+'</h4>'+
                                                                '</div>'+
                                                                '<div class="item">'+
                                                                    '<span>Nama Paket</span>'+
                                                                    '<h4>'+value.nama_paket+'</h4>'+
                                                                '</div>'+
                                                                '<div class="item">'+
                                                                    '<span>Jumlah</span>'+
                                                                    '<h4>'+value.qty+'</h4>'+
                                                                '</div>'+
                                                                '<div class="item">'+
                                                                    '<span>Nama Pemesan</span>'+
                                                                    '<h4>'+value.nama_pemesan+'</h4>'+
                                                                '</div>'+
                                                                '<div class="item">'+
                                                                    '<span>Harga</span>'+
                                                                    '<h4>Rp. '+rupiah+'</h4>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            text2+
                                                            // '<div id="hasil2">'+'</div>'+
                                                        '</div>'+
                                                        '<div class="receipt qr-code">'+
                                                            value.barcode+
                                                            // '<div class="description">'+
                                                            //     '<h2>69Pixels</h2>'+
                                                            //     '<p>Show QR-code when requested</p>'+
                                                            // '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</main>';

                            // alert(text2);
                            // document.getElementById("hasil2").innerHTML = text2;
                            // document.getElementById("hasil_anggota").innerHTML = text2;
                            // text = text + '<div class="col-md-6">'+
                            //                 '<div class="recom-item">'+
                            //                   '<div class="recom-item-body">'+
                            //                     '<h6>'+ value.nama_paket +'</h6>'+
                            //                     '<div class="stars stars-4">'+'</div>'+
                            //                     '<div class="recom-price">'+'</div>'+
                            //                   '</div>'+
                            //                 '</div>'+
                            //               '</div>';
                            // text = text+'<div>'+value.nama_paket+'</div>';
                        }
                        document.getElementById("hasils").innerHTML = text;
                    }
                    // alert(result.status);
                    // if (result.success != false) {
                    //     iziToast.success({
                    //         title: result.message_title,
                    //         message: result.message_content
                    //     });
                    //     this.reset();
                    //     table.ajax.reload();
                    // } else {
                    //     iziToast.error({
                    //         title: result.success,
                    //         message: result.error
                    //     });
                    // }
                },
                error: function(request, status, error) {
                    // iziToast.error({
                    //     title: 'Error',
                    //     message: error,
                    // });
                }
            });
        });
    </script>
@endsection
