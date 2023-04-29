@extends('layouts.backend_2.app')

@section('title')
    Edit Persewaan - {{ $persewaan_bus->nama_barang }}
@endsection

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/> --}}
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
                {{ Session::get('message_content') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="card">
            <form action="{{ route('persewaan.bus.update',['id' => $persewaan_bus->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nama Persewaan</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{ $persewaan_bus->nama_barang }}" placeholder="Nama Persewaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <select name="provinsi" class="form-control" id="provinsi">
                                    <option>-- Provinsi --</option>
                                    @foreach ($provinsis as $id => $provinsi)
                                        <option value="{{ $id }}" {{ $persewaan_bus->provinsi == $id ? 'selected' : null }}>{{ $provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Kabupaten / Kota</label>
                                <select name="kab_kota" class="form-select" data-width="100%" id="kab_kota">
                                    {{-- <option>-- Pilih Kab/Kota --</option>
                                    @foreach ($kabupaten_kotas as $kk)
                                        <option value="{{ $kk->nama }}">{{ $kk->nama }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Upload Gambar</label>
                                <input type="file" name="images" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="outer-repeater">
                                        <div data-repeater-list="outer-armada" class="outer">
                                            <div data-repeater-item class="outer">
                                                <div class="inner-repeater mb-4">
                                                    <div data-repeater-list="armada" class="inner mb-3">
                                                        <label class="form-label">Jenis Armada :</label>
                                                        @foreach ($persewaan_armadas as $persewaan_armada)
                                                        <div data-repeater-item class="inner mb-3 row">
                                                            <div class="col-md-10 col-sm-8">
                                                                <input type="text" name="armada" value="{{ $persewaan_armada->armada }}" class="inner form-control"
                                                                    placeholder="Jenis Armada...">
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
                                    <div class="outer-repeater">
                                        <div data-repeater-list="outer-spesifikasi" class="outer">
                                            <div data-repeater-item class="outer">
                                                <div class="inner-repeater mb-4">
                                                    <div data-repeater-list="spesifikasi" class="inner mb-3">
                                                        <label class="form-label">Spesifikasi :</label>
                                                        @foreach ($persewaan_spesifikasis as $persewaan_spesifikasi)
                                                        <div data-repeater-item class="inner mb-3 row">
                                                            <div class="col-md-10 col-sm-8">
                                                                <select name="icon" class="inner form-control" id="">
                                                                    <option>-- Pilih Icon --</option>
                                                                    <option value="fuel" {{ $persewaan_spesifikasi->icon == 'fuel' ? 'selected' : null }}>Fuel</option>
                                                                    <option value="charger" {{ $persewaan_spesifikasi->icon == 'charger' ? 'selected' : null }}>Charger</option>
                                                                    <option value="ac" {{ $persewaan_spesifikasi->icon == 'ac' ? 'selected' : null }}>AC</option>
                                                                    <option value="audio" {{ $persewaan_spesifikasi->icon == 'audio' ? 'selected' : null }}>Audio</option>
                                                                </select>
                                                                <input type="text" name="spesifikasi" value="{{ $persewaan_spesifikasi->spesifikasi }}" class="inner form-control"
                                                                    placeholder="Spesifikasi...">
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
                                    <div class="outer-repeater">
                                        <div data-repeater-list="outer-harga" class="outer">
                                            <div data-repeater-item class="outer">
                                                <div class="inner-repeater mb-4">
                                                    <div data-repeater-list="harga" class="inner mb-3">
                                                        <label class="form-label">Detail Harga :</label>
                                                        @foreach ($persewaan_hargas as $persewaan_harga)
                                                        <div data-repeater-item class="inner mb-3 row">
                                                            <div class="col-md-10 col-sm-8">
                                                                <input type="text" name="deskripsi" value="{{ $persewaan_harga->deskripsi }}" class="inner form-control"
                                                                    placeholder="Deskripsi Harga...">
                                                                <input type="text" name="harga" value="{{ $persewaan_harga->harga }}" class="inner form-control"
                                                                    placeholder="Harga...">
                                                                <select name="satuan" class="inner form-control" id="">
                                                                    <option>-- Pilih Satuan --</option>
                                                                    <option value="Hari" {{ $persewaan_harga->satuan == 'Hari' ? 'selected' : null }}>Hari</option>
                                                                    <option value="12 Jam" {{ $persewaan_harga->satuan == '12 Jam' ? 'selected' : null }}>12 Jam</option>
                                                                    <option value="18 Jam" {{ $persewaan_harga->satuan == '18 Jam' ? 'selected' : null }}>18 Jam</option>
                                                                </select>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('persewaan.bus') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/assets2/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('backend/assets2/js/pages/form-repeater.int.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $('#provinsi').on('change',function(){
            axios.post('{{ url('cooperation/kab_kota') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kab_kota').empty();

                $.each(response.data, function (id, nama) {
                    $('#kab_kota').append(new Option(nama, id))
                })
            });
        });
    </script>
@endsection