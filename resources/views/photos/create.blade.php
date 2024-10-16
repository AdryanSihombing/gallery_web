@extends('layouts.main')

@section('title', 'Gallery | Upload Gambar')

@section('content')
    @include('partials.header')
    <div
        class="flex flex-col items-center justify-center w-screen min-h-screen bg-gradient-to-r from-pink-500 to-purple-600">
        <div class="w-full max-w-md">
            <div class="p-8 bg-white border border-gray-300 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-center text-gray-800">Unggah Gambar</h1>
                <hr class="my-4 border-gray-300">
                <form action="/photos" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full max-w-[500px] mx-auto">
                        <label for="image"
                            class="block overflow-hidden border-2 border-dashed rounded-xl bg-tertiary border-primary hover:cursor-pointer">
                            <div id="null-label" class="flex flex-col items-center justify-center gap-2 py-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-24 fill-primary">
                                    <path
                                        d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM216 232V334.1l31-31c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-72 72c-9.4 9.4-24.6 9.4-33.9 0l-72-72c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l31 31V232c0-13.3 10.7-24 24-24s24 10.7 24 24z" />
                                </svg>
                                <p class="text-lg font-semibold text-center text-primary">Pilih Gambar</p>
                                <p class="text-primary">Unggah gambar yang Anda inginkan</p>
                            </div>
                            <div id="preview-label" class="hidden w-full">
                                <img id="image-preview" class="w-full h-full" alt="image preview">
                            </div>
                        </label>
                        <input type="file" name="image" id="image" hidden>
                        @error('image')
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
                        <div>
                            <label for="title"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('title') text-red-500 @enderror">Judul</label>
                            <input type="text" placeholder="Masukkan Judul" id="title" name="title"
                                value="{{ old('title') }}"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary @error('title') border-red-500 @enderror">
                            @error('title')
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
                            <label for="description"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('description') text-red-500 @enderror">Deskripsi</label>
                            <textarea type="text" placeholder="Masukkan Deskripsi" id="description" name="description"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="flex items-center gap-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-around gap-4 mt-4 text-xl">
                        <a href="/" class="px-4 py-2 text-white bg-gray-400 rounded-lg hover:bg-gray-500">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 text-white transition-colors bg-pink-500 rounded-lg hover:bg-pink-600">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/imgPreview.js"></script>
@endsection
