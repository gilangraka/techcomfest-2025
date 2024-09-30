<form id="profile_form"
    action="{{ $data->ref_peserta->foto_profil == null ? route('profile.update') : route('profile.delete') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="foto_profil" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
        <div class="col-md-8 col-lg-9">
            @if ($data->ref_peserta->foto_profil == null)
                <button type="button" class="btn btn-primary d-flex gap-2"
                    onclick="document.getElementById('foto_profil').click();"><i
                        class="nav-icon bi bi-upload"></i><span>Upload
                        Foto</span></button>
                <input type="file" accept=".jpeg, .jpg, .png" id="foto_profil" name="foto_profil"
                    style="display: none;" onchange="document.getElementById('profile_form').submit();" />
            @else
                <button class="btn btn-danger d-flex gap-2"><i class="nav-icon bi bi-trash"></i><span>Hapus
                        Foto</span></button>
            @endif
        </div>
    </div>
</form>

<form action="{{ route('dashboard.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" value="{{ $data->email }}" disabled>
        </div>
    </div>

    <div class="row mb-3">
        <label for="kategori_id" class="col-md-4 col-lg-3 col-form-label">Kategori Lomba</label>
        <div class="col-md-8 col-lg-9">
            <input name="kategori_id" type="text" class="form-control"
                value="{{ $data->ref_peserta->ref_kategori->nama_kategori }}" disabled>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap <span
                class="text-danger fw-bold">*</span></label>
        <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" value="{{ $data->name }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="tgl_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir <span
                class="text-danger fw-bold">*</span></label>
        <div class="col-md-8 col-lg-9">
            <input name="tgl_lahir" type="date" class="form-control" value="{{ $data->ref_peserta->tgl_lahir }}"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="nomor_hp" class="col-md-4 col-lg-3 col-form-label">Nomor WA <span
                class="text-danger fw-bold">*</span></label>
        <div class="col-md-8 col-lg-9">
            <input name="nomor_hp" type="text" class="form-control" value="{{ $data->ref_peserta->nomor_hp }}"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="nomor_hp" class="col-md-4 col-lg-3 col-form-label">Gender <span
                class="text-danger fw-bold">*</span></label>
        <div class="col-md-8 col-lg-9">
            <select class="form-select" name="gender_id" aria-label="Gender" required>
                @foreach ($referensi['ref_gender'] as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $data->ref_peserta->gender_id) selected @endif>
                        {{ $item->nama_gender }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12"><button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </div>
</form>
