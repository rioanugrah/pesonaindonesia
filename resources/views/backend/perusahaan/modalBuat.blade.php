<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INPUT DATA PERUSAHAAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="nama_perusahaan" type="text" id="" placeholder="Nama Perusahaan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_perusahaan" class="form-control" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="penanggung_jawab" type="text" id="" placeholder="Penanggung Jawab">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">SIUP</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="siup" type="text" id="" placeholder="SIUP">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="npwp" type="text" id="" placeholder="NPWP">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select name="jabatan" class="form-control" id="">
                                <option>-- Pilih Jabatan --</option>
                                @foreach ($jabatan as $jb)
                                    <option value="{{ $jb['id'] }}">{{ $jb['role'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status Perusahaan</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control" id="">
                                <option>-- Pilih Status --</option>
                                <option value="Y">Aktif</option>
                                <option value="N">Tidak Aktif</option>
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
    </div>
</div>
