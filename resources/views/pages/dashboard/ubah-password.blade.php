<form action="{{ route('password.change') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
        <div class="col-md-8 col-lg-9">
            <input name="current_password" type="password" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
        <div class="col-md-8 col-lg-9">
            <input name="new_password" type="password" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="new_password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
        <div class="col-md-8 col-lg-9">
            <input name="new_password_confirmation" type="password" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12"><button type="submit" class="btn btn-primary w-100">Ubah Password</button>
        </div>
    </div>
</form>
