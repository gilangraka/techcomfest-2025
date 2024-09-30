<div class="modal fade" id="independentModal" tabindex="-1" aria-labelledby="independentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="independentModalLabel">Tambah Independent</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addIndependentForm">
                    <div class="mb-3">
                        <label for="emailSelect" class="form-label">Email</label>
                        <select id="emailSelect" class="form-select" required>
                            <option value="" disabled selected>Pilih Email</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenisIndependentSelect" class="form-label">Jenis Independent</label>
                        <select id="jenisIndependentSelect" class="form-select" required>
                            <option value="" disabled selected>Pilih Jenis Independent</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="addIndependentForm" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
