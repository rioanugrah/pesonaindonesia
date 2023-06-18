@extends('layouts.backend_new_2023.master')

@section('title')
    Buat Event
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
                <form action="{{ route('events.simpan') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control editor" rows="5"></textarea>
                                {{-- <input class="form-control" name="title" type="text" placeholder="Title"> --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="location" type="text" placeholder="Lokasi Event">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Start Event</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="start_event" type="datetime-local"
                                    placeholder="Start Event">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Finish Event</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="finish_event" type="datetime-local"
                                    placeholder="Finish Event">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Kuota</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="kuota" type="text" placeholder="Kuota">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="image" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('events') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
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

{{-- @section('js')
    <script src="{{ asset('backend/assets2/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ asset('backend/assets2/libs/tinymce/tinymce.min.js') }}"></script>
@endsection --}}
