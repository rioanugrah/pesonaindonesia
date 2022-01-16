@extends('layouts.frontend_4.app')

@section('title')
    Wistlist
@endsection

<?php $asset = asset('frontend/assets4/'); ?>

@section('breadcum')
    <section style="background-image:url({{ asset('frontend/assets4/img/hotel.jpg') }});" class="breadcrumbs">
        <div class="container">
            <div class="text-left breadcrumbs-item"><a href="{{ route('frontend') }}">home</a><i>/</i><a
                    href="{{ route('tentang_kami') }}" class="last"><span>Wistlist</span></a>
                <h2><span>Wistlist</span>
                </h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container page">
        <div class="row mb-50">
            <div class="cws-widget">
                <div class="widget-search">
                    <form role="search" method="get" id="search" class="search-form">
                        @csrf
                        <label><span class="screen-reader-text">Cari Kode Booking</span>
                            <input type="search" placeholder="Cari Kode Booking" value="" name="s" title="Search:"
                                class="search-field">
                        </label>
                        <button type="submit" class="search-submit"><i class="flaticon-suntour-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="element-section">
                <div id="result"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script>
    <script>
        $('#search').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('frontend.search.wistlist') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    // alert(result.data);
                    // $.each(result.data, function (item, index) {
                    //     $('.result').append(index.created_at)
                    // })
                    const Data = result.data;
                    var txt = "";
                    
                    Data.forEach(data);
                    function data(value, index) {
                        // txt = "<tr>"+txt+
                        //         "<td>"+value.partner_tx_id+"</td>"+
                        //       "</tr>";
                        txt = txt+"<div class='col-md-12'>"+
                                    "<h5 class='mb-20'>"+value.partner_tx_id+"</h5>"+
                                    "<p>"+value.nama_penerima+"</p>"+
                                "</div>";
                        // txt = "<div>"+value.nip+"</div>";
                    }
                    document.getElementById('result').innerHTML = txt;
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