<div class="modal fade bs-example-modal-lg" id="modal_edit" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Data Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="upload-form-edit" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_id" id="edit_id">
            <div class="modal-body">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_title" id="edit_title" type="text" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="edit_deskripsi" id="edit_deskripsi" class="form-control" rows="5"></textarea>
                            {{-- <input class="form-control" name="title" type="text" placeholder="Title"> --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_location" id="edit_location" type="text" placeholder="Lokasi Event">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Start Event</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_start_event" id="edit_start_event" type="datetime-local" placeholder="Start Event">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Finish Event</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="finish_event" id="edit_finish_event" type="datetime-local" placeholder="Finish Event">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Upload Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="edit_image" id="edit_image" type="file">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
