<div class="modal fade" id="buatPeserta" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Data Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form-peserta" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Nama Peserta</label>
                        <div class="col-md-8">
                            <input type="text" name="peserta_nama_peserta" class="form-control" placeholder="Nama Peserta" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="peserta_email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">No. Telepon</label>
                        <div class="col-md-8">
                            <input type="text" name="peserta_no_telepon" class="form-control" placeholder="No. Telepon">
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
