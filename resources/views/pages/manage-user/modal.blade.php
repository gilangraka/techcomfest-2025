<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userModalLabel">Detail User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" hidden id="id_user">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td id="name" value="{{ $value->name }}"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="email" value="{{ $value->email }}"></td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td id="nik" value="{{ $value->ref_peserta->nik }}"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td id="tgl_lahir" value="{{ $value->ref_peserta->tgl_lahir }}"></td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td id="nomor_hp" value="{{ $value->ref_peserta->nomor_hp }}"></td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td id="asal_sekolah" value="{{ $value->ref_peserta->asal_sekolah }}"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
