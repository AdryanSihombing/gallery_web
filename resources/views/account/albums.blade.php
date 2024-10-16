@extends('account.layout')

@section('title', 'Albums | @' . $user->username)

@section('data')
    <div class="flex flex-col items-center justify-center w-full min-h-screen bg-gradient-to-r from-pink-500 to-purple-600">
        <h1 class="mb-6 text-4xl font-bold text-white">Albums</h1>
        <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-3 md:w-3/4">
            @if ($albums->count())
                @foreach ($albums as $album)
                    <div class="transition-transform transform bg-white rounded-lg shadow-lg aspect-square hover:scale-105">
                        <a href="/albums/{{ $album->id }}" class="block w-full h-full">
                            <img src="/storage/{{ $album->first_photo()->image }}" alt="{{ $album->title }}"
                                class="object-cover w-full h-full rounded-lg">
                            <div class="p-4">
                                <h2 class="text-lg font-semibold text-center text-gray-800">{{ $album->title }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-span-3 text-center text-gray-700">
                    <p>Tidak ada album yang ditemukan.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
    