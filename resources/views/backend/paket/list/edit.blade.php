@extends('layouts.backend_2.app')
@section('title')
    {{ $paket_list_detail->nama_paket }}
@endsection
@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">@yield('title')</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Paket List</li>
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('paket.list.update',['id'=>$paket_list_detail->id,'detail'=>$paket_list_detail->paket_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" name="edit_nama_paket" value="{{ $paket_list_detail->nama_paket }}" id="edit_nama_paket" placeholder="Nama Paket">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="edit_deskripsi" class="form-control edit_deskripsi" id="ckeditoredit" cols="30" rows="10">{{ $paket_list_detail->deskripsi }}</textarea>
                    {{-- <input type="email" class="form-control" id="formemail" placeholder="Enter your Email..."> --}}
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Paket</label>
                    <input type="text" class="form-control" name="edit_jumlah_paket" id="edit_jumlah_paket" value="{{ $paket_list_detail->jumlah_paket }}" placeholder="Jumlah Paket">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Paket</label>
                    <input type="text" class="form-control" name="edit_price" id="edit_price" value="{{ $paket_list_detail->price }}" placeholder="Harga Paket">
                </div>

                <div class="mb-3 col-2">
                    <label class="form-label">Diskon</label>
                    <input type="text" class="form-control" name="edit_diskon" id="edit_diskon" placeholder="Diskon" value="{{ $paket_list_detail->diskon }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Gambar Paket</label>
                    <input type="file" name="edit_images" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('backend/assets2/js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'ckeditoredit' );
</script>
@endsection