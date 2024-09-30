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
                        <td id="name"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="email"></td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td id="nik"></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td id="gender"></td>
                    </tr>
                    <tr>
                        <th>Kategori Lomba</th>
                        <td id="kategori"></td>
                    </tr>
                    <tr>
                        <th>Team</th>
                        <td id="team"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td id="tgl_lahir"></td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td id="nomor_hp"></td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td id="asal_sekolah"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        async function openUserModal(id_user) {
            const apiUrl = `{{ route('manage-user.show', ['manage_user' => 'ID_PLACEHOLDER']) }}`.replace(
                'ID_PLACEHOLDER',
                id_user);

            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                const tags = ['name', 'email', 'nik', 'tgl_lahir', 'nomor_hp', 'asal_sekolah', 'gender', 'kategori',
                    'team'
                ];
                let elements = {};

                tags.forEach(tag => {
                    elements[tag] = document.getElementById(tag);
                });

                elements['name'].innerText = data.name;
                elements['email'].innerText = data.email;
                elements['nik'].innerText = data.ref_peserta.nik;
                elements['tgl_lahir'].innerText = data.ref_peserta.tgl_lahir;
                elements['nomor_hp'].innerText = data.ref_peserta.nomor_hp;
                elements['asal_sekolah'].innerText = data.ref_peserta.asal_sekolah;
                elements['gender'].innerText = data.ref_peserta.ref_gender.nama_gender;
                elements['kategori'].innerText = data.ref_peserta.ref_kategori.nama_kategori;
                elements['team'].innerText = data.ref_peserta?.ref_team?.nama_team ? `${data.ref_peserta.ref_team
                    .nama_team}` : '-';

            } catch (error) {
                console.error('There has been a problem with your fetch operation:', error);
            }
        }
    </script>
@endpush
