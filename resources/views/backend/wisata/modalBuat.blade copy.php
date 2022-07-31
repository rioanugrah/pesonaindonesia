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
                            <input class="form-control" name="nama_wisata" type="text" placeholder="Nama Wisata">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Harga</label>
                            <input class="form-control" name="price" type="text" placeholder="Harga">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="5" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Fasilitas</label>
                            {{-- <table class="table" id="dynamic_field_fasilitas">
                                <tr>
                                    <td><input type="text" name="fasilitas[]" placeholder="Fasilitas" class="form-control fasilitas_list"></td>
                                    <td><button type="button" name="add" id="add1" class="btn btn-success"><span class="fa fa-plus"></span></button></td>
                                </tr>
                            </table> --}}
                            <input name="fasilitas" class="form-control fasilitas" type="text" placeholder="Fasilitas" />
                        </div>
                        <div class="col">
                            <label class="form-label">Rencana Perjalanan</label>
                            {{-- <table class="table" id="dynamic_field_timeline">
                                <tr>
                                    <td style="width: 25%"><input type="text" name="waktu" class="form-control waktu_list" placeholder="Pukul"></td>
                                    <td><input type="text" name="timeline" class="form-control timeline_list" placeholder="Rencana Perjalanan 1"></td>
                                    <td><button type="button" name="add" id="add2" class="btn btn-success"><span class="fa fa-plus"></span></button></td>
                                </tr>
                            </table> --}}
                            <textarea name="timeline" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Penukaran Tiket</label>
                            <textarea name="tukar_tiket" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Syarat & Ketentuan</label>
                            <textarea name="sk" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Informasi Tambahan</label>
                            <textarea name="info_tambahan" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Highlight</label>
                            <textarea name="highlight" class="form-control" cols="30" rows="5"></textarea>
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
