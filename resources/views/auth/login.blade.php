@extends('layouts.main')
@section('title', 'Gallery | Masuk ke Akun')

@section('content')
    <div class="flex flex-col items-center justify-center w-screen min-h-screen bg-gradient-to-r from-pink-500 to-purple-600">
        <div class="flex flex-col items-center mb-10">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-24 h-24">
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FBCFE8;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#F472B6;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path
                    d="M0 32c477.6 0 366.6 317.3 367.1 366.3L448 480h-26l-70.4-71.2c-39 4.2-124.4 34.5-214.4-37C47 300.3 52 214.7 0 32zm79.7 46c-49.7-23.5-5.2 9.2-5.2 9.2 45.2 31.2 66 73.7 90.2 119.9 31.5 60.2 79 139.7 144.2 167.7 65 28 34.2 12.5 6-8.5-28.2-21.2-68.2-87-91-130.2-31.7-60-61-118.6-144.2-158.1z"
                    fill="url(#gradient)" />
            </svg> --}}
            <h1 class="w-auto text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-white to-yellow-300">
                My Gallery
            </h1>
        </div>
        <div class="w-full max-w-md">
            <div class="p-8 bg-white border border-gray-300 rounded-lg shadow-lg">
                <h2 class="text-3xl font-semibold text-center text-gray-800">Masuk Akun</h2>
                <hr class="mt-4 border-gray-300">
                <form action="/login" method="POST">
                    @csrf
                    <div class="flex flex-col mt-6">
                        <label for="username" class="font-medium text-gray-700">Username</label>
                        <input type="text" placeholder="Masukkan username" id="username" name="username"
                            value="{{ old('username', $username) }}"
                            class="p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                        @error('username')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="password" class="font-medium text-gray-700">Sandi</label>
                        <input type="password" placeholder="Masukkan sandi" id="password" name="password"
                            value="{{ old('password', $password) }}"
                            class="p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center mt-4">
                        <input type="checkbox" name="remember" id="remember" {{ $remember ? 'checked' : '' }}
                            class="border-2 rounded text-primary focus:ring-pink-500">
                        <label for="remember" class="ml-2 text-gray-700">Ingat akun saya</label>
                    </div>
                    {{-- <a href="/forgot-password" class="text-sm text-pink-500 hover:underline">Lupa sandi?</a> --}}
                    <div class="flex justify-between mt-6">
                        <a href="/" class="px-4 py-2 text-white bg-gray-400 rounded-lg hover:bg-gray-500">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 text-white transition-colors bg-pink-500 rounded-lg hover:bg-pink-600">Masuk</button>
                    </div>
                </form>
                <p class="mt-4 text-center text-gray-600">
                    Belum memiliki akun? <a href="/register" class="text-pink-500 hover:underline">Daftar</a>
                </p>
            </div>
        </div>
    </div>
@endsection
