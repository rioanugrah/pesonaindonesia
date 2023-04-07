@extends('layouts.backend_2.app')

@section('title')
    Edit Travelling
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
                <form method="post" action="{{ route('travelling.simpan') }}" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Travelling</label>
                                <input type="text" class="form-control" name="nama_travelling" value="{{ $travelling->nama_travelling }}" placeholder="Nama Paket">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori Paket</label>
                                <select name="kategori_paket_id" class="form-control" id="">
                                    <option>-- Kategori Paket --</option>
                                    <option value="1" {{ $travelling->kategori_paket_id == 1 ? 'selected' : null }}>Private</option>
                                    <option value="2" {{ $travelling->kategori_paket_id == 2 ? 'selected' : null }}>Publik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Meeting Point</label>
                                <input type="text" class="form-control" name="meeting_point" value="{{ $travelling->meeting_point }}" placeholder="Meeting Point">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Experience :</label>
                        <textarea class="form-control" name="deskripsi" rows="3">{{ $travelling->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <div class="outer-repeater">
                            <div data-repeater-list="outer-highlight" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="inner-repeater mb-4">
                                        @foreach ($travelling_highlights as $travelling_highlight)
                                        <div data-repeater-list="highlight" class="inner mb-3">
                                            <label class="form-label">Highlight :</label>
                                            <div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-10 col-sm-8">
                                                    <input type="text" name="nama_highlight" class="inner form-control"
                                                        placeholder="Highlight..." value="{{ $travelling_highlight->nama_highlight }}">
                                                </div>
                                                <div class="col-md-2 col-sm-4">
                                                    <div class="d-grid">
                                                        <button data-repeater-delete type="button" class="btn btn-danger inner"><i class="fas fa-trash"></i></button>
                                                        {{-- <input data-repeater-delete type="button"
                                                            class="btn btn-primary inner mt-2 mt-sm-0" value="Delete"> --}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                        <button data-repeater-create type="button" class="btn btn-success inner"><i class="fas fa-plus"></i></button>
                                        {{-- <input data-repeater-create type="button" class="btn btn-success inner"
                                            value="Add"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="outer-repeater">
                            <div data-repeater-list="outer-fasilitas" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="fasilitas" class="inner mb-3">
                                            <label class="form-label">Fasilitas :</label>
                                            @foreach ($travelling_fasilitas as $tf)
                                            <div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-10 col-sm-8">
                                                    <input type="text" name="icon" class="inner form-control"
                                                        placeholder="Icon..." value="{{ $tf->icon }}">
                                                    <input type="text" name="nama_fasilitas" class="inner form-control"
                                                        placeholder="Fasilitas..." value="{{ $tf->nama_fasilitas }}">
                                                </div>
                                                <div class="col-md-2 col-sm-4">
                                                    <div class="d-grid">
                                                        <button data-repeater-delete type="button" class="btn btn-danger inner"><i class="fas fa-trash"></i></button>
                                                        {{-- <input data-repeater-delete type="button"
                                                            class="btn btn-primary inner mt-2 mt-sm-0" value="Delete"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button data-repeater-create type="button" class="btn btn-success inner"><i class="fas fa-plus"></i></button>
                                        {{-- <input data-repeater-create type="button" class="btn btn-success inner"
                                            value="Add"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Lokasi :</label>
                                <textarea class="form-control" name="nama_lokasi" rows="3">{{ $travelling->location }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Person :</label>
                                <input type="text" class="form-control" name="contact_person" placeholder="Contact Person" value="{{ $travelling->contact_person }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Rilis</label>
                                <input type="datetime-local" class="form-control" name="tanggal_rilis" value="{{ $travelling->tanggal_rilis }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="price" placeholder="Harga" value="{{ $travelling->price }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Diskon</label>
                                <input type="text" class="form-control" name="diskon" placeholder="Diskon" value="{{ $travelling->diskon }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Jumlah Paket</label>
                                <input type="text" class="form-control" name="jumlah_paket"
                                    placeholder="Jumlah Paket" value="{{ $travelling->jumlah_paket }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Images</label>
                        <input type="file" class="form-control" name="images">
                    </div>
                </div>
                <div class="card-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('travelling') }}" class="btn btn-secondary">Back</a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets2/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('backend/assets2/js/pages/form-repeater.int.js') }}"></script>
@endsection