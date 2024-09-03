<?php

namespace App\Services\Calender;

use DateTime;

class EventTime
{
  public static function getFullDate($date){
    // 日付文字列をUNIXタイムスタンプに変換
    $timestamp = strtotime($date);

    $dayOfWeek = date('N', $timestamp);
    // 曜日を日本語に変換する配列
    $weekdays = array(
      '1' => '(月)',
      '2' => '(火)',
      '3' => '(水)',
      '4' => '(木)',
      '5' => '(金)',
      '6' => '(土)',
      '7' => '(日)'
    );
    //曜日の部分を取得
    $dayOfWeek = $weekdays[$dayOfWeek];

    $fullDate = date('Y年n月j日', $timestamp) . $dayOfWeek;
    return $fullDate;
  }

  public static function convertTimePeriod($events){
    foreach ($events as $event) {
      $event->startTime = date('A g:i', strtotime($event->startTime));
      // AMならば「午前」、PMならば「午後」に変換する
      switch (substr($event->startTime, 0, 2)) {
        case 'AM';
         $event->startTime = '午前' . substr($event->startTime, 2);
         break;
        case 'PM':
          $event->startTime = '午後' . substr($event->startTime, 2);
          break;
        default:
          $event->startTime = ''; // それ以外の場合は空文字とする
          break;
      }

      $event->endTime = date('A g:i', strtotime($event->endTime));
      switch (substr($event->endTime, 0, 2)) {
        case 'AM';
         $event->endTime = '午前' . substr($event->endTime, 2);
         break;
        case 'PM':
          $event->endTime = '午後' . substr($event->endTime, 2);
          break;
        default:
          $event->endTime = ''; // それ以外の場合は空文字とする
          break;
      }
    }

    return $events;
  }

  public static function convertSingleEventTimePeriod($event){
    $event->startTime = date('A g:i', strtotime($event->startTime));
    // AMならば「午前」、PMならば「午後」に変換する
    switch (substr($event->startTime, 0, 2)) {
        case 'AM':
            $event->startTime = '午前' . substr($event->startTime, 2);
            break;
        case 'PM':
            $event->startTime = '午後' . substr($event->startTime, 2);
            break;
        default:
            $event->startTime = ''; // それ以外の場合は空文字とする
            break;
    }

    $event->endTime = date('A g:i', strtotime($event->endTime));
    switch (substr($event->endTime, 0, 2)) {
        case 'AM':
            $event->endTime = '午前' . substr($event->endTime, 2);
            break;
        case 'PM':
            $event->endTime = '午後' . substr($event->endTime, 2);
            break;
        default:
            $event->endTime = ''; // それ以外の場合は空文字とする
            break;
    }
    return $event;
  }

  public static function convertDateToJapaneseFormat($allDayEvents)
  {
    foreach($allDayEvents as $event){
        $startDateObj = new DateTime($event->startDate);
        $event->startDate = $startDateObj->format('Y年n月j日');

        $endDateObj = new DateTime($event->endDate);
        $event->endDate = $endDateObj->format('Y年n月j日');
    }

    return $allDayEvents;
  }
}
