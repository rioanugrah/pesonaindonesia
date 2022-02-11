<div class="modal fade" id="upload" tabindex="-1">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="berkas_modal_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="berkas-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="berkas_id" id="berkas_id">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="form-label">Nama Penanggung Jawab</label>
                            <p id="berkas_nama"></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="form-label">Nama Perusahaan</label>
                            <p id="berkas_nama_perusahaan"></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="form-label">Alamat Perusahaan</label>
                            <p id="berkas_alamat_perusahaan"></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="form-label">Upload Berkas</label>
                            <input class="form-control" name="upload_berkas" type="file" placeholder="Nama">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
