@extends('account.layout')

@section('title', 'Gallery | @' . $user->username)

@section('data')
    @if (session()->has('password_changed'))
        <div class="fixed bottom-4 left-4 bg-green-600">
            <p class="text-primary">Password berhasil diubah</p>
        </div>
    @endif

    <div class="grid grid-cols-3 gap-1 w-full md:w-3/4">
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
