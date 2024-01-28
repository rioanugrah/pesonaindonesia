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

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Paket Travelling</h4>
                </div>
                <form action="{{ route('tour.create.simpan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Paket</label>
                        <input type="text" name="title" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control editor" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Paket</label>
                        <select name="jenis_tour" class="form-control" id="">
                            <option value="">-- Pilih Jenis Paket --</option>
                            <option value="Private">Private</option>
                            <option value="Publik">Publik</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="tour_category_id" class="form-control" id="">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($tour_categories as $tour_category)
                                <option value="{{ $tour_category->id }}">{{ $tour_category->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label>Minimum People</label>
                            <input type="text" name="min_people" class="form-control" id="">
                        </div>
                        <div class="col-6">
                            <label>Maximum People</label>
                            <input type="text" name="max_people" class="form-control" id="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Lokasi</label>
                        <textarea name="location" class="form-control" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label>Harga Sekarang</label>
                            <input type="text" name="current_price" class="form-control" id="">
                        </div>
                        <div class="col-4">
                            <label>Harga Sebelum</label>
                            <input type="text" name="previous_price" class="form-control" id="">
                        </div>
                        <div class="col-4">
                            <label>Diskon</label>
                            <input type="text" name="discount" class="form-control" id="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Include</label>
                        <div class="repeater">
                            <div data-repeater-list="group_include">
                                <div data-repeater-item class="row mb-3">
                                    <div class="col-10">
                                        <input type="text" name="include" class="form-control" id="">
                                    </div>
                                    <div class="col-2">
                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                    </div>
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Exclude</label>
                        <div class="repeater">
                            <div data-repeater-list="group_exclude">
                                <div data-repeater-item class="row mb-3">
                                    <div class="col-10">
                                        <input type="text" name="exclude" class="form-control" id="">
                                    </div>
                                    <div class="col-2">
                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                    </div>
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Itinerary</label>
                        <div class="repeater">
                            <div data-repeater-list="group_itinerary">
                                <div data-repeater-item class="row mb-3">
                                    <div class="col-md-3">
                                        <input type="time" name="time" class="form-control" id="">
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="title" class="form-control" id="">
                                    </div>
                                    <div class="col-md-2">
                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                    </div>
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Upload Image</label>
                        <input type="file" name="images" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label>FAQ</label>
                        <div class="repeater">
                            <div data-repeater-list="group_faq">
                                <div data-repeater-item class="row mb-3">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="title" class="form-control" id="">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                    </div>
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Facilities</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
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
