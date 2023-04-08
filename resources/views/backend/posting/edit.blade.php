@extends('layouts.backend_2.app')

@section('title')
    Edit Posting - {{ $blog->title }}
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
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <form method="post" action="{{ route('posting.update',['slug' => $blog->slug]) }}" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}" placeholder="Nama Paket">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" id="">
                        <option>-- Pilih Kategori --</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k['kategori'] }}">{{ $k['kategori'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" id="elm1" cols="30" rows="10">{{ $blog->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Images</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="mb-3">
                    <label class="form-label">Keyword</label>
                    <input type="text" class="form-control" name="keyword" value="{{ $blog->keyword }}" placeholder="Keyword (Gunakan tanda koma , untuk pemisah)">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('posting') }}" class="btn btn-secondary">Back</a>
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