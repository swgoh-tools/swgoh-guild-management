<?php

namespace App\Helper;

use Carbon\Carbon;

/**
 * Class Timezone.
 */
class TimezoneHelper
{
    /**
     * @param Carbon $date
     * @param string $format
     *
     * @return Carbon
     */
    public function convertToLocal(Carbon $date, $format = 'D M j G:i:s T Y') : string
    {
        return $date->setTimezone(auth()->user()->timezone ?? config('app.timezone'))->format($format);
    }

    public function formatDateLong($date, $format = 'LLLL') : string
    {
        if (!$date instanceof Carbon) {
            $date = Carbon::createFromTimestampMs($date);
        }

        return $date->locale(app()->getLocale())->isoFormat($format);
        //old:
        //date('D, d M Y', intval(substr($info['updated'] ?? '', 0, 10)))
    }

    /**
     * @param $date
     *
     * @return Carbon
     */
    public function convertFromLocal($date) : Carbon
    {
        return Carbon::parse($date, auth()->user()->timezone)->setTimezone('UTC');
    }
}
