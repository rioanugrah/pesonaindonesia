<div class="modal fade" id="tf" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">BUKTI PEMBAYARAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-bukti" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="bukti_id" id="bukti_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Paket</label>
                        <div id="uploaded_image"></div>
                    </div>
                    <div class="mb-3">
                        <select name="bukti_status" class="form-control" id="">
                            <option>-- Bukti Pembayaran --</option>
                            <option value="3">Terima</option>
                            <option value="0">Tolak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
