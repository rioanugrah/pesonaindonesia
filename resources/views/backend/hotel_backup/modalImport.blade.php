<div class="modal fade import" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Data Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hotel.import') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Upload Excel</label>
                        <input type="file" name="upload_excel" onchange="this.form.submit()" class="filestyle" data-buttonname="btn-secondary">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
