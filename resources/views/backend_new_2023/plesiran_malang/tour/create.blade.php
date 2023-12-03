@extends('layouts.backend_new_2023.master')
@section('title')
    Buat Paket Travelling
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

    <form action="{{ route('b.plesiran_malang.tour_simpan') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Data Travelling</h2>
                </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Nama Tour</label>
                            <input type="text" name="nama_tour" class="form-control" placeholder="Nama Paket"
                                id="">
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control editor" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Durasi</label>
                                    <input type="text" name="durasi" class="form-control" placeholder="Durasi" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Team</label>
                                    <input type="text" name="grup" class="form-control" placeholder="Team Max" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Umur</label>
                                    <input type="text" name="age" class="form-control" placeholder="Age" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" class="form-control" placeholder="Harga" id="">
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="">Itinerary</label>
                                    <div class="repeater">
                                        <div data-repeater-list="group_itinerary">
                                            <div data-repeater-item class="row mb-1">
                                                <div class="col-md-11">
                                                    <div class="mb-3">
                                                        <input type="text" name="itinerary_title" class="form-control" placeholder="Itinerary" id="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea name="itinerary_description" class="form-control" id="" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button data-repeater-delete type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Include & Exclude</label>
                                <textarea name="include_exclude" class="form-control editor2" id="" cols="30" rows="5"></textarea>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="">Upload Image</label>
                                    <div class="repeater">
                                        <div data-repeater-list="group_images">
                                            <div data-repeater-item class="row mb-1">
                                                <div class="col-md-11 mb-3">
                                                    <input type="file" name="images" class="form-control" id="">
                                                </div>
                                                <div class="col-md-1">
                                                    <button data-repeater-delete type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </div>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('backend_new/libs/ckeditor/ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('backend_new/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('.editor'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('.editor2'))
        .catch(error => {
            console.error(error);
        });

        $('.repeater').repeater({
            // defaultValues: {
            //     'textarea-input': 'foo',
            //     'text-input': 'bar',
            //     'select-input': 'B',
            //     'checkbox-input': ['A', 'B'],
            //     'radio-input': 'B'
            // },
            show: function show() {
                $(this).slideDown();
            },
            hide: function hide(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function ready(setIndexes) {}
        });
    </script>
@endsection
