<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PENGGUNA BARU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nama Lengkap</label>
                            <input class="form-control" name="name" type="text" placeholder="Nama Lengkap">
                        </div>
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="email" type="email" placeholder="Email">
                        </div>
                        <div class="col">
                            <label class="form-label">Akses</label>
                            <select name="role" class="form-control" id="">
                                <option>-- Pilih Akses --</option>
                                @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                            {{-- <input class="form-control" name="price" type="text"> --}}
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
