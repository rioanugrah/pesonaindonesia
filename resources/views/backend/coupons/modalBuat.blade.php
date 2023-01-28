<div class="modal fade bs-example-modal-lg" id="modal_buat" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Data Kupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Kode Kupon</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="coupons_code" type="text" placeholder="Kode Kupon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama Kupon</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="coupons_title" type="text" placeholder="Nama Kupon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Akomodasi</label>
                    <div class="col-sm-3">
                        <select name="kategori_akomodasi_id" class="form-control" id="">
                            <option>-- Pilih Jenis Akomodasi</option>
                            @foreach ($akomodasis as $akomodasi)
                            <option value="{{ $akomodasi->id }}">{{ $akomodasi->kategori_akomodasi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Tipe Kupon</label>
                    <div class="col-sm-3">
                        <select name="coupons_type" class="form-control" id="">
                            <option>-- Pilih Jenis Kupon</option>
                            <option value="Coupon">Kupon</option>
                            <option value="Voucher">Voucher</option>
                            <option value="Promo">Promo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Harga Kupon</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="coupons_amount" type="text" placeholder="Harga">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Kupon Diskon</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="coupons_discount" type="text" placeholder="Kupon Diskon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="coupons_description" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Limit</label>
                    <div class="col-sm-2">
                        <input class="form-control" name="coupons_limit" type="text" placeholder="Batas Kupon">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Kupon Berakhir</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="coupons_expired" type="date">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="coupons_images" type="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
