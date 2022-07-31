<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INPUT DATA WISATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Nama Wisata</label>
                            <input class="form-control" name="nama_wisata" type="text" placeholder="Nama Wisata">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="5" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Provinsi</label>
                            <select name="provinsi" class="form-control" id="provinsi">
                                <option>-- Pilih Provinsi --</option>
                                @foreach ($provinsis as $id => $provinsi)
                                    <option value="{{ $id }}">{{ $provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Kabupaten / Kota</label>
                            <select name="kota_kabupaten" class="form-select" data-width="100%" id="kab_kota">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="images">
                            {{-- <textarea name="sk" class="form-control" cols="30" rows="10"></textarea> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
