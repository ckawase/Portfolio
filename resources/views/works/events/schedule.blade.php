<x-layout>
    <x-slot:title>Works | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>カレンダー</x-slot>
    <div class = "w-[80%] mx-auto">
        <div class = "flex justify-between items-center mt-12">
            <h1 class = "text-2xl">{{$fullDate}}</h1>
            <span id = "add" class = "text-[32px] cursor-pointer text-gray-400">
                <a href = "{{route('events.create', ['date' => $date])}}">+</a>
            </span>
        </div>
        <table class = " mt-16 border-separate border-spacing-y-[16px] w-full">
            <tbody>
                @foreach ($allDayEvents as $event)
                    <tr>
                        <th class="w-[30%] border-r-4 border-r-gray-400 text-center">
                            <div>{{$event->startDate}}</div>
                            <div>{{$event->endDate}}</div>
                        </th>
                        <td class = "text-2xl p-2 text-center">{{$event->title}}</td>
                        <td  class = "bg-gray-400 rounded text-white cursor-pointer w-[3%]  p-1 text-center text-2xl opacity-100 hover:opacity-30" id = "timedArrows" data-id = "{{$event->id}}">
                            <a href = "{{route('events.show', ['event' => $event])}}">></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class = "border-separate border-spacing-y-[16px] w-full">
            <tbody>
                @foreach ($timedEvents as $event)
                    <tr>
                        <th class="w-[30%] border-r-4 border-r-gray-400 text-center">
                            <div>{{$event->startTime}}</div>
                            <div>{{$event->endTime}}</div>
                        </th>
                        <td class = "text-2xl p-2 text-center">{{$event->title}}</td>
                        <td  class = "bg-gray-400 rounded text-white cursor-pointer w-[3%]  p-1 text-center text-2xl opacity-100 hover:opacity-30" id = "timedArrows" data-id = "{{$event->id}}">
                            <a class = "text-center" href = "{{route('events.show', ['event' => $event])}}">></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class = "mt-20"><a class = "no-underline  text-gray-400 text-2xl" href = "{{route('events.index')}}">戻る</a></div>
    </div>

</x-layout>
