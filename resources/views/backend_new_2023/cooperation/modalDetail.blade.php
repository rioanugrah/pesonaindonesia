<div class="modal fade bs-example-modal-center" id="detail" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PARTNER KAMI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            {{-- <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf --}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
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
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Provinsi</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="detail_provinsi" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Kab/Kota</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="detail_kabkota" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Kode Pos</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="detail_kodepos" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <form id="status-form" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="detail_id" id="detail_id">
                                        <div class="col-4">
                                            <select name="status" class="form-control" id="">
                                                <option>-- Pilih Status --</option>
                                                <option value="2">Disetujui</option>
                                                <option value="3">Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                    {{-- <input class="form-control" type="text" id="detail_kodepos" readonly> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="pdfViewer">
                            {{-- <iframe src="{{  }}" frameborder="0"></iframe> --}}
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
