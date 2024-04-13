<div class="modal fade" id="buat" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Ticket Bromo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Booking Date</label>
                        <div class="col-md-9">
                            @foreach ($bromos as $key_bromo => $bromo)
                            <div>
                                <input type="radio" name="booking_date" class="form-check-input booking_date" value="{{ $bromo['id'] }}" id="formRadios{{ $key_bromo }}">
                                <label class="form-check-label" for="formRadios{{ $key_bromo }}">
                                    {{ $bromo['tanggal'].' - '.$bromo['category_trip'] }}
                                </label>
                            </div>
                            @endforeach
                            {{-- <input type="text" name="nama_keberangkatan" class="form-control" placeholder="Nama Pemberangkatan" required> --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Packet Order</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Quota</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Meeting Point</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Destination</label>
                        <div class="col-md-9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Include</label>
                        <div class="col-md-9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Exclude</label>
                        <div class="col-md-9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Price</label>
                        <div class="col-md-9">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buy Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>
