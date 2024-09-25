<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Email</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->email }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Kategori Lomba</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->ref_kategori->nama_kategori }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>NIK</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->nik }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Nama Lengkap</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->name }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Tanggal Lahir</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->tgl_lahir }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Nomor WA</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->nomor_hp }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Gender</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->ref_gender->nama_gender }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Asal Sekolah</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->asal_sekolah }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Nama Pembina</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->nama_pembina }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Login Sebagai</b></p>
    <p class="col-lg-9 col-md-8">
        @foreach ($role as $index => $item)
            {{ $item }}@if (!$loop->last)
                ,
            @endif
        @endforeach
    </p>
</div>
