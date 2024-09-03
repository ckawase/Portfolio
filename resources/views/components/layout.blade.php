<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>{{$title ?? "Chihiro Kawase's Portfolio"}}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('styles')
    @stack('js')
</head>
<body class="flex flex-col min-h-screen">
    {{-- 共通ヘッダー --}}
    <header>
        <div class="container mt-16 mx-auto flex items-center justify-between py-4">
            <h1 class="text-3xl font-semibold leading-none">Chihiro Kawase</h1>
            <button id="menu-toggle" class="lg:hidden px-4 py-2 text-blueGray-400 hover:opacity-60">
                <!-- メニューアイコン (ハンバーガーアイコン) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
            <nav id="main-menu" class="lg:flex items-center space-x-12 hidden">
                <ul class="flex space-x-12">
                    <li><a class="text-sm text-blueGray-400 hover:opacity-60" href="{{route('top')}}">Top</a></li>
                    <li><a class="text-sm text-blueGray-400 hover:opacity-60" href="{{route('about')}}">About</a></li>
                    <li><a class="text-sm text-blueGray-400 hover:opacity-60" href="{{route('works')}}">Works</a></li>
                    <li><a class="text-sm text-blueGray-400 hover:opacity-60" href="{{route('contact')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- サイドバー --}}
    <aside id="sidebar" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 transform -translate-x-full lg:hidden transition-transform duration-300 ease-in-out">
        <div class="flex flex-col h-full p-4">
            <button id="sidebar-close" class="text-white mb-4">
                <!-- 閉じるアイコン -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <nav>
                <ul class="space-y-4">
                    <li><a class="text-lg text-white" href="{{route('top')}}">Top</a></li>
                    <li><a class="text-lg text-white" href="{{route('about')}}">About</a></li>
                    <li><a class="text-lg text-white" href="{{route('works')}}">Works</a></li>
                    <li><a class="text-lg text-white" href="{{route('contact')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </aside>

    <main class="container flex-grow mx-auto my-16 px-8">
        <h1 class="text-2xl font-semibold">{{$pageTitle}}</h1>
        {{$slot}}
    </main>

    <footer class="bg-black">
        <div class="text-center mx-auto p-6 text-white">
            Copyright © 2024 Chihiro Kawase All Rights Reserved.
        </div>
    </footer>

    <script src = "/./js/component.js"></script>
</body>
</html>
