<x-layout>
    <x-slot:title>Contact | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>Contact</x-slot>


    <form class = "mt-16" action = "{{route('contact')}}" method = "post">
        @csrf
        <div class = "flex flex-col">
            <label>お名前(漢字)</label>
            <input type="text"  class="w-full lg:w-[60%] mt-2 p-3 text-xs leading-none bg-blueGray-50 rounded outline-none border border-gray-800" name = "name" value = "{{old('name')}}">
           @error('name')
           <p class = "text-red-400">{{$message}}</p>
           @enderror
        </div>
        <div class = "mt-4 flex flex-col">
            <label>フリガナ</label>
            <input type="text"  class="w-full lg:w-[60%] mt-2 p-3 text-xs leading-none bg-blueGray-50 rounded outline-none border border-gray-800" name = "kana" value = "{{old('kana')}}">
           @error('kana')
           <p class = "text-red-400">{{$message}}</p>
           @enderror
        </div>
        <div class = "mt-4 flex flex-col">
            <label>EMAIL</label>
            <input type="email"  class="w-full lg:w-[60%] mt-2 p-3 text-xs leading-none bg-blueGray-50 rounded outline-none border border-gray-800" name = "email" value = "{{old('email')}}">
            @error('email')
            <p class = "text-red-400">{{$message}}</p>
            @enderror
        </div>
        <div class = "mt-4 flex flex-col">
            <label>電話番号</label>
            <input type="text"  class="w-full lg:w-[60%] mt-2 p-3 text-xs leading-none bg-blueGray-50 rounded outline-none border border-gray-800" name = "phone" value = "{{old('phone')}}">
            @error('phone')
            <p class = "text-red-400">{{$message}}</p>
            @enderror
        </div>
        <div class = "mt-4 flex flex-col">
            <label>お問い合わせ内容</label>
            <textarea class="w-full lg:w-[60%] h-24 mt-2 p-4 text-xs leading-none resize-none rounded bg-blueGray-50 border border-gray-800" name = "body">{{old('body')}}</textarea>
            @error('body')
            <p class = "text-red-400">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button class="mt-6 text-white font-semibold leading-none bg-gray-800 hover:bg-blue-600 rounded py-4 px-12" type="submit">送信</button>
        </div>
    </form>
</x-layout>
