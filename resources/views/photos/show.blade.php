@extends('layouts.main')

@section('title', 'Gallery | ' . $photo->title)

@section('content')
    @include('partials.header')

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: white;
                color: #faf5f5;
            }

            .text-primary {
                color: #0d0c0e;
            }

            .text-secondary {
                color: #2b66a1;
            }

            .bg-basic {
                background-color: white;
            }

            .bg-secondary {
                background-color: #fffdfdef;
            }

            .bg-tertiary {
                background-color: #E0E0E0;
            }

            .hover\:underline:hover {
                text-decoration: underline;
                color: #BB86FC;
            }

            .fill-black {
                fill: black;
            }

            /* CSS untuk menu edit dan hapus */
            .menu {
                display: none;
                position: absolute;
                right: 0;
                background-color: white;
                border-radius: 0.5rem;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                z-index: 10;
            }

            .menu a,
            .menu form {
                padding: 0.5rem 1rem;
                display: block;
                text-align: right;
                color: black;
            }

            .menu a:hover,
            .menu form button:hover {
                background-color: #f5f5f5;
            }

            /* Hover efek untuk gambar */
            .post-container {
                position: relative;
                overflow: hidden;
                width: 100%;
                height: 100%;
            }

            .post-image {
                transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .post-info {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                text-align: center;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
                z-index: 2;
            }

            .post-container:hover .post-image {
                transform: scale(1.1);
                filter: blur(5px);
            }

            .post-container:hover .post-info {
                opacity: 1;
            }

            /* Button styles */
            .button {
                padding: 0.5rem 1rem;
                background-color: #2b66a1;
                color: white;
                border: none;
                border-radius: 0.25rem;
                cursor: pointer;
            }

            .button:hover {
                background-color: #1a4e7b;
            }
        </style>
    </head>

    <div class="flex flex-col justify-center flex-grow bg-basic">
        <div
            class="w-[95%] h-[80vh] max-w-screen-md mx-auto rounded-md overflow-hidden flex flex-col bg-secondary sm:flex-row sm:shadow-xl">
            <div class="flex items-center justify-between sm:hidden">
                <a href="/u/{{ $photo->user->username }}"
                    class="mb-2 text-2xl font-semibold text-primary hover:underline">{{ $photo->user->username }}</a>

                @if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->id == $photo->user_id))
                    <div class="relative">
                        <div id="toggleMenuMobile" class="p-1 rounded-full hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" class="size-5">
                                <path fill="black"
                                    d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                            </svg>
                        </div>
                        <div id="menuMobile" class="menu ">
                            <a href="/photos/{{ $photo->id }}/edit"> Edit</a>
                            @if (auth()->user()->role === 'admin')
                                <form action="/photos/{{ $photo->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="w-full sm:w-3/5 md:w-1/2 bg-tertiary">
                <div class="post-container">
                    <img src="/storage/{{ $photo->image }}" alt="{{ $photo->title }}" class="post-image">
                    <div class="post-info">
                        <h1 class="text-2xl font-bold">{{ $photo->title }}</h1>
                        <p>{{ $photo->description }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-full py-2 sm:w-2/5 md:w-1/2">
                <div class="hidden px-4 sm:block">
                    <div class="flex items-center justify-between">
                        <a href="/u/{{ $photo->user->username }}"
                            class="mb-2 text-xl font-semibold text-primary hover:underline">{{ $photo->user->username }}</a>

                        @if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->id == $photo->user_id))
                            <div class="relative">
                                <div id="toggleMenuDesktop" class="p-1 rounded-full hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" class="size-5 fill-black">
                                        <path
                                            d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                                    </svg>
                                </div>
                                <div id="menuDesktop" class="menu">
                                    <a href="/photos/{{ $photo->id }}/edit">Edit</a>
                                    @if (auth()->user()->role === 'admin')
                                        <form action="/photos/{{ $photo->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="mt-1">
                <div class="flex flex-col flex-grow sm:px-4">
                    <h1 class="mt-2 text-xl font-semibold text-primary">{{ $photo->title }}</h1>
                    <div class="flex flex-col overflow-y-auto h-[60%] border-t border-b mt-2">
                        <p class="pt-1 mb-2 text-primary">
                            <a href="/u/{{ $photo->user->username }}"
                                class="font-semibold">{{ $photo->user->username }}</a>
                            {{ $photo->description }}
                        </p>
                        @livewire('comments', ['photo' => $photo])
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        @livewire('toggle-like', ['photo' => $photo])
                        <p class="text-secondary">{{ $photo->created_at->diffForHumans() }}</p>
                    </div>
                    @livewire('comment-form', ['photo' => $photo])

                    <!-- Tombol untuk Print dan Download -->
                    <div class="flex justify-between mt-4">
                        <button class="button" onclick="printPhoto()">Print</button>
                        <button class="button"
                            onclick="window.location='{{ route('photos.download', $photo->id) }}'">Download</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Toggle menu pada mobile
            document.getElementById('toggleMenuMobile').addEventListener('click', function() {
                var menu = document.getElementById('menuMobile');
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });

            // Toggle menu pada desktop
            document.getElementById('toggleMenuDesktop').addEventListener('click', function() {
                var menu = document.getElementById('menuDesktop');
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });

            // Fungsi untuk print foto

            function printPhoto() {
                window.print();
            }

            // Fungsi like photo
            function likePhoto() {
                // Kirim request ke server untuk like photo
                axios.post('/photos/' + {{ $photo->id }} + '/like')
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            // Fungsi unlike photo
            function unlikePhoto() {
                // Kirim request ke server untuk unlike photo
                axios.post('/photos/' + {{ $photo->id }} + '/unlike')
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        </script>
    @endsection
