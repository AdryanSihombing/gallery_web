@extends('layouts.main')

@section('title', 'Gallery | Jelajahi Album')

@section('content')

    @include('partials.header')
    <div class="w-[95%] max-w-screen-lg mx-auto grid grid-cols-4 gap-2 mt-6">
        @foreach ($albums as $album)
            <a href="/albums/{{ $album->id }}">
                <div class="relative w-full aspect-square hover:cursor-pointer">
                    @if ($album->first_photo())
                        <img src="/storage/{{ $album->first_photo()->image }}" alt="{{ $album->title }}"
                            class="absolute object-cover w-full h-full border border-blue-50 -top-2 -left-2">
                    @else
                        <img src="/not_found.webp" alt="Default Image"
                            class="absolute object-cover w-full h-full border border-blue-50 -top-2 -left-2">
                    @endif
                </div>
                <div>
                    <h4 class="text-lg font-semibold">{{ $album->name }}</h4>
                </div>
            </a>
        @endforeach
    </div>

@endsection
