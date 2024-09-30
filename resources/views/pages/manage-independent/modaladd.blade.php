@push('css')
    <link href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
@endpush

<div class="modal fade" id="independentModal" tabindex="-1" aria-labelledby="independentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="independentModalLabel">Tambah Independent</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('manage-independent.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-7 col-lg-9">
                            <div class="input-group">
                                <input id="emailInput" name="email" type="email" placeholder="Input Email"
                                    class="form-control" required>
                                <button onclick="checkEmail()" type="button" class="btn btn-primary"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="detail" class="row mb-3 d-none">
                        <div class="col-md-4 col-lg-3"></div>
                        <div class="col-md-7 col-lg-9">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Email</th>
                                    <td id="detailEmail"></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td id="detailNama"></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td id="detailKategori"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Role</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="jenis_independen" class="form-select" required>
                                <option disabled selected>--Pilih Jenis Independen--</option>
                                @foreach ($ref_roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        async function checkEmail() {
            const inputEmail = document.getElementById('emailInput').value;
            const detail = document.getElementById('detail');
            const apiUrl = `{{ route('manage-independent.show', ['manage_independent' => 'ID_PLACEHOLDER']) }}`.replace(
                'ID_PLACEHOLDER', inputEmail);

            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();

            console.log(data)

            if (!data.ref_peserta) {
                const notyf = new Notyf();
                notyf.error('Data tidak ditemukan!');
                detail.classList.add('d-none');
            } else {
                const tags = ['detailEmail', 'detailNama', 'detailKategori'];
                let elements = {};
                tags.forEach(tag => {
                    elements[tag] = document.getElementById(tag);
                });

                elements['detailEmail'].innerText = data.email;
                elements['detailNama'].innerText = data.name;
                elements['detailKategori'].innerText = data.ref_peserta.ref_kategori.nama_kategori;

                detail.classList.remove('d-none');
            }
        }
    </script>
@endpush
