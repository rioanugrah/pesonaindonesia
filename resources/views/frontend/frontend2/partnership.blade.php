@extends('layouts.frontend_3.app')

@section('title')
    Jadi Partner Pesona Plesiran Indonesia
@endsection

@section('content')
    {{-- <section class="inner-banner-wrap">
    <div class="inner-baner-container"
        style="background-image: url({{ asset('frontend/assets3/images/wallpaper/partnership.jpg') }});">
        <div class="container">
            <div class="inner-banner-content">
                <h2 class="inner-title">Partnership</h2>
            </div>
        </div>
    </div>
    <div class="inner-shape"></div>
</section> --}}

    {{-- <section class="destination-section">
    <div class="container">
        <div class="section-heading">
            <div class="row align-items-end">
               <div class="col-lg-12">
                  <h3>Bergabung Bersama Kami, Kembangkan Bisnis Anda</h3>
               </div>
            </div>
         </div>
    </div>
</section> --}}

    <main id="content" class="site-main">
        <section class="home-banner-section">
            <div class="home-banner-items">
                <div class="banner-inner-wrap" style="background-image: url({{ asset('frontend/assets3/images/bg_partner.webp') }});"></div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="banner-content section-heading section-heading-white">
                                    <h2 class="banner-title">JOIN US ON PESONA PLESIRAN INDONESIA</h2>
                                    <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                                </div>
                            </div>
                            @csrf
                            <div class="col-lg-4">
                                <div class="trip-search-section">
                                    <form id="upload-form" method="post">
                                    <div class="container">
                                        <div class="trip-search-inner secondary-bg">
                                            <div class="input-group width-col-1">
                                                <label> Nama Perusahaan* </label>
                                                <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan">
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Alamat Perusahaan* </label>
                                                <textarea name="alamat_perusahaan" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Nama Pemilik* </label>
                                                <input type="text" name="nama" placeholder="Nama Pemilik">
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Email* </label>
                                                <input type="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Kategori Perusahaan* </label>
                                                <select name="kategori">
                                                    <option value="">-- Kategori Perusahaan --</option>
                                                    <option value="Bisnis">Bisnis</option>
                                                    <option value="Pribadi">Pribadi</option>
                                                </select>
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Provinsi* </label>
                                                <select name="provinsi" id="provinsi">
                                                    <option>-- Pilih Provinsi --</option>
                                                    @foreach ($provinsis as $id => $provinsi)
                                                        <option value="{{ $id }}">{{ $provinsi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Kabupaten / Kota* </label>
                                                <select name="kab_kota" data-width="100%" id="kab_kota">
                                                </select>
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Kode Pos* </label>
                                                <input type="text" name="kode_pos" placeholder="Kode Pos">
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Negara* </label>
                                                <select name="negara">
                                                    <option value="">-- Pilih Negara --</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Inggris">Inggris</option>
                                                </select>
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Telepon Selular* </label>
                                                <input type="text" name="telp_selular" placeholder="Telepon Kantor">
                                            </div>
                                            {{-- <div class="input-group width-col-1">
                                                <label> Checkin Date* </label>
                                                <i class="far fa-calendar"></i>
                                                <input class="input-date-picker" type="text" name="s"
                                                    placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                            </div>
                                            <div class="input-group width-col-1">
                                                <label> Checkout Date* </label>
                                                <i class="far fa-calendar"></i>
                                                <input class="input-date-picker" type="text" name="s"
                                                    placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                            </div> --}}
                                            <div class="input-group width-col-1">
                                                {{-- <label class="screen-reader-text"> Search </label> --}}
                                                <input type="submit" value="DAFTAR">
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="{{ asset('backend/assets2/js/axios.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#provinsi').on('change',function(){
            axios.post('{{ url('cooperation/kab_kota') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kab_kota').empty();

                $.each(response.data, function (id, nama) {
                    // alert(nama);
                    $('#kab_kota').append(new Option(nama, id))
                })
            });
        });
        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('frontend.partnership.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if(result.success != false){
                        // iziToast.success({
                        //     title: result.message_title,
                        //     message: result.message_content
                        // });
                        alert(result.message_content);
                        this.reset();
                        // table.ajax.reload();
                    }else{
                        // iziToast.error({
                        //     title: result.success,
                        //     message: result.error
                        // });
                        alert(result.error);
                    }
                },
                error: function (request, status, error) {
                    // iziToast.error({
                    //     title: 'Error',
                    //     message: error,
                    // });
                    alert(error);
                }
            });
        });
    </script>
@endsection