<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INPUT DATA SLIDER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-4" id="button">
                        <label>Apakah input title slider?</label><br>
                        <div class="btn-group">
                            <button class="btn btn-success" onclick="enable()"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="disable()"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <form method="post" id="upload-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-4" style="display: none" id="input_slider">
                            <label class="form-label">Nama Slider</label>
                            <input class="form-control" name="nama_slider" type="text" placeholder="Title Slider">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Upload Image <br><b>(Ukuran Resolusi : 1894 x 1020 px)</b> <br><b>(Upload File Max 2MB)</b></label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control" id="">
                                <option>-- Pilih Status --</option>
                                <option value="Y">Aktif</option>
                                <option value="N">Tidak Aktif</option>
                            </select>
                            {{-- <input class="form-control" name="status" type="text"> --}}
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
