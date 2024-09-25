<div class="row mb-4">
    <div class="col-12 col-md-2 mb-3">
        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createTeamModal">
            <i class="bi bi-plus"></i> Buat Team
        </button>
        @include('pages.team.create-team-modal')
    </div>
</div>

<div class="row">
    <div class="col-10 col-md-11">
        <input placeholder="Cari team (masukkan id team)" type="text" class="form-control" id="team_input" required />
    </div>
    <div class="col-2 col-md-1">
        <button id="team_submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center">
            <i class="bi bi-search"></i>
        </button>
    </div>
</div>

{{-- Hasil search (ditemukan atau tidak) --}}
<div id="result" class="mt-3">
</div>

@push('js')
    <script>
        const team_submit = document.getElementById('team_submit');
        const team_input = document.getElementById('team_input');
        const result = document.getElementById('result');

        async function cariTeam() {
            result.innerHTML = '';
            const value = team_input.value;

            const response = await fetch('{{ route('team.find') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_team: value
                })
            });
            const data = await response.json();
            if (typeof data.id === 'undefined') {
                result.innerHTML = `
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Team tidak ditemukan!</strong> ID team salah atau kategori team tidak sesuai denganmu
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
            } else {
                let aksi = data.available ?
                    `
                        <form action='{{ route('team.masuk') }}' method='POST'>
                            @csrf
                            <input type='hidden' value='${data.id}' name='id_team' />
                            <button type='submit' class='btn btn-primary'>Masuk Team</button>
                        </form>
                    ` :
                    `<button class='btn btn-secondary' disabled>Full</button>`;
                result.innerHTML = `
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr class="table-secondary">
                                    <th scope="col">NAMA TEAM</th>
                                    <th scope="col">JUMLAH ANGGOTA</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='align-middle'>${data.nama}</td>
                                    <td class='align-middle'>${data.count} / 3</td>
                                    <td class='align-middle'>${aksi}</td>
                                </tr>
                            </tbody>
                        </table>
                    `
            }
        }

        team_submit.addEventListener('click', cariTeam);
    </script>
@endpush
