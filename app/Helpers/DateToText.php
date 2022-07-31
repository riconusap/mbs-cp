<?php
namespace App\Helpers;

use Carbon\Carbon;

class DateToText {
    public static function dateToText($date)
    {
        return Carbon::parse($date)->isoFormat('lll');
    }
}
