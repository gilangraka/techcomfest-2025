@push('css')
    <link href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
@endpush

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
                            <div class="input-group">
                                <input id="nama_team" type="text" class="form-control" name="nama_team" required />
                                <button type="button" onclick="cekNamaTeam()" class="btn btn-primary">Cek Nama</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Asal Sekolah</label>
                            <input type="text" class="form-control" name="asal_sekolah" required />
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nama Pembina</label>
                            <input type="text" class="form-control" name="nama_pembina" required />
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

@push('js')
    <script>
        async function cekNamaTeam() {
            const nama_team = document.getElementById('nama_team').value;
            const apiUrl = `{{ route('team.show', ['team' => 'ID_PLACEHOLDER']) }}`.replace(
                'ID_PLACEHOLDER', nama_team);

            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                if (data == 0) {
                    const notyf = new Notyf();
                    notyf.success('Nama team tersedia!');
                } else {
                    const notyf = new Notyf();
                    notyf.error('Nama team sudah digunakan!');
                }
            } catch (error) {
                console.error('There has been a problem with your fetch operation:', error);
            }
        }
    </script>
@endpush
