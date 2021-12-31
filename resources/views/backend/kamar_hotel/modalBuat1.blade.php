<div class="modal fade bs-example-modal-lg" id="modal_buat" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myLargeModalLabel">Input Kamar Hotel {{ $hotel->nama_hotel }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="upload-form form-horizontal" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_hotel" value="{{ $hotel->id }}">
                <div class="modal-body">
                    <div id="dynamicImages">
                        <div1 class="row mb-3">
                            <label class="col-sm-2 col-form-label">Upload Foto Kamar</label>
                            <div class="col-sm-8">
                                <input type="file" name="addimage[0][image]" class="form-control" id="">
                            </div>
                            <div class="col-sm-2 align-self-center">
                                <div class="d-grid">
                                    <button type="button" name="add" id="addImage" class="btn btn-success btn-sm mb-2"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div1>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                            class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
