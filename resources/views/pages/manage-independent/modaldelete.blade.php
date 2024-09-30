<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="hapusModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>Email</th>
                                <td id="hapusEmail"></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td id="hapusNama"></td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td id="hapusRole"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <p style="text-align: justify">Apakah kamu yakin ingin menghapus role independen pada user ini?
                        </p>
                    </div>
                </div>
                <div class="row">
                    <form id="hapusForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="col-12">
                            <button type="button" onclick="konfirmHapus()"
                                class="btn btn-danger w-100">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        function konfirmHapus() {
            const email = document.getElementById('hapusEmail').innerText;
            const form = document.getElementById('hapusForm');
            form.action = `{{ route('manage-independent.destroy', ['manage_independent' => 'ID_PLACEHOLDER']) }}`.replace(
                'ID_PLACEHOLDER', email);
            form.submit();
        }
        async function openHapus(email) {
            const apiUrl = `{{ route('manage-independent.show', ['manage_independent' => 'ID_PLACEHOLDER']) }}`.replace(
                'ID_PLACEHOLDER', email);
            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();

                const tags = ['hapusEmail', 'hapusNama', 'hapusRole'];
                let elements = {};
                tags.forEach(tag => {
                    elements[tag] = document.getElementById(tag);
                });

                let roles = data.roles.map(item => item.name).join(', ');

                elements['hapusEmail'].innerText = data.email;
                elements['hapusNama'].innerText = data.name;
                elements['hapusRole'].innerText = roles;
            } catch (error) {
                console.error('There has been a problem with your fetch operation:', error);
            }
        }
    </script>
@endpush
