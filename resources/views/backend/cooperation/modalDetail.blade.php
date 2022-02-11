<div class="modal fade bs-example-modal-center" id="detail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PARTNER KAMI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="detail_nama" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="detail_email" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="detail_nama_perusahaan" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Alamat Perusahaan</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="detail_alamat_perusahaan" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
