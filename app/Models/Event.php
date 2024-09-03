<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isAllDay',
        'startDate',
        'startTime',
        'endDate',
        'endTime',
        'body',
    ];

    protected $attributes = [
        'isAllDay' => false,
        'body' => '', // デフォルト値を空文字列に設定
    ];
}
