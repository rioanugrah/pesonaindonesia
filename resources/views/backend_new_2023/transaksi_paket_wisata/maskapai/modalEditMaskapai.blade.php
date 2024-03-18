<div class="modal fade" id="editMaskapai" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Maskapai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="update-form-maskapai" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_maskapai_id" id="edit_maskapai_id">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Nama Maskapai</label>
                        <div class="col-md-8">
                            <input type="text" name="edit_maskapai_nama_maskapai" class="form-control" id="edit_maskapai_nama_maskapai" placeholder="Nama Maskapai" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">No. Penerbangan</label>
                        <div class="col-md-8">
                            <input type="text" name="edit_maskapai_no_penerbangan" class="form-control" id="edit_maskapai_no_penerbangan" placeholder="No. Penerbangan" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Arah Penerbangan</label>
                        <div class="col-md-8">
                            <select name="edit_maskapai_arah" class="form-control" id="edit_maskapai_arah">
                                <option value="">-- Pilih Arah Penerbangan --</option>
                                <option value="Berangkat">Berangkat</option>
                                <option value="Pulang">Pulang</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Jam Keberangkatan</label>
                        <div class="col-md-8">
                            <input type="datetime-local" name="edit_maskapai_jam_berangkat" class="form-control" id="edit_maskapai_jam_berangkat" placeholder="Jam Keberangkatan" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Catatan</label>
                        <div class="col-md-8">
                            <textarea name="edit_maskapai_remaks" class="form-control" id="edit_maskapai_remaks" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
