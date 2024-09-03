<x-layout>
    @push('styles')
        @vite('resources/css/calender.css')
    @endpush
    @push('js')
        <script src = "{{asset('js/Calender.js')}}"></script>
    @endpush
    <x-slot:title>Works | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>カレンダー</x-slot>

    <table class = "lg:w-[840px] w-full">
        <thead>
          <tr>
            <th id = "prev">&laquo;</th>
            <th id = "title" colspan = "5"></th>
            <th id = "next">&raquo;</th>
          </tr>
          <tr class = "day">
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
        </thead>
        <tbody>
         {{-- <td class = "date">
            <div class = "date-head"></div>
            <div class = "date-content"></div>
          </td> --}}
        </tbody>
      </table>
    <script type="module">
        import Calendar from "/./js/Calender.js";

        const today = new Date();

        const year = today.getFullYear();
        const month = today.getMonth();
        const calender = new Calendar(year, month, today);

        const headDates = calender.getCalenderHead();
        const bodyDates = calender.getCalenderBody();
        const tailDates = calender.getCalenderTail();

        //allDayEventsとtimedEventsをCalender.jsでも扱えるようにするためにグローバル変数にする
        window.events = @json($events);
        calender.createCalender(headDates, bodyDates, tailDates);
        calender.moveToPreviousMonth();
        calender.moveToNextMonth();
        calender.setupEventListeners();
        calender.addEventsToCalender();

    </script>
</x-layout>
