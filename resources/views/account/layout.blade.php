@extends('layouts.main')

@section('content')
    @include('partials.header')

    <div class="flex-grow pt-2">
        <div class="w-[95%] max-w-screen-xl h-[100%] mx-auto flex flex-col gap-4 md:flex-row relative">
            <div class="bg-[#e879f9] sticky top-0 w-full h-[85vh] max-h-[85vh] flex flex-col py-4 px-8 rounded-md md:w-1/4">
                <h1 class="self-end text-xl font-semibold text-center w-fit text-primary md:text-end">
                    {{ $user->fullname }}
                    <span class="inline-block w-full text-lg font-normal">
                        <span>(@</span>{{ $user->username }})
                    </span>
                </h1>
                <hr class="my-2">
                <div class="flex justify-around md:flex-col">
                    <a href="/u/{{ $user->username }}"
                        class="group flex justify-center items-center py-1 gap-2 text-primary hover:bg-primary hover:text-secondary active:bg-gray-200 transition @if (request()->is('u/' . $user->username)) bg-tertiary @endif">
                        @if (request()->is('u/' . $user->username))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="transition size-5 fill-primary group-hover:fill-secondary">
                                <path
                                    d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="transition size-5 fill-primary group-hover:fill-secondary">
                                <path
                                    d="M448 80c8.8 0 16 7.2 16 16V415.8l-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3V96c0-8.8 7.2-16 16-16H448zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                            </svg>
                        @endif
                        Photos
                    </a>
                    <a href="/u/{{ $user->username }}/albums"
                        class="group flex justify-center items-center py-1 gap-2 text-primary hover:bg-primary hover:text-secondary active:bg-gray-200 @if (request()->is('u/' . $user->username . '/albums')) bg-tertiary @endif">
                        @if (request()->is('u/' . $user->username . '/albums'))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="transition size-5 fill-primary group-hover:fill-secondary">
                                <path
                                    d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="transition size-5 fill-primary group-hover:fill-secondary">
                                <path
                                    d="M0 96C0 60.7 28.7 32 64 32l132.1 0c19.1 0 37.4 7.6 50.9 21.1L289.9 96 448 96c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-256c0-8.8-7.2-16-16-16l-161.4 0c-10.6 0-20.8-4.2-28.3-11.7L213.1 87c-4.5-4.5-10.6-7-17-7L64 80z" />
                            </svg>
                        @endif
                        Albums
                    </a>
                    <a href="/u/{{ $user->username }}/likes"
                        class="group flex justify-center items-center py-1 gap-2 text-primary hover:bg-primary hover:text-secondary active:bg-gray-200 @if (request()->is('u/' . $user->username . '/likes')) bg-tertiary @endif">
                        @if (request()->is('u/' . $user->username . '/likes'))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="transition size-5 fill-primary group-hover:fill-secondary">
                                <path
                                    d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="transition size-5 fill-primary group-hover:fill-secondary">
                                <path
                                    d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                            </svg>
                        @endif
                        Likes
                    </a>
                </div>
                <hr class="my-2">
                <div class="flex flex-col gap-2 *:block *:font-semibold *:text-center *:rounded-lg *:py-1 *:bg-gray-100">
                    <a href="/photos/create" class="hover:bg-gray-200 active:bg-gray-300">Upload Foto</a>
                    <a href="/albums/create" class="hover:bg-gray-200 active:bg-gray-300">Buat Album</a>
                </div>

                @if ($self)
                    <div class="flex items-end flex-grow">
                        <a href="/change-password" class="w-full text-center text-primary hover:underline">Ganti Password?</a>
                    </div>
                @endif
            </div>
            @yield('data')
        </div>
    </div>
@endsection
