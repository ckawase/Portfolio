<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\Calender\EventTime;
use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdatedEventRequest;

class EventController extends Controller
{
    public function index()
    {
        //終日のイベントを取得
        $events = Event::select('title', 'startDate', 'endDate')
        ->orderBy('startDate', 'asc')  // startDate で昇順に並べ替え
        ->orderBy('startTime', 'asc')  // 同じ startDate の場合は startTime で昇順に並べ替え
        ->get();

        return view('works.events.index',['events' => $events]);
    }

    public function schedule($date)
    {
        // 終日イベントの取得
        $allDayEvents = Event::select('title', 'startDate', 'endDate', 'body', 'id')
            ->where('isAllDay', true)  // isAllDay = 1 の条件
            ->where(function($query) use ($date) {
                $query->whereDate('startDate', '<=', $date)
                      ->whereDate('endDate', '>=', $date);
            })
            ->orderBy('startDate')
            ->get();

        // 変換処理（日本語形式）
        $allDayEvents = EventTime::convertDateToJapaneseFormat($allDayEvents);

        // 時間指定イベントの取得
        $timedEvents = Event::select('title',
                                     DB::raw("strftime('%H:%M:%S', startTime) AS startTime"),
                                     DB::raw("strftime('%H:%M:%S', endTime) AS endTime"),
                                     'id')
            ->where('isAllDay', false)  // isAllDay = 0 の条件
            ->where(function($query) use ($date) {
                $query->whereDate('startDate', '<=', $date)
                      ->whereDate('endDate', '>=', $date);
            })
            ->orderBy(DB::raw("strftime('%H:%M', startTime)"))
            ->get();

        // 変換処理（時間の形式を変更）
        $timedEvents = EventTime::convertTimePeriod($timedEvents);

        // フル日付の取得（表示用）
        $fullDate = EventTime::getFullDate($date);

        // ビューにデータを渡す
        return view('works.events.schedule', [
            'allDayEvents' => $allDayEvents,
            'timedEvents' => $timedEvents,
            'fullDate' => $fullDate,
            'date' => $date
        ]);
    }


    public function show(Event $event)
    {
        $event = Event::findOrFail($event->id); // IDから該当のイベントを取得

        $event = EventTime::convertSingleEventTimePeriod($event);//時間部分の表示を日本語に変更
        $startDate = $event->startDate;
        $endDate = $event->endDate;

        $startDate = EventTime::getFullDate($startDate);
        $endDate = EventTime::getFullDate($endDate);

        return view('works.events.show', ['event' => $event, 'startDate' => $startDate, 'endDate' => $endDate]);
    }

    public function create($date)
    {
        return view('works.events.create', ['date' => $date]);
    }

    public function store(EventRequest $request)
    {
        // チェックボックスの値を取得
        $isAllDay = $request->has('isAllDay'); // チェックが入っていれば true、入っていなければ false

        //バリデーション済みのデータを取得
        $validated = $request->validated();

        //新しいイベントを作成し、バリデーション済みデータを保存
        $event = Event::create($validated);

        $event->isAllDay = $isAllDay;//isAllDayをtrue,falseで登録
        $event->save();

        return to_route('events.schedule', ['date' => $event->startDate]);
    }

    public function edit(Event $event)
    {
        return view('works.events.edit', ['event' => $event]);
    }

    public function update(UpdatedEventRequest $request, Event $event)
    {
        // チェックボックスの値を取得
        $isAllDay = $request->has('isAllDay') ? true : false; // チェックが入っていれば true、入っていなければ false
        $event = Event::findOrFail($event->id);

        // バリデーション済みのデータを取得
        $updateData = $request->validated();
        $event->update($updateData);

        $event->isAllDay = $isAllDay;
        $event->save();

       return to_route('events.schedule', ['date' => $event->startDate]);
    }



    public function destroy(Event $event)
    {
        $date = $event->startDate;
        $event->delete();

        return to_route('events.schedule', ['date' => $date]);
    }
}
