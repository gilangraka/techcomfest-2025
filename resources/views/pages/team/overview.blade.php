@push('css')
    <link href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
@endpush

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Team ID</b></p>
    <p class="col-lg-9 col-md-8 d-flex gap-3">
        <span id="team_id">{{ $data['team']->id }}</span>
        <span style="cursor: pointer;" onclick="copyText()"><i class="bi bi-copy"></i></spanc>
    </p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Nama Team</b></p>
    <p class="col-lg-9 col-md-8">{{ $data['team']->nama_team }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Kategori Lomba</b></p>
    <p class="col-lg-9 col-md-8">{{ $data['team']->ref_kategori->nama_kategori }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label"><b>Anggota</b></p>
    <div class="col-lg-9 col-md-8">
        <table class="table table-bordered text-center">
            <tr class="table-secondary">
                <th>#</th>
                <th>Nama Anggota</th>
            </tr>
            <tr>
                <td>1</td>
                <td>{{ $data['ketua']->user->name }} ({{ $data['ketua']->user->email }}) <b>*</b></td>
            </tr>
            @foreach ($data['anggota'] as $key => $item)
                <tr>
                    <td>{{ $key + 2 }}</td>
                    <td>{{ $item->user->name }} ({{ $item->user->email }})</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<form id="berkas_form"
    action="{{ empty($data['team']->file_berkas) ? route('berkas.upload') : route('berkas.delete') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <p class="col-lg-3 col-md-4 label "><b>File Berkas</b></p>

        @if (empty($data['team']->file_berkas))
            <div class="col-lg-9 col-md-8">
                <button type="button" class="btn btn-primary d-flex gap-2"
                    onclick="document.getElementById('file_berkas').click();">
                    <i class="nav-icon bi bi-upload"></i><span>Upload</span>
                </button>
                <input type="file" accept=".zip, .rar" id="file_berkas" name="file_berkas" style="display: none;"
                    onchange="document.getElementById('berkas_form').submit();" />
            </div>
        @else
            <div class="col-lg-9 col-md-8 d-flex align-items-center gap-2">
                <a class="btn btn-warning d-flex gap-2" href="{{ route('berkas.lihat', $data['team']->file_berkas) }}">
                    <i class="nav-icon bi bi-eye"></i>
                </a>
                @if ($data['team']->is_verified != 2)
                    <button type="submit" class="btn btn-danger d-flex gap-2">
                        <i class="nav-icon bi bi-trash"></i><span>Hapus</span>
                    </button>
                @endif
            </div>
        @endif
    </div>
</form>

<form id="bukti_form"
    action="{{ empty($data['team']->file_bukti_pembayaran) ? route('bukti.upload') : route('bukti.delete') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <p class="col-lg-3 col-md-4 label "><b>Bukti Pembayaran</b></p>
        @if (empty($data['team']->file_bukti_pembayaran))
            <div class="col-lg-9 col-md-8">
                <button type="button" class="btn btn-primary d-flex gap-2"
                    onclick="document.getElementById('file_bukti_pembayaran').click();">
                    <i class="nav-icon bi bi-upload"></i><span>Upload</span>
                </button>
                <input type="file" accept=".jpeg, .jpg, .png" id="file_bukti_pembayaran" name="file_bukti_pembayaran"
                    style="display: none;" onchange="document.getElementById('bukti_form').submit();" />
            </div>
        @else
            <div class="col-lg-9 col-md-8 d-flex align-items-center gap-2">
                <a class="btn btn-warning d-flex gap-2"
                    href="{{ route('bukti.lihat', $data['team']->file_bukti_pembayaran) }}">
                    <i class="nav-icon bi bi-eye"></i>
                </a>
                @if ($data['team']->is_verified != 2)
                    <button class="btn btn-danger d-flex gap-2">
                        <i class="nav-icon bi bi-trash"></i><span>Hapus</span>
                    </button>
                @endif
            </div>
        @endif
    </div>
</form>


<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Status Verifikasi</b></p>
    @switch($data['team']->is_verified)
        @case(0)
            <span class="col-lg-9 col-md-8" style="text-align: justify">
                <span class="text-danger">Not Verified</span><br>
                {{ $data['team']->keterangan }}
            </span>
        @break

        @case(1)
            <span class="col-lg-9 col-md-8 text-success">Verified</span>
        @break

        @default
    @endswitch
</div>


@push('js')
    <script>
        function copyText() {
            const notyf = new Notyf();
            let copyText = document.getElementById("team_id").textContent;

            // Menggunakan Clipboard API untuk menyalin teks
            navigator.clipboard.writeText(copyText).then(function() {
                notyf.success('Berhasil menyalin teks!');
            }).catch(function(error) {
                notyf.error(error)
            });
        }
    </script>
@endpush
