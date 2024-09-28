<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userModalLabel">Detail User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="user_name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" value="{{ $value->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $value->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="user_nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" value="{{ $value->ref_peserta->nik }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="user_tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir"
                        value="{{ $value->ref_peserta->tgl_lahir }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="user_nomor_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp"
                        value="{{ $value->ref_peserta->nomor_hp }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="user_asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" class="form-control" id="asal_sekolah"
                        value="{{ $value->ref_peserta->asal_sekolah }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
