<div class="modal fade" id="event_price" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Event Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form-product" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Event Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ $event->title }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Event Price</label>
                        <div class="col-md-8">
                            <div class="repeater">
                                <div data-repeater-list="group_event_price">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-11">
                                            <div class="mb-2">
                                                <input type="text" name="product" class="form-control" placeholder="Event Name" id="">
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" name="quota" class="form-control" placeholder="Quota" id="">
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" name="price" class="form-control" placeholder="Price" id="">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <button data-repeater-delete type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
