<x-layout>
    <x-slot:title>Works | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>カレンダー</x-slot>
    <div class = "w-[80%] mx-auto">
        <div class = "relative mt-12">
            <span id = "cancel" class = "text-4xl cursor-pointer text-{{$event->color}}-400">
                <a href = "{{route('events.schedule', ['date' => $event->startDate])}}">x</a>
            </span>
            <button class = "absolute right-0 top-0 text-3xl text-gray-400" id = "toggleButton">•••</button>
            <div class = " absolute hidden flex-col menu-content bg-white border border-gray-300 rounded-md p-2 -right-4 top-10" id = "menuContent">
                <span id = "update" class = "text-2xl cursor-pointer text-gray-400">
                    <a href = "{{route('events.edit', ['event' => $event])}}">編集</a>
                </span>
                <form action="{{route('events.destroy', $event)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button id = "delete" class = "text-2xl cursor-pointer text-red-400">削除</button>
                </form>
            </div>
        </div>
        @if ($event->isAllDay)
        <h2 class = "text-center text-2xl font-black mt-8 text-gray-500">{{$event->title}}</h2>
        <div class = "flex justify-between items-center w-[480px] mx-auto mt-12">
            <span>
              <div class = "text-2xl font-bold">{{$startDate}}</div>
            </span>
            <span class = "flex items-center font-bold text-gray-400 text-4xl">></span>
            <span>
              <div class = "text-2xl font-bold">{{$endDate}}</div>
            </span>
          </div>
          <fieldset class = "my-20 h-[320px] border-2 border-gray-900 border-dashed p-4">
                <legend class = "text-{{$event->color}}-400">メモ</legend>
                {!! nl2br(e($event->body)) !!}
          </fieldset>
        @else
        <div>
            <h2 class = "text-center text-2xl font-black mt-8 text-{{$event->color}}-400">{{$event->title}}</h2>
            <div class = "flex justify-between w-[480px] mx-auto mt-12">
                <span>
                  <div class = "text-xl">{{$startDate}}</div>
                  <div class = "text-2xl font-bold">{{$event->startTime}}</div>
                </span>
                <span class = "flex items-center font-bold text-gray-400 text-4xl">></span>
                <span>
                  <div class = "text-xl">{{$endDate}}</div>
                  <div class = "text-2xl font-bold">{{$event->endTime}}</div>
                </span>
              </div>
              <fieldset class = "my-20 h-[320px] border-2   border-dashed p-4 border-gray-900">
                    <legend class = "px-2">メモ</legend>
                    {!! nl2br(e($event->body)) !!}
              </fieldset>
        </div>
        @endif
    </div>
    <script>
        const button = document.querySelector('#toggleButton');
        button.addEventListener('click', () => {
            const content = document.querySelector('#content');
            if (menuContent.classList.contains('hidden')) {
                menuContent.classList.remove('hidden');
                menuContent.classList.add('flex');
            } else {
                menuContent.classList.remove('flex');
                menuContent.classList.add('hidden');
            }
        });
    </script>
</x-layout>
