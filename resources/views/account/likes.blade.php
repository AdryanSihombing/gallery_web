@extends('account.layout')

@section('title', 'Likes | @' . $user->username)

@section('data')
    <div class="grid grid-cols-3 gap-2 w-full md:w-3/4">
        @if ($photos->count())
            @foreach ($photos as $photo)
                <div class="w-full aspect-square bg-basic hover:cursor-pointer">
                    <a href="/photos/{{ $photo->id }}" class="w-full h-full">
                        <img src="/storage/{{ $photo->image }}" alt="{{ $photo->title }}" class="w-full h-full object-cover">
                    </a>
                </div>
            @endforeach
        @else
        @endif
    </div>
@endsection
