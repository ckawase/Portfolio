<x-layout>
    <x-slot:title>お問い合わせ完了 | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>お問い合わせ完了</x-slot>
        <div class="my-16 p-6 border border-green-300 bg-green-50 rounded">
            <h1 class="text-2xl font-bold text-green-700">お問い合わせが完了しました。</h1>
            <p class="mt-4 text-gray-700">お問い合わせありがとうございます。ご入力いただいた内容は正常に送信されました。返信までしばらくお待ちください。</p>
            <a href="{{ route('contact') }}" class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">戻る</a>
        </div>
</x-layout>
