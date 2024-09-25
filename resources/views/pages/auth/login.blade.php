@extends('layouts.auth') @section('title', 'Techomfest 2025 Login Form')

<div class="mt-8 px-12">
    <x-partials.button-link href="/" class="w-[150px] flex items-center gap-2 bg-slate-100">
        <x-partials.back-svg />
        Kembali
    </x-partials.button-link>
</div>
<div class="px-4 md:px-12 mx-auto">
    <div class="grid md:grid-cols-2 md:gap-8">
        <div class="">
            <img src="{{ asset('img/tcfest 2025.png') }}" alt="Logo Techomfest 2025" class="w-full" />
        </div>
        <div class="items-center my-auto p-8 rounded-md w-full">
            <h1 class="font-bold text-3xl">Masuk</h1>
            <p>Masuk menggunakan data Anda yang valid.</p>
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="my-4">
                    <x-partials.form-input label="Email" name="email" placeholder="Masukkan Email" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Password" name="password" placeholder="Masukkan password"
                        type="password" />
                </div>

                <x-partials.button-primary>
                    Login
                </x-partials.button-primary>

                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-800 underline">
                        <a href="/register">Belum punya akun?</a>
                    </div>
                    <div class="text-sm text-gray-800 underline">
                        <a href="/forgot-password">Lupa password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
