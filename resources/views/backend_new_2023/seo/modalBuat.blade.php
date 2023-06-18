<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data SEO Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="title" type="text" id="" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Freq</label>
                        <div class="col-sm-10">
                            <select name="freq" id="" class="form-control">
                                <option value="">-- Pilih Freq --</option>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Priority</label>
                        <div class="col-sm-10">
                            <select name="priority" id="" class="form-control">
                                <option value="">-- Pilih Priority --</option>
                                @for ($i = 1; $i <= 10; $i++)
                                @if ($i == 10)
                                <option value="1">1.0</option>
                                @else
                                <option value="{{ '0.'.$i }}">{{ '0.'.$i }}</option>
                                @endif
                                @endfor
                                {{-- <option value="daily">Daily</option>
                                {{-- <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option> --}}
                            </select>
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
