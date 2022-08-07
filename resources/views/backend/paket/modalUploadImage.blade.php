<div class="modal fade" id="modalUploadImages" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Gambar Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-paket" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="upload_paket_id" id="upload_paket_id">
                <div class="modal-body">
                    <div class="mb-3 lst">
                        <label class="form-label">Upload Paket</label>
                        <input type="file" name="images" class="form-control">
                    </div>
                    {{-- <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer">
                            <div class="inner-repeater mb-4">
                                <div data-repeater-list="images" class="inner mb-3">
                                    <label class="form-label">Upload Design Paket :</label>
                                    <div data-repeater-item class="inner mb-3 row">
                                        <div class="col-md-10 col-sm-8">
                                            <input type="file" name="images" class="inner form-control">
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <div class="d-grid">
                                                <input data-repeater-delete type="button" class="btn btn-primary inner mt-2 mt-sm-0" value="Delete">
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success inner" value="+ Add Images">
                            </div>

                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
