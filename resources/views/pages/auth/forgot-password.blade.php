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
            <h1 class="font-bold text-3xl">Lupa Password</h1>
            <p>Masukkan data dibawah ini untuk mereset password</p>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="my-4">
                    <x-partials.form-input label="Email" name="email" placeholder="Masukkan Email" />
                </div>

                <x-partials.button-primary>
                    Reset Password
                </x-partials.button-primary>
            </form>
        </div>
    </div>
</div>
