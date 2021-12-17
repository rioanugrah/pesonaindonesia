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
                    <h3 class="mb-3"><u>Kamar Hotel</u></h3>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Kamar</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="nama_kamar" type="text" id="" placeholder="Nama Kamar">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Deskripsi Kamar Hotel</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_kamar" class="form-control" id="" cols="30"
                                rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Harga Kamar</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="price" type="number" id="" placeholder="Harga Kamar">
                        </div>
                    </div>
                    <hr style="border: 1px solid black">

                    <h3 class="mb-3 mt-3"><u>Fasilitas Kamar Hotel Populer</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="fasilitas_kamar_hotel_populer">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fasilitas Kamar Hotel</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="fasilitas_kamar_populer" type="text" id=""
                                            placeholder="Fasilitas Kamar Hotel">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Detail Kamar Hotel</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="fasilitas_kamar_populer_detail" type="text"
                                            id="" placeholder="Detail Kamar Hotel">
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Add</button>
                    </div>
                    <h3 class="mb-3 mt-3"><u>Fasilitas Kamar Hotel</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="fasilitas_kamar_hotel">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fasilitas Kamar</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="fasilitas_kamar" type="text" id=""
                                            placeholder="Fasilitas Kamar Hotel">
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Add</button>
                    </div>
                    <h3 class="mb-3 mt-3"><u>Kebijakan Kamar Hotel</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="kebijakan_kamar_hotel">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Judul Kebijakan Kamar</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="judul_kebijakan_kamar" type="text" id=""
                                            placeholder="Judul Kebijakan Kamar">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Deskripsi Kebijakan Kamar</label>
                                    <div class="col-sm-8">
                                        <textarea name="deskripsi_kebijakan_kamar" class="form-control" id=""
                                            cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Add</button>
                    </div>
                    <h3 class="mb-3 mt-3"><u>Upload Foto Kamar Hotel</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="foto_kamar_hotel">
                            <div data-repeater-item>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Upload Foto Kamar</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" class="form-control" id="" multiple>
                                        {{-- <input class="form-control" name="image" type="file" id=""> --}}
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="d-grid">
                                            <button data-repeater-delete type="button"
                                                class="btn btn-danger btn-sm mb-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Add</button>
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
