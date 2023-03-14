<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis Vendor :</label>
                        <select name="jenis_vendor" class="form-control" id="">
                            <option>-- Jenis Vendor --</option>
                            @foreach ($select_vendors as $select_vendor)
                                <option value="{{ $select_vendor['kode_vendor'] }}">{{ $select_vendor['nama_vendor'] }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" name="nama" placeholder="Nama"> --}}
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama :</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat :</label>
                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Telp :</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="No. Telp">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Perusahaan :</label>
                        <input type="text" class="form-control" name="perusahaan" placeholder="Perusahaan">
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
