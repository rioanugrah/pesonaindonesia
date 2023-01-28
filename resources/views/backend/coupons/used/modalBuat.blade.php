<div class="modal fade bs-example-modal-lg" id="modal_buat" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Kupon - {{ $coupon->coupons_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Kategori Akomodasi</label>
                    <div class="col-sm-4">
                        <select name="kategori_akomodasi_id" class="form-control" id="">
                            <option>-- Pilih Kategori Akomodasi --</option>
                            @foreach ($kategori_akomodasis as $ka)
                            <option value="{{ $ka->id }}">{{ $ka->kategori_akomodasi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Nama Akomodasi</label>
                    <div class="col-sm-4">
                        <select name="akomodasi_id" class="form-control select2" id="">
                            <option>-- Pilih --</option>
                            @foreach ($travellings as $travelling)
                            <option value="{{ $travelling->id }}">{{ $travelling->nama_travelling }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-4">
                        <select name="status" class="form-control select2" id="">
                            <option>-- Pilih --</option>
                            <option value="Y">Ya</option>
                            <option value="T">Tidak</option>
                        </select>
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
