<div class="modal fade" id="detail_bukti_pembayaran" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="bukti-pembayaran-upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Kode Transaksi</label>
                        <input type="text" name="bukti_pembayaran_kode_transaksi" class="form-control" readonly id="bukti_pembayaran_kode_transaksi">
                    </div>
                    <div class="mb-3">
                        <label for="">Bukti Transaksi</label>
                        <div id="bukti_pembayaran_images"></div>
                    </div>
                    <div class="mb-3">
                        <label for="">Status Verifikasi</label>
                        <select name="bukti_pembayaran_status" class="form-control" id="">
                            <option value="">-- Pilih Status Verifikasi --</option>
                            <option value="Paid">Paid</option>
                            <option value="Not Paid">Not Paid</option>
                        </select>
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
