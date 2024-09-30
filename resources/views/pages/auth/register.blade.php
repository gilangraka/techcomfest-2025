@extends('layouts.auth') @section('title', 'Techomfest 2025 Register Form')

<div class="mt-8 px-12">
    <x-partials.button-link href="/" class="w-[150px] flex items-center gap-2 bg-slate-100">
        <x-partials.back-svg />
        Kembali
    </x-partials.button-link>
</div>
<div class="px-4 md:px-12 mx-auto">
    <div class="grid md:grid-cols-2 gap-8">
        <div class="grid h-full items-center">
            <img src="{{ asset('img/tcfest 2025.png') }}" alt="Logo Techomfest 2025" class="w-full" />
        </div>
        <div class="items-center my-auto p-8 rounded-md w-full">
            <div class="text-gray-800">
                <h1 class="font-bold text-3xl">Daftar</h1>
                <p>Daftar menggunakan data Anda yang valid.</p>
            </div>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="my-4">
                    <x-partials.form-input label="Nama" name="name" placeholder="Masukkan nama lengkap" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Email" name="email" placeholder="Masukkan email" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Password" name="password" placeholder="Masukkan password"
                        type="password" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Confirm Password" name="password_confirmation"
                        placeholder="Masukkan konfirmasi password" type="password" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Nomor HP" name="nomor_hp" placeholder="Masukkan nomor hp"
                        type="text" />
                </div>
                <div class="my-4">
                    <x-partials.form-date label="Tanggal Lahir" name="tgl_lahir" />
                </div>
                <div class="my-4">
                    <x-partials.form-select name="gender_id" labelName="Jenis Kelamin">
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        @foreach ($referensi['ref_gender'] as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_gender }}</option>
                        @endforeach
                    </x-partials.form-select>
                </div>
                <div class="my-4">
                    <x-partials.form-select name="kategori_id" labelName="Kategori Lomba">
                        <option selected disabled>Pilih Kategori Lomba</option>
                        @foreach ($referensi['ref_kategori'] as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </x-partials.form-select>
                </div>
                <button
                    class="w-full mt-4 mb-12 p-2 px-6 bg-gradient-to-r from-[#263B81] to-[#DB0056] text-white rounded-md">
                    Daftar
                </button>
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-800 underline">
                        <a href="/login">Sudah punya akun?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
