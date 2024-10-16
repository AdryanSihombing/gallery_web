<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>

    <style>
        body {
            background-color: #fafafa;
            /* Latar belakang terang seperti Instagram */
            color: #333;
            /* Teks gelap untuk kontras yang baik */
        }

        /* Mengubah warna scrollbar untuk kesan yang lebih modern */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            ` background: #f1f1f1;
            /* Latar belakang scrollbar */
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            /* Warna thumb */
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #aaa;
            /* Warna thumb saat hover */
        }

        #main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            max-width: 100vw;
        }
    </style>
</head>

<body>
    <div id="overlay" class="fixed top-0 left-0 hidden w-screen h-screen bg-black opacity-50"></div>
    <div id="main" class="flex flex-col min-h-screen overflow-x-hidden">
        @yield('content')
    </div>
</body>

</html>
