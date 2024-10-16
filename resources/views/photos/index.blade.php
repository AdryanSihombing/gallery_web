@extends('layouts.main')

@section('title', 'Gallery | Jelajahi Gambar')

@section('content')

    @include('partials.header')
    <div class="w-[95%] max-w-screen-lg mx-auto">
        <div class="w-full h-full bg-gray-400"></div>
        @livewire('photos', ['search' => $search])
    </div>

@endsection
