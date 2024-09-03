<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\EventRules;

class UpdatedEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isAllDay = $this->input('isAllDay', false);

        $rules = [
            'title' => 'required|string|max:255',
            'isAllDay' => 'nullable|boolean',
            'startDate' => 'required|date',
            'startTime' => 'nullable',
            'endDate' => 'required|date',
            'endTime' => 'nullable',
            'body' => 'nullable|string|max:65535',
        ];

        // カスタムバリデーションルールを適用
        $rules['endDate'] = new EventRules(
            $this->input('startDate'),
            $this->input('startTime'),
            $this->input('endDate'),
            $this->input('endTime'),
            $isAllDay
        );

        return $rules;
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'isAllDay' => '終日のチェック',
            'startTime' => '開始時刻',
            'endTime' => '終了時間',
            'body' => 'メモ',
            'h:i' => '時:分',
        ];
    }
}
