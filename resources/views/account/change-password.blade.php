@extends('layouts.main')
@section('title', 'Gallery | Ganti Password')

@section('content')
    <div class="w-screen min-h-screen bg-basic flex flex-col items-center lg:flex-row lg:justify-center">
        <div class="mt-14 flex flex-col items-center lg:mt-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-20 lg:size-24">
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#34D399;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ffffff;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path
                    d="M0 32c477.6 0 366.6 317.3 367.1 366.3L448 480h-26l-70.4-71.2c-39 4.2-124.4 34.5-214.4-37C47 300.3 52 214.7 0 32zm79.7 46c-49.7-23.5-5.2 9.2-5.2 9.2 45.2 31.2 66 73.7 90.2 119.9 31.5 60.2 79 139.7 144.2 167.7 65 28 34.2 12.5 6-8.5-28.2-21.2-68.2-87-91-130.2-31.7-60-61-118.6-144.2-158.1z"
                    fill="url(#gradient)" />
            </svg>
            <h1
                class="font-bold text-center text-4xl bg-gradient-to-br from-green-800 to-white bg-clip-text text-transparent">
                My Gallery</h1>
        </div>
        <div class="w-[90%] sm:max-w-screen-sm lg:ml-12 lg:w-[50%]">
            <div class="mt-8 mx-auto p-4 rounded-xl border border-black bg-secondary shadow-xl">
                <h2 class="text-3xl font-semibold text-center text-primary">Ganti Password</h2>
                <hr class="mt-5 border-primary">
                <form action="/change-password" method="POST">
                    @csrf
                    <div class="flex flex-col text-basic">
                        <div class="mt-4">
                            <label for="old_password"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('old_password') text-red-500 @enderror">Sandi lama</label>
                            <input type="password" placeholder="Masukkan sandi lama" id="old_password" name="old_password"
                                value="{{ old('old_password') }}"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                            {{-- Validation Error --}}
                            @error('old_password')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            {{-- Password wrong --}}
                            @error('password_wrong')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="new_password"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('new_password') text-red-500 @enderror">Sandi baru</label>
                            <input type="password" placeholder="Masukkan sandi baru" id="new_password" name="new_password"
                                value="{{ old('new_password') }}"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                            {{-- Validation Error --}}
                            @error('new_password')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="new_password_confirmation"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('new_password_confirmation') text-red-500 @enderror">Konfirmasi sandi baru</label>
                            <input type="password" placeholder="Konfirmasi sandi baru" id="new_password_confirmation" name="new_password_confirmation"
                                value="{{ old('new_password_confirmation') }}"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                            {{-- Validation Error --}}
                            @error('new_password_confirmation')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div
                            class="mt-4 flex gap-4 justify-around text-xl *:w-1/2 *:font-semibold *:text-center *:rounded-xl *:py-2">
                            <a href="/"
                                class="border border-primary dark:text-primary hover:border-none hover:bg-tertiary transition">Batal</a>
                            <button type="submit"
                                class="text-primary bg-tertiary hover:bg-primary hover:text-secondary transition">Ganti password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
