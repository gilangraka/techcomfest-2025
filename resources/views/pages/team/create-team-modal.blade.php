<div class="modal fade" id="createTeamModal" tabindex="-1" aria-labelledby="createTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('team.add') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createTeamModalLabel">Buat Team</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column gap-3">
                        <div class="form-group">
                            <label for="nomor_hp">Kategori Lomba</label>
                            <input type="text" class="form-control" required disabled
                                value="{{ $data['user']->ref_peserta->ref_kategori->nama_kategori }}" />
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Ketua</label>
                            <input type="text" class="form-control" required disabled
                                value=" {{ $data['user']->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nama Team</label>
                            <input type="text" class="form-control" name="nama_team" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
