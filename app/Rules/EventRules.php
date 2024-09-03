<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EventRules implements ValidationRule
{
    protected $startDate;
    protected $startTime;
    protected $endDate;
    protected $endTime;
    protected $isAllDay;

     /**
     * Create a new rule instance.
     *
     * @param  string  $startDate
     * @param  string|null  $startTime
     * @param  string  $endDate
     * @param  string|null  $endTime
     * @param  bool  $isAllDay
     */
    public function __construct($startDate, $startTime, $endDate, $endTime, $isAllDay)
    {
        $this->startDate = $startDate;
        $this->startTime = $startTime;
        $this->endDate = $endDate;
        $this->endTime = $endTime;
        $this->isAllDay = $isAllDay;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //endDateがstartDateより早くないか確認
        if($this->endDate < $this->startDate){
            $fail('終了日は開始日と同じか、それ以降に設定してください。');
            return;
        }

        //endDateとstartDateが同じ場合、endTimeがstartTimeより早くないかを確認
        if($this->endDate === $this->startDate && $this->endTime < $this->startTime){
            $fail('開始時刻を終了時刻よりも早く設定してください。');
            return;
        }
    }
}
