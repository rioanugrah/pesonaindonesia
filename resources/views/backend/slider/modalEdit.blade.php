<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit-upload-form" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" name="edit_id" id="edit_id" type="hidden">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label class="form-label">Nama Slider</label>
                            <input class="form-control" name="edit_nama_slider" id="edit_nama_slider" type="text" placeholder="Title Slider">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Upload Image <br><b>(Ukuran Resolusi : 1894 x 1020 px)</b> <br><b>(Upload File Max 2MB)</b></label>
                            <input class="form-control" name="edit_image" type="file">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Status</label>
                            <select name="edit_status" class="form-control" id="edit_status">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
