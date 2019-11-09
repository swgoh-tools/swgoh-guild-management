<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'refId',
        'guildRefId',
        'origin',
        'level',
        'gp',
        'lastActivity',
        'updated',
    ];

    /**
    * @var $casts（toArray、toJson）
    */
    // protected $casts = [
    //     'lastActivity' => 'date:Y-m-d',
    //     'updated' => 'datetime:Y-m-d H:i',
    //  ];

    protected $dates = [
        'lastActivity',
        'updated',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * A player has multiple sanctions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }

    /**
     * Retain initial origin entry.
     *
     * @param string $value
     */
    public function setOriginAttribute($value)
    {
        $old_value = $this->getOriginal('origin');
        if ($old_value) {
            $old_value =  explode('|', $old_value)[0];
            $this->attributes['origin'] = implode('|', [$old_value, $value]);

            return;
        }

        $this->attributes['origin'] = $value;
    }

    // public function getLastActivityAttribute($value)
    // {
    //     if ($value !== null) {
    //         //$value format 'Y:m:d H:i:s' to 'Y-m-d H:i'
    //         return new Carbon($value);
    //         return (new Carbon($value))->format('Y-m-d H:i');
    //     }
    //     return $value;
    // }
    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setLastActivityAttribute($value)
    {
        if (null === $value) {
            $this->attributes['lastActivity'] = $value;
        } elseif ($value instanceof Carbon) {
            $this->attributes['lastActivity'] = $value;
        } else {
            $this->attributes['lastActivity'] = Carbon::createFromTimestampMs($value);
        }
        /**
         * MySQL is broken for storing DST specific times
         * E.g. trying to set '2016-03-27 02:57:09' (or more precise anything between 02:00 and 03:00 of that day) fails with
         * SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: '2016-03-27 02:57:09'
         * https://stackoverflow.com/questions/36324153/mysql-5-7-incorrect-timestamp-value-2016-03-27-020101?noredirect=1
         * https://stackoverflow.com/questions/1646171/mysql-datetime-fields-and-daylight-savings-time-how-do-i-reference-the-extra
         * https://stackoverflow.com/questions/409286/should-i-use-the-datetime-or-timestamp-data-type-in-mysql?rq=1
         * ->toDateTimeString()
         */
        // Only practical workaround: Change DB data type for column from TIMESTAMP to DATETIME;
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setUpdatedAttribute($value)
    {
        if (null === $value) {
            $this->attributes['lastActivity'] = $value;
        } elseif ($value instanceof Carbon) {
            $this->attributes['updated'] = $value;
        } else {
            $this->attributes['updated'] = Carbon::createFromTimestampMs($value);
        }
    }
}
