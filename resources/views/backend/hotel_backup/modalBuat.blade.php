<div class="modal fade bs-example-modal-lg" id="modal_buat" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Input Data Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <form action="#" class="number-tab-steps wizard-circle">

                <h3>Data Hotel</h3>
                <fieldset>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Hotel</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="nama_hotel" type="text" id="" placeholder="Nama Hotel">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat Hotel</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_hotel" class="form-control" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <select name="provinsi" class="form-control provinsi" id="provinsi">
                                <option>-- Pilih Provinsi --</option>
                                @foreach ($provinsis as $id => $provinsi)
                                    <option value="{{ $id }}">{{ $provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                        <div class="col-sm-10">
                            <select name="kota_kabupaten" class="form-control kota_kabupaten" id="kota_kabupaten">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select name="kecamatan" class="form-control kecamatan" id="kecamatan">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Deskripsi Hotel</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_hotel" class="form-control" id="" cols="30"
                                rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Layanan Hotel</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="layanan" type="text" id="" placeholder="Layanan Hotel">
                        </div>
                    </div>
                </fieldset>
                <h3>Fasilitas Populer</h3>
                <fieldset>
                    <div class="repeater">
                        <div data-repeater-list="fasilitas_populer">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fasilitas</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="nama_fasilitas" type="text" id=""
                                            placeholder="Fasilitas Populer">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-8">
                                        <select name="icon" class="form-control" id="">
                                            <option>-- Pilih Icon --</option>
                                            @foreach ($icons as $icon)
                                                <option value="{{ $icon['icon'] }}">{{ $icon['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Add</button>
                    </div>

                </fieldset>
                <h3>Fasilitas Umum</h3>
                <fieldset>
                    <div class="repeater">
                        <div data-repeater-list="fasilitas_umum">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fasilitas</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="nama_fasilitas_umum" type="text" id=""
                                            placeholder="Fasilitas Umum">
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Insert</button>
                    </div>
                </fieldset>
                <h3>Kebijakan Hotel</h3>
                <fieldset>
                    <div class="repeater">
                        <div data-repeater-list="kebijakan_hotel">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="judul_kebijakan" type="text" id=""
                                            placeholder="Judul Kebijakan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Deskripsi Kebijakan</label>
                                    <div class="col-sm-8">
                                        <textarea name="deskripsi_kebijakan" class="form-control" id="" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Insert</button>
                    </div>
                </fieldset>
                <h3>Confirm Detail</h3>
                <fieldset>
                    <div class="p-3">
                        <div class="">
                            <input type="checkbox" class="form-check-input me-2" id="customCheck1">
                            <label class="form-label" for="customCheck1">I agree with the Terms and
                                Conditions.</label>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
