<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INPUT DATA WISATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-8">
                            <label class="form-label">Nama Wisata</label>
                            <input class="form-control" name="nama_wisata" type="text">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Harga</label>
                            <input class="form-control" name="price" type="text">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Fasilitas</label>
                            <input name="fasilitas" class="fasilitas" />
                        </div>
                        <div class="col">
                            <label class="form-label">Rencana Perjalanan</label>
                            <textarea name="timeline" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Penukaran Tiket</label>
                            <textarea name="tukar_tiket" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Syarat & Ketentuan</label>
                            <textarea name="sk" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Informasi Tambahan</label>
                            <textarea name="info_tambahan" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Highligh</label>
                            <textarea name="highlight" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="image">
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
