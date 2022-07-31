<div class="modal fade bs-example-modal-lg" id="modal_image" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="image_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="upload-image" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="image_id" id="image_id">
                <div class="mb-5">
                    <label class="col-form-label">Upload Gambar Hotel</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
        
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
