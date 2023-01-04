<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DATA PAKET WISATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Travelling</label>
                                <input type="text" class="form-control" name="nama_travelling" placeholder="Nama Paket">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori Paket</label>
                                <select name="kategori_paket_id" class="form-control" id="">
                                    <option>-- Kategori Paket --</option>
                                    <option value="1">Private</option>
                                    <option value="2">Publik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Meeting Point</label>
                                <input type="text" class="form-control" name="meeting_point" placeholder="Meeting Point">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Experience :</label>
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="outer-repeater">
                            <div data-repeater-list="outer-highlight" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="highlight" class="inner mb-3">
                                            <label class="form-label">Highlight :</label>
                                            <div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-10 col-sm-8">
                                                    <input type="text" name="nama_highlight" class="inner form-control" placeholder="Highlight...">
                                                </div>
                                                <div class="col-md-2 col-sm-4">
                                                    <div class="d-grid">
                                                        <input data-repeater-delete type="button" class="btn btn-primary inner mt-2 mt-sm-0" value="Delete">
                                                    </div>    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success inner" value="Add">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="outer-repeater">
                            <div data-repeater-list="outer-fasilitas" class="outer">
                                <div data-repeater-item class="outer">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="fasilitas" class="inner mb-3">
                                            <label class="form-label">Fasilitas :</label>
                                            <div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-10 col-sm-8">
                                                    <input type="text" name="icon" class="inner form-control" placeholder="Icon...">
                                                    <input type="text" name="nama_fasilitas" class="inner form-control" placeholder="Fasilitas...">
                                                </div>
                                                <div class="col-md-2 col-sm-4">
                                                    <div class="d-grid">
                                                        <input data-repeater-delete type="button" class="btn btn-primary inner mt-2 mt-sm-0" value="Delete">
                                                    </div>    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success inner" value="Add">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Lokasi :</label>
                                <textarea class="form-control" name="nama_lokasi" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Person :</label>
                                <input type="text" class="form-control" name="contact_person"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Rilis</label>
                                <input type="datetime-local" class="form-control" name="tanggal_rilis">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="price" placeholder="Harga">
                            </div>
                        </div>
    
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Diskon</label>
                                <input type="text" class="form-control" name="diskon" placeholder="Diskon">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Jumlah Paket</label>
                                <input type="text" class="form-control" name="jumlah_paket" placeholder="Jumlah Paket">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Images</label>
                        <input type="file" class="form-control" name="images">
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
