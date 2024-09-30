<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="teamModalLabel">Detail Team</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" hidden id="id_team">
                <table class="table table-bordered" id="detailTeam">
                    <tr>
                        <th>Nama Team</th>
                        <td id="nama_team"></td>
                    </tr>
                    <tr>
                        <th>Bidang Lomba</th>
                        <td id="bidang_lomba"></td>
                    </tr>
                    <tr>
                        <th>Anggota</th>
                        <td>
                            <ul style="margin-left: 18px; padding-left:0;" id="anggota">
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>Berkas</th>
                        <td>
                            <a id="berkas" class="btn btn-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Bukti Pembayaran</th>
                        <td>
                            <a id="bukti_pembayaran" class="btn btn-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <form id="verifikasiForm" method="POST">
            @csrf
            @method('PUT')
        </form>
    </div>
</div>

@push('js')
    <script>
        async function openTeamModal(id_team) {
            const apiUrl = `{{ route('manage-team.show', ['id' => 'ID_PLACEHOLDER']) }}`.replace('ID_PLACEHOLDER',
                id_team);

            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                const is_verified = data.is_verified;
                if (is_verified != 1) {
                    const detailTeam = document.getElementById('detailTeam');
                    detailTeam.insertAdjacentHTML('afterend', `
                        <div class="row">
                            <div class="col-6">
                                <button onclick="showKonfirmasi()" type="button" class="btn btn-danger w-100">Tolak
                                    Verifikasi</button>
                            </div>
                            <div class="col-6">
                                <button onclick="verifikasi()" type="submit" class="btn btn-primary w-100">Verifikasi
                                    Tim</button>
                            </div>
                        </div>
                    `);
                }

                const tags = ['id_team', 'nama_team', 'bidang_lomba', 'berkas', 'bukti_pembayaran', 'anggota'];
                const elements = {};

                tags.forEach(tag => {
                    elements[tag] = document.getElementById(tag);
                });
                elements['id_team'].value = data.id
                elements['nama_team'].innerText = data.nama_team;
                elements['bidang_lomba'].innerText = data.ref_kategori.nama_kategori;
                elements['berkas'].href = `download-berkas/1/${data.file_berkas}`;
                elements['bukti_pembayaran'].href = `download-berkas/2/${data.file_bukti_pembayaran}`;
                let dataPeserta = [];
                data.ref_peserta.forEach(item => {
                    dataPeserta.push(`${item.user.email} <b>(${item.user.name})</b>`);
                })
                elements['anggota'].innerHTML = '';
                dataPeserta.forEach(item => {
                    elements['anggota'].innerHTML += `<li>${item}</li>`
                })
            } catch (error) {
                console.error('There has been a problem with your fetch operation:', error);
            }
        }

        function verifikasi() {
            const id_team = document.getElementById('id_team').value;
            const verifForm = document.getElementById('verifikasiForm');

            verifForm.action = `{{ route('manage-team.update', ':id_team') }}`.replace(':id_team', id_team);
            verifForm.submit();
        }

        function tutupTolakDialog() {
            const tag = document.getElementById('tolakDialog');
            tag.remove();
        }

        function showKonfirmasi() {
            const id_team = document.getElementById('id_team').value;
            const url = `manage-team/${id_team}`;

            const tag = document.getElementById('teamModal');

            // Cek apakah elemen dengan ID konfirmasiTolak sudah ada
            if (!document.getElementById('konfirmasiTolak')) {
                tag.innerHTML += `
                    <div class="modal-dialog" id='tolakDialog'>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="teamModalLabel">Konfirmasi Penolakan</h1>
                                <button onclick='tutupTolakDialog()' type="button" class="btn-close"></button>
                            </div>
                            <div class="modal-body" id="konfirmasiTolak">
                                <form action='${url}' method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <input name="keterangan" type="text" class="form-control" placeholder="Alasan penolakan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-outline-danger w-100">Konfirmasi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
            }
        }
    </script>
@endpush
