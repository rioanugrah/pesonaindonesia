@extends('layouts.backend_2.app')

@section('title')
    Edit Paket - {{ $honeymoon->nama_paket }}
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">@yield('title')</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Paket Honeymoon</li>
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('honeymoon.update',['id' => $honeymoon->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" value="{{ old('nama_paket', $honeymoon->nama_paket) }}" placeholder="Nama Paket" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="elm1" cols="30" rows="10">{{ old('deskripsi',$honeymoon->deskripsi) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Harga</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price',$honeymoon->price) }}" placeholder="Harga" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Jumlah Paket</label>
                            <input type="text" name="qty" class="form-control" value="{{ old('qty',$honeymoon->qty) }}" placeholder="Jumlah Paket" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Upload Gambar</label>
                            <input type="file" name="images" class="form-control" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/js/pages/form-editor.init.js') }}"></script>
<script src="{{ asset('backend/assets2/libs/tinymce/tinymce.min.js') }}"></script>
@endsection