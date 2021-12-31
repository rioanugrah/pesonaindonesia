<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_modal_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="edit-upload-form" enctype="multipart/form-data">
                <input class="form-control" name="edit_id" id="edit_id" type="hidden">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_nama_perusahaan" type="text" id="edit_nama_perusahaan" placeholder="Nama Perusahaan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                        <div class="col-sm-10">
                            <textarea name="edit_alamat_perusahaan" class="form-control" id="edit_alamat_perusahaan" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_penanggung_jawab" type="text" id="edit_penanggung_jawab" placeholder="Penanggung Jawab">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">SIUP</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_siup" type="text" id="edit_siup" placeholder="SIUP">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_npwp" type="text" id="edit_npwp" placeholder="NPWP">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select name="edit_jabatan" class="form-control" id="edit_jabatan">
                                <option>-- Pilih Jabatan --</option>
                                @foreach ($jabatan as $jb)
                                    <option value="{{ $jb['id'] }}">{{ $jb['role'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status Perusahaan</label>
                        <div class="col-sm-10">
                            <select name="edit_status" class="form-control" id="edit_status">
                                <option>-- Pilih Status --</option>
                                <option value="Y">Aktif</option>
                                <option value="N">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
