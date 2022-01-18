<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INPUT DATA KERJASAMA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nama</label>
                            <input class="form-control" name="nama" type="text" placeholder="Nama">
                        </div>
                        <div class="col">
                            <label class="form-label">Logo Perusahaan</label>
                            <input class="form-control" name="logo_perusahaan" type="file">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control" id="" placeholder="Nama Perusahaan">
                        </div>
                        <div class="col">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-control" id="">
                                <option>-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori['nama_kategori'] }}">{{ $kategori['nama_kategori'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Negara</label>
                            <select name="negara" class="form-control select2" id="">
                                <option>-- Pilih Negara --</option>
                                @foreach ($countrys as $country)
                                    <option value="{{ $country->nama_negara }}">{{ $country->nama_negara }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Provinsi</label>
                            <select name="provinsi" class="form-control" id="provinsi">
                                <option>-- Pilih Provinsi --</option>
                                @foreach ($provinsis as $id => $provinsi)
                                    <option value="{{ $id }}">{{ $provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Kode Pos</label>
                            <input type="number" name="kode_pos" class="form-control" id="" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Alamat Perusahaan</label>
                            <textarea name="alamat_perusahaan" class="form-control" id="" cols="10" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Kabupaten / Kota</label>
                            <select name="kab_kota" class="form-select" data-width="100%" id="kab_kota">
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
                            <input type="number" name="telp_kantor" class="form-control" id="" placeholder="Telp. Kantor">
                        </div>
                        <div class="col">
                            <label class="form-label">Telp. Selular</label>
                            <input type="number" name="telp_selular" class="form-control" id="" placeholder="Telp. Selular">
                        </div>
                        <div class="col">
                            <label class="form-label">No. Fax</label>
                            <input type="number" name="no_fax" class="form-control" id="" placeholder="No. Fax">
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
