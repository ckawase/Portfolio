<x-layout>
    <x-slot:title>Works | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>Works</x-slot>

    <div class = "mt-16 flex flex-col lg:flex-row">
        <img src = "{{asset('images/works/calender.png')}}" class = "w-80 h-80">
        <div class = "flex flex-col items-center mt-6">
            <div class = "mx-auto px-2">
                <h2 class = "text-2xl font-semibold">カレンダーアプリ</h2>
                <p class = "mt-2 text-xl">カレンダーアプリを自作しました！</p>
                <p class = "mt-2 text-xl">Laravelの機能を駆使し、シンプルで使いやすいCRUD機能を実装しています。直感的な操作性を重視し、誰でも簡単に使えるアプリケーションを目指しました。</p>
            </div>
            <button class = "bg-gray-800 text-white py-2 px-2 rounded-l-lg rounded-r-lg w-36 mt-12 hover:opacity-25">
                <a href = "{{route('events.index')}}" class = "font-bold">詳しくはこちら ></a>
            </button>
        </div>
    </div>
</x-layout>
