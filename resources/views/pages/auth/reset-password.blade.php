@extends('layouts.auth') @section('title', 'Techomfest 2025 Login Form')

<div class="px-4 md:px-12 mx-auto">
    <div class="grid md:grid-cols-2 md:gap-8">
        <div class="">
            <img src="{{ asset('img/tcfest 2025.png') }}" alt="Logo Techomfest 2025" class="w-full" />
        </div>
        <div class="items-center my-auto p-8 rounded-md w-full">
            <h1 class="font-bold text-3xl">Reset Password</h1>

            <form action="{{ route('password.store') }}" method="post">
                @csrf
                <input type="text" name="token" value="{{ $token }}" hidden>
                <div class="my-4">
                    <x-partials.form-input label="Email" name="email" placeholder="Masukkan Email" type="email"
                        value="{{ $email }}" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Password" name="password" placeholder="Masukkan password"
                        type="password" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Password" name="password_confirmation"
                        placeholder="Masukkan konfirmasi password" type="password" />
                </div>

                <x-partials.button-primary>
                    Ubah Password
                </x-partials.button-primary>
            </form>
        </div>
    </div>
</div>
