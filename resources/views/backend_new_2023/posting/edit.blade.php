@extends('layouts.backend_new_2023.master')
@section('title')
    Edit Posting - - {{ $blog->title }}
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @yield('title')
        @endslot
        @slot('title')
            @yield('title')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title"></h4>
                </div> --}}
                <form action="{{ route('posting.update',['slug' => $blog->slug]) }}" method="post" enctype="multipart/form-data">
                @csrf
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
                            <option value="{{ $k['kategori'] }}" {{ $blog->kategori == $k['kategori'] ? 'selected' : null }}>{{ $k['kategori'] }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $blog->description }}</textarea>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('posting') }}" class="btn btn-secondary">Back</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/ckeditor/ckeditor.min.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection