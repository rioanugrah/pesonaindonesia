<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nama Pemilik</label>
                            <input class="form-control" name="edit_nama" type="text" id="edit_nama" placeholder="Nama Pemilik">
                        </div>
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="edit_email" type="email" placeholder="Email" id="edit_email" readonly>
                            <span class="text-muted">* Email digunakan untuk menerima notifikasi</span>
                        </div>
                        <div class="col">
                            <label class="form-label">Logo Perusahaan</label>
                            <input class="form-control" name="edit_logo_perusahaan" type="file">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name="edit_nama_perusahaan" class="form-control" id="edit_nama_perusahaan" placeholder="Nama Perusahaan">
                        </div>
                        <div class="col">
                            <label class="form-label">Kategori Perusahaan</label>
                            <select name="edit_kategori" class="form-control" id="edit_kategori">
                                <option>-- Pilih Kategori Perusahaan --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori['nama_kategori'] }}">{{ $kategori['nama_kategori'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col">
                            <label class="form-label">Negara</label>
                            <select name="negara" class="form-control select2" id="">
                                <option>-- Pilih Negara --</option>
                                @foreach ($countrys as $country)
                                    <option value="{{ $country->nama_negara }}">{{ $country->nama_negara }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Provinsi</label>
                            <select name="edit_provinsi" class="form-control edit_provinsi" id="provinsi">
                                <option>-- Pilih Provinsi --</option>
                                @foreach ($provinsis as $id => $provinsi)
                                    <option value="{{ $id }}">{{ $provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Kode Pos</label>
                            <input type="number" name="edit_kode_pos" class="form-control" id="edit_kode_pos" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Alamat Perusahaan</label>
                            <textarea name="edit_alamat_perusahaan" class="form-control" id="edit_alamat_perusahaan" cols="10" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Kabupaten / Kota</label>
                            <select name="edit_kab_kota" class="form-select edit_kab_kota" data-width="100%" id="kab_kota">
                                {{-- <option>-- Pilih Kab/Kota --</option>
                                @foreach ($kabupaten_kotas as $kk)
                                    <option value="{{ $kk->nama }}">{{ $kk->nama }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Telp. Kantor</label>
                            <input type="number" name="edit_telp_kantor" class="form-control" id="edit_telp_kantor" placeholder="Telp. Kantor">
                        </div>
                        <div class="col">
                            <label class="form-label">Telp. Selular</label>
                            <input type="number" name="edit_telp_selular" id="edit_telp_selular" class="form-control" iplaceholder="Telp. Selular">
                        </div>
                        <div class="col">
                            <label class="form-label">No. Fax</label>
                            <input type="number" name="edit_no_fax" id="edit_no_fax" class="form-control" placeholder="No. Fax">
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
