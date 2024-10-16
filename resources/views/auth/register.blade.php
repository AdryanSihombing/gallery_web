@extends('layouts.main')
@section('title', 'Gallery | Daftar Akun')

@section('content')
    <div
        class="flex flex-col items-center justify-center w-screen min-h-screen bg-gradient-to-r from-pink-500 to-purple-600">
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
            <h1 class="text-5xl text-transparent w-font-bold bg-clip-text bg-gradient-to-br from-white to-yellow-300">
                My Gallery
            </h1>
        </div>
        <div class="w-full max-w-md">
            <div class="p-8 bg-white border border-gray-300 rounded-lg shadow-lg">
                <h2 class="text-3xl font-semibold text-center text-gray-800">Daftar Akun</h2>
                <hr class="mt-4 border-gray-300">
                <form action="/register" method="POST">
                    @csrf
                    <div class="flex flex-col text-gray-800">
                        <div class="flex flex-col gap-4 mt-3 lg:flex-row">
                            <div class="flex-1">
                                <label for="fullname"
                                    class="block text-gray-800 font-semibold text-lg px-2 py-1 @error('fullname') text-red-500 @enderror">Nama
                                    Lengkap</label>
                                <input type="text" placeholder="Masukkan nama lengkap" id="fullname" name="fullname"
                                    value="{{ old('fullname') }}"
                                    class="w-auto pl-3 py-1.5 rounded-xl border border-gray-300 bg-gray-100 text-md text-gray-800 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                                    autofocus>
                                @error('fullname')
                                    <p class="flex items-center gap-2 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-4 fill-red-500">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label for="username"
                                    class="block text-gray-800 font-semibold text-lg px-2 py-1 @error('username') text-red-500 @enderror">Username</label>
                                <input type="text" placeholder="Masukkan username" id="username" name="username"
                                    value="{{ old('username') }}"
                                    class="w-full pl-3 py-1.5 rounded-xl border border-gray-300 bg-gray-100 text-md text-gray-800 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                                @error('username')
                                    <p class="flex items-center gap-2 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="size-4 fill-red-500">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="email"
                                class="block text-gray-800 font-semibold text-lg px-2 py-1 @error('email') text-red-500 @enderror">Email</label>
                            <input type="text" placeholder="Masukkan email" id="email" name="email"
                                value="{{ old('email') }}"
                                class="w-full pl-3 py-1.5 rounded-xl border border-gray-300 bg-gray-100 text-md text-gray-800 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            @error('email')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="password"
                                class="block text-gray-800 font-semibold text-lg px-2 py-1 @error('password') text-red-500 @enderror">Kata
                                Sandi</label>
                            <input type="password" placeholder="Masukkan kata sandi" id="password" name="password"
                                class="w-full pl-3 py-1.5 rounded-xl border border-gray-300 bg-gray-100 text-md text-gray-800 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            @error('password')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="password_confirmation"
                                class="block text-gray-800 font-semibold text-lg px-2 py-1 @error('password_confirmation') text-red-500 @enderror">Konfirmasi
                                Kata Sandi</label>
                            <input type="password" placeholder="Konfirmasi kata sandi" id="password_confirmation"
                                name="password_confirmation"
                                class="w-full pl-3 py-1.5 rounded-xl border border-gray-300 bg-gray-100 text-md text-gray-800 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            @error('password_confirmation')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button
                            class="w-full px-4 py-2 mt-6 text-white transition duration-300 rounded-lg shadow-lg bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l hover:from-pink-500 hover:to-purple-500">
                            Daftar
                        </button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <p class="text-gray-700">Sudah punya akun? <a href="/login"
                            class="text-purple-600 hover:underline">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
