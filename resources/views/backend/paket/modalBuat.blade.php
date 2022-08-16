<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DATA PAKET WISATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" class="outer-repeater" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="nama_paket" type="text" id="" placeholder="Nama Paket">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Deskripsi Paket</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="price" type="text" id="" placeholder="Harga">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="inner-repeater mb-4">
                            <div data-repeater-list="inner-group" class="inner mb-3">
                                <label class="form-label">Phone no :</label>
                                <div data-repeater-item class="inner mb-3 row">
                                    <div class="col-md-10 col-sm-8">
                                        <input type="text" class="inner form-control" placeholder="Enter your phone no..."/>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <div class="d-grid">
                                            <input data-repeater-delete type="button" class="btn btn-primary inner mt-2 mt-sm-0" value="Delete"/>
                                        </div>    
                                    </div>
                                    
                                </div>
                            </div>
                            <input data-repeater-create type="button" class="btn btn-success inner" value="Add Number"/>
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                        {{-- <input type="email" class="form-control" id="formemail" placeholder="Enter your Email..."> --}}
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Paket</label>
                        <input type="text" class="form-control" name="price" placeholder="Harga Paket">
                    </div>

                    <div class="mb-3 col-2">
                        <label class="form-label">Diskon</label>
                        <input type="text" class="form-control" name="diskon" placeholder="Diskon">
                    </div>

                    {{-- <div class="mb-3 lst">
                        <label class="form-label">Upload Paket</label>
                        <div class="input-group hdtuto control-group lst increment">
                            <input type="file" name="filenames[]" class="myfrm form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i
                                        class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                        </div>
                        <div class="clone hide">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="filenames[]" class="myfrm form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i
                                            class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
