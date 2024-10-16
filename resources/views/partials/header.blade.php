<header class="relative mb-12 max-w-screen-2xl md:mb-0">
    <div class="flex justify-between items-center w-[95%] mx-auto py-4 border-b border-gray-300 md:py-2">
        <a href="/" class="flex items-center gap-4 hover:cursor-pointer">
            <h1
                class="text-3xl font-bold text-transparent transition duration-300 ease-in-out bg-gradient-to-r from-purple-500 via-pink-500 to-yellow-500 bg-clip-text lg:block hover:bg-gradient-to-r hover:from-yellow-500 hover:via-pink-500 hover:to-purple-500">
                Galleri Foto
            </h1>
        </a>
        <div class="flex items-center gap-6">
            <form action="/{{ request()->is('photos*') ? 'photos' : (request()->is('albums*') ? 'albums' : 'photos') }}"
                method="GET" class="flex items-center gap-2">
                <label for="search" class="hidden text-gray-800 md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-6 h-6 text-gray-500 transition duration-300 ease-in-out hover:text-gray-700">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </label>
                <input id="search" type="text" name="search" placeholder="Cari Gambar"
                    value="@isset($search) {{ $search }} @endisset"
                    class="px-4 py-1.5 rounded-xl border border-gray-300 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition duration-300 ease-in-out">
                <button type="submit" class="hidden"></button>
            </form>

            <nav
                class="absolute left-0 w-screen text-gray-800 shadow-md -bottom-10 md:static md:w-full md:ml-10 md:shadow-none">
                <ul class="flex items-center justify-around h-8 md:gap-6">
                    <li
                        class="text-lg font-semibold pb-1 md:pb-0 {{ request()->is('photos*') ? 'active-nav' : '' }} hover:text-purple-500 transition duration-300 ease-in-out">
                        <a href="/photos">Photos</a>
                    </li>
                    <li
                        class="text-lg font-semibold pb-1 md:pb-0 {{ request()->is('albums*') ? 'active-nav' : '' }} hover:text-purple-500 transition duration-300 ease-in-out">
                        <a href="/albums">Albums</a>
                    </li>
                </ul>
            </nav>
        </div>

        @auth
            <div class="relative">
                <h2 id="username"
                    class="text-xl font-semibold text-gray-800 transition duration-300 ease-in-out hover:cursor-pointer hover:text-pink-500">
                    {{ auth()->user()->username }}
                </h2>
                <div id="user_id"
                    class="absolute right-0 z-40 flex-col items-end hidden gap-1 p-2 text-gray-800 bg-white rounded-md shadow-lg top-8 text-md">
                    <a href="/u/{{ auth()->user()->username }}"
                        class="w-full text-gray-800 text-nowrap text-end px-4 py-0.5 rounded-md hover:bg-blue-400 transition">
                        My Profile</a>
                    <!-- Form logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full text-nowrap text-end text-red-500 px-4 py-0.5 rounded-md hover:bg-red-500 hover:text-white transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <ul class="flex gap-2 text-lg font-semibold">
                <li
                    class="px-4 py-1 text-white transition duration-300 ease-in-out rounded-full bg-gradient-to-r from-blue-500 to-green-400 hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500">
                    <a href="/register">Daftar</a>
                </li>
                <li
                    class="px-4 py-1 text-white transition duration-300 ease-in-out rounded-full bg-gradient-to-r from-pink-500 to-orange-400 hover:bg-gradient-to-r hover:from-orange-400 hover:to-pink-500">
                    <a href="/login">Masuk</a>
                </li>
            </ul>
        @endauth
    </div>
</header>


<script>
    const username = document.getElementById('username');
    const userInfo = document.getElementById('user_id');

    // Toggle visibility on click
    username.addEventListener('click', () => {
        userInfo.classList.toggle('hidden');
    });

    // Optional: Close the menu if clicked outside of it
    document.addEventListener('click', (e) => {
        if (!username.contains(e.target) && !userInfo.contains(e.target)) {
            userInfo.classList.add('hidden');
        }
    });
</script>
