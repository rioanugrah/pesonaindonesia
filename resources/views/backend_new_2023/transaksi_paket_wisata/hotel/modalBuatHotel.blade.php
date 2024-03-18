<div class="modal fade" id="buatHotel" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Data Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form-hotel" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Lokasi</label>
                        <div class="col-md-8">
                            <input type="text" name="hotel_lokasi" class="form-control" placeholder="Lokasi" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Nama Hotel</label>
                        <div class="col-md-8">
                            <input type="text" name="hotel_nama_hotel" class="form-control" placeholder="Nama Hotel" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Jumlah Malam</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" name="hotel_jumlah_malam" class="form-control" placeholder="Jumlah Malam" required>
                                <div class="input-group-text">Malam</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Waktu Check In</label>
                        <div class="col-md-8">
                            <input type="datetime-local" name="hotel_checkin" class="form-control" placeholder="Check-In" required>
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