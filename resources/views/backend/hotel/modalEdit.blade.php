<div class="modal fade bs-example-modal-lg" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_modal_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-upload-form" method="post" enctype="multipart/form-data">
            <input class="form-control" name="edit_id" type="hidden" id="edit_id">
            <div class="modal-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Hotel</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="edit_nama_hotel" type="text" id="edit_nama_hotel" placeholder="Nama Hotel">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Alamat Hotel</label>
                    <div class="col-sm-10">
                        <textarea name="edit_alamat_hotel" class="form-control" id="edit_alamat_hotel" cols="30" rows="2"></textarea>
                        {{-- <input class="form-control" name="alamat" type="text" id="" placeholder="Alamat Hotel"> --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Deskripsi Hotel</label>
                    <div class="col-sm-10">
                        <textarea name="edit_deskripsi_hotel" class="form-control" id="edit_deskripsi_hotel" cols="30" rows="10"></textarea>
                        {{-- <input class="form-control" name="deskripsi" type="text" id="" placeholder="Deskripsi Hotel"> --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Layanan Hotel</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="edit_layanan" type="text" id="edit_layanan" placeholder="Layanan Hotel">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
                </div>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
