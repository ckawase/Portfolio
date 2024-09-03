<x-layout>
    <x-slot:title>Works | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>カレンダー</x-slot>
    <div class = "w-[80%] mx-auto">
        <div class = "flex justify-between my-16">
            <span class = "text-4xl cursor-pointer" id = "cancel">
                <a href = "{{route('events.schedule', ['date' => $date])}}">x</a>
            </span>
            <span class = "text-2xl cursor-pointer text-gray-400 p-2 rounded" id = "save">保存</span>
        </div>

         <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
         @if($errors->any())
         <div class="my-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li class = "text-red-400">{{$error}}</li>
                 @endforeach
             </ul>
         </div>
         @endif
         <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->

        <form action = "{{route('events.index')}}" method = "post" id = "eventForm">
            @csrf
            <table class = "border-collapse w-[100%] my-16">
              <tbody>
                <tr class = "h-32">
                  <th class="bg-[#E3F2FD] border-l border-r border-b border-t border-gray-400 p-2 w-[30%]">タイトル</th>
                  <td class="border border-gray-400 p-2 text-center"> <input type = "text" name = "title" class = "w-[80%] border border-gray-500 p-2 rounded" value = "{{old('title')}}"></td>
                </tr>
                <tr class = "h-32">
                  <th class="bg-[#E3F2FD] border-l border-r border-b border-gray-400 p-2 w-[30%]"> 終日</th>
                  <td class="border border-gray-400 p-2 text-center"><input type = "checkbox" name = "isAllDay" value = "1"></td>
                </tr>
                <tr class = "h-32">
                  <th class="bg-[#E3F2FD] border-l border-r border-b border-gray-400 p-2 w-[30%]"> 開始</th>
                  <td class="border border-gray-400 p-2 text-center">
                    <input type = "date" name = "startDate" value = "{{$date}}">
                    <input type = "time" name = "startTime" value = "{{old("startTime")}}">
                  </td>
                </tr>
                <tr class = "h-32">
                  <th class="bg-[#E3F2FD] border-l border-r border-b border-gray-400 p-2 w-[30%]">終了</th>
                  <td class="border border-gray-400 p-2 text-center">
                    <input type = "date" name = "endDate" value = "{{$date}}">
                    <input type = "time" name = "endTime" value = "{{old("endTime")}}">
                  </td>
                </tr>
                <tr class = "h-32">
                  <th class="bg-[#E3F2FD] border-l border-r border-b border-gray-400 p-2 w-[30%]">メモ</th>
                  <td class="border border-gray-400 p-2 text-center"><textarea name = "body" class = "w-[80%] border border-gray-500 p-2 rounded">{{old('body')}}</textarea></td>
                </tr>
              </tbody>
            </table>
        </form>
    </div>
      <script>
        //終日のチェックボックスによって時間に関するinputの表示を制御する。
        const isAllDay = document.querySelector('input[name="isAllDay"]');
        isAllDay.addEventListener('change', () => {
            const startTime = document.querySelector('input[name="startTime"]');
            const endTime = document.querySelector('input[name="endTime"]');

            startTime.classList.toggle('hidden');
            endTime.classList.toggle('hidden');
        });

        //保存ボタンを押したらデータをPOSTで保存できるようにする。
        const save = document.querySelector('#save');
        save.addEventListener('click', () => {
            document.getElementById('eventForm').submit();
        });
      </script>
</x-layout>
