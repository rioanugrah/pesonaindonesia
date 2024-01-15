<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="">Tanggal Dibuka</label>
                                <input type="datetime-local" name="tanggal" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" id="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Meeting Point</label>
                                <input type="text" name="meeting_point" placeholder="Meeting Point" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Kategori Trip</label>
                                <select name="category_trip" class="form-control" id="">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Private">Private</option>
                                    <option value="Publik">Open Trip</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Kuota</label>
                                <input type="text" name="quota" placeholder="Quota" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Max Kuota</label>
                                <input type="text" name="max_quota" placeholder="Max Quota" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="text" name="discount" placeholder="Discount" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Destinasi</label>
                            <div class="repeater">
                                <div data-repeater-list="group_destination">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-10">
                                            <input type="text" name="destination" class="form-control" id="">
                                        </div>
                                        <div class="col-2">
                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Include</label>
                            <div class="repeater">
                                <div data-repeater-list="group_include">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-10">
                                            <input type="text" name="include" class="form-control" id="">
                                        </div>
                                        <div class="col-2">
                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Exclude</label>
                            <div class="repeater">
                                <div data-repeater-list="group_exclude">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-10">
                                            <input type="text" name="exclude" class="form-control" id="">
                                        </div>
                                        <div class="col-2">
                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
