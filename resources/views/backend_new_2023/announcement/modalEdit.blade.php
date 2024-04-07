<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="update-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_id" class="form-control" id="edit_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="edit_title" class="form-control" placeholder="Title" id="edit_title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="edit_description" class="form-control" id="edit_description" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="edit_status" class="form-control" id="edit_status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="O">Open</option>
                                    <option value="C">Close</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
