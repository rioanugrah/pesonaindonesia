<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Data Pemberangkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Nama Pemberangkatan</label>
                        <div class="col-md-9">
                            <input type="text" name="nama_keberangkatan" class="form-control" placeholder="Nama Pemberangkatan" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Jenis Tujuan</label>
                        <div class="col-md-9">
                            <select name="jenis_tujuan" class="form-control" id="">
                                <option value="">-- Pilih Jenis Tujuan --</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Objek Wisata</label>
                        <div class="col-md-9">
                            <div class="repeater">
                                <div data-repeater-list="group_destination">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-11">
                                            <input type="text" name="destination" class="form-control" placeholder="Objek Wisata" id="">
                                        </div>
                                        <div class="col-1">
                                            <button data-repeater-delete type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Durasi Wisata</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="durasi_hari" class="form-control" required>
                                        <div class="input-group-text">Hari</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="durasi_malam" class="form-control" required>
                                        <div class="input-group-text">Malam</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Waktu Keberangkatan</label>
                        <div class="col-md-9">
                            <input type="datetime-local" name="waktu_keberangkatan" class="form-control" id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Kuota Peserta</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-text">Kuota</div>
                                <input type="text" name="kuota_peserta" class="form-control" required>
                                <div class="input-group-text">Pax</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Catatan</label>
                        <div class="col-md-9">
                            <textarea name="remaks" class="form-control" id="" cols="30" rows="2"></textarea>
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
