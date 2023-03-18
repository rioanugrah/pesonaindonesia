@extends('layouts.backend_2.app')
@section('title')
    Buat Data Produk - {{ $kode_vendor }}
@endsection

@section('css')
    <link href="{{ asset('backend/assets2/css/iziToast.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">@yield('title')</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="upload-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kode Produk :</label>
                                <input type="text" class="form-control" name="kode_produk" placeholder="Kode Produk">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Nama Produk :</label>
                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Produk :</label>
                        <textarea name="deskripsi" class="form-control" id="elm1" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Price :</label>
                                <input type="text" class="form-control" name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Diskon :</label>
                                <input type="text" class="form-control" name="discount" placeholder="Diskon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Upload Image :</label>
                                <input type="file" class="form-control" name="images">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('vendors.detail_produk',['kode_vendor' => $kode_vendor]) }}" class="btn btn-primary">back</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/js/pages/form-editor.init.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets2/js/iziToast.min.js') }}"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#upload-form').submit(function(e) {
        e.preventDefault();
        // alert('test');
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('vendors.detail_produk.simpan',['kode_vendor' => $kode_vendor]) }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (result) => {
                if (result.success != false) {
                    iziToast.success({
                        title: result.message_title,
                        message: result.message_content
                    });
                } else {
                    iziToast.error({
                        title: result.success,
                        message: result.error
                    });
                }
            },
            error: function(request, status, error) {
                iziToast.error({
                    title: 'Error',
                    message: error,
                });
            }
        });
    });
</script>
@endsection