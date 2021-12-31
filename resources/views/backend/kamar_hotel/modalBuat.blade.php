<div class="modal fade bs-example-modal-lg" id="modal_buat" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myLargeModalLabel">Kamar Hotel {{ $hotel->nama_hotel }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="upload-form form-horizontal" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_hotel" value="{{ $hotel->id }}">
                <div class="modal-body">
                    <h3 class="mb-3"><u>Kamar Hotel</u></h3>
                    <table class="table table-responsive">
                        <tr>
                            <td>Nama Kamar</td>
                            <td>:</td>
                            <td><input class="form-control" name="nama_kamar" type="text" id="" placeholder="Nama Kamar"></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Kamar Hotel</td>
                            <td>:</td>
                            <td><textarea name="deskripsi_kamar" class="form-control" id="" cols="30"
                                rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td>Jumlah Kamar</td>
                            <td>:</td>
                            <td><input class="form-control" name="jumlah_kamar" type="number" id="" placeholder="Jumlah Kamar"></td>
                        </tr>
                        <tr>
                            <td>Harga Kamar</td>
                            <td>:</td>
                            <td><input class="form-control" name="price" type="number" id="" placeholder="Harga Kamar"></td>
                        </tr>
                    </table>
                    <hr style="border: 1px solid black">

                    <h3 class="mb-3 mt-3"><u>Fasilitas Kamar Hotel Populer</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="fasilitas_kamar_hotel_populer">
                            <div data-repeater-item>
                                <table class="table table-responsive">
                                    <tr>
                                        <td>Fasilitas Kamar Hotel</td>
                                        <td>:</td>
                                        <td><input class="form-control" name="fasilitas_kamar_populer" type="text" id=""
                                            placeholder="Fasilitas Kamar Hotel"></td>
                                    </tr>
                                    <tr>
                                        <td>Detail Kamar Hotel</td>
                                        <td>:</td>
                                        <td><input class="form-control" name="fasilitas_kamar_populer_detail" type="text"
                                            id="" placeholder="Detail Kamar Hotel">
                                    </tr>
                                </table>
                                <div class="d-grid">
                                    <button data-repeater-delete type="button"
                                            class="btn btn-danger btn-sm mb-2"><i
                                                class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                    class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>
                    <h3 class="mb-3 mt-3"><u>Fasilitas Kamar Hotel</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="fasilitas_kamar_hotel">
                            <div data-repeater-item>
                                <table class="table table-responsive">
                                    <tr>
                                        <td>Fasilitas Kamar</td>
                                        <td>:</td>
                                        <td><input class="form-control" name="fasilitas_kamar" type="text" id=""
                                            placeholder="Fasilitas Kamar Hotel"></td>
                                    </tr>
                                </table>
                                <div class="d-grid">
                                    <button data-repeater-delete type="button"
                                            class="btn btn-danger btn-sm mb-2"><i
                                                class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                    class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>
                    <h3 class="mb-3 mt-3"><u>Kebijakan Kamar Hotel</u></h3>
                    <div class="repeater">
                        <div data-repeater-list="kebijakan_kamar_hotel">
                            <div data-repeater-item>
                                <table class="table table-responsive">
                                    <tr>
                                        <td>Judul Kebijakan Kamar</td>
                                        <td>:</td>
                                        <td><input class="form-control" name="judul_kebijakan_kamar" type="text" id=""
                                            placeholder="Judul Kebijakan Kamar"></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Kebijakan Kamar</td>
                                        <td>:</td>
                                        <td><textarea name="deskripsi_kebijakan_kamar" class="form-control" id=""
                                            cols="30" rows="5"></textarea></td>
                                    </tr>
                                </table>
                                <div class="d-grid">
                                    <button data-repeater-delete type="button"
                                            class="btn btn-danger btn-sm mb-2"><i
                                                class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button data-repeater-create type="button" class="btn btn-success btn-sm mt-2 mt-sm-0"><i
                                class="fa fa-plus"></i> Add</button>
                        </div>
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
