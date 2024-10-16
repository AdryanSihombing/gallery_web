@extends('layouts.main')

@section('title', 'Gallery | Edit Album')

@section('content')
    @include('partials.header')

    <div class="flex-grow w-screen min-h-screen pt-2 bg-white">
        <div class="w-[95%] max-w-screen-xl mx-auto flex gap-4">
            <div class="w-full px-8 py-4 rounded-md bg-secondary md:w-1/4">
                <h1 class="text-2xl font-bold text-center text-primary">Edit Album</h1>
                <hr class="my-4 border-primary">
                <form action="/albums/{{ $album->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mt-4">
                        <label for="name"
                            class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('name') text-red-500 @enderror">Judul</label>
                        <input type="text" placeholder="Masukkan Judul" id="name" name="name"
                            value="{{ old('name', $album->name) }}"
                            class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">
                        @error('name')
                            <p class="flex items-center gap-2 text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="mt-4">
                            <label for="description"
                                class="block text-primary font-semibold text-lg px-2 py-1 w-fit @error('description') text-red-500 @enderror">Deskripsi</label>
                            <textarea type="text" placeholder="Masukkan Deskripsi" id="description" name="description"
                                class="w-full pl-3 py-1.5 rounded-xl bg-tertiary text-md text-primary">{{ old('description', $album->description) }}</textarea>
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
                        <div
                            class="mt-4 flex gap-4 justify-around text-xl *:w-1/2 *:font-semibold *:text-center *:rounded-xl *:border-2 *:py-1">
                            <a href="/"
                                class="transition border border-primary dark:text-primary hover:border-none hover:bg-tertiary">Cancel</a>
                            <button type="submit"
                                class="transition text-primary bg-tertiary hover:bg-primary hover:text-secondary">Update</button>
                        </div>
                    </div>
                    <input type="hidden" name="selected_photos" id="selected_photos"
                        value="{{ old('selected_photos', $selected_photo_ids) }}">
                    @error('selected_photos')
                        <p class="flex items-center gap-2 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-red-500">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </form>
            </div>
            <div class="w-full md:w-3/4">
                <div class="grid grid-cols-3 gap-1">
                    @foreach ($selected_photos as $selected_photo)
                        <div class="photo-item selected aspect-square hover:cursor-pointer"
                            data-id="{{ $selected_photo->id }}">
                            <img src="/storage/{{ $selected_photo->image }}" alt="Image"
                                class="object-cover w-full h-full">
                        </div>
                    @endforeach
                </div>
                <hr class="w-full my-3 border border-black">
                <div class="grid grid-cols-3 gap-1">
                    @foreach ($unselected_photos as $unselected_photo)
                        <div class="photo-item aspect-square hover:cursor-pointer" data-id="{{ $unselected_photo->id }}">
                            <img src="/storage/{{ $unselected_photo->image }}" alt="Image"
                                class="object-cover w-full h-full">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="/js/makeAlbum.js"></script>

@endsection
