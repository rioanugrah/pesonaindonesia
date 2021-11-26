<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_pengguna"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="edit-upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nama Lengkap</label>
                            <input class="form-control" name="edit_id" id="edit_id" type="hidden" placeholder="Nama Lengkap">
                            <input class="form-control" name="edit_name" id="edit_name" type="text" placeholder="Nama Lengkap">
                        </div>
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="edit_email" id="edit_email" type="email" placeholder="Email">
                        </div>
                        <div class="col">
                            <label class="form-label">Akses</label>
                            <select name="edit_role" class="form-control" id="edit_role">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
