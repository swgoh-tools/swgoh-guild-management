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
        'gp',
        'lastActivity',
        'updated',
    ];

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

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setLastActivityAttribute($value)
    {
        $this->attributes['lastActivity'] = Carbon::createFromTimestampMs($value);
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setUpdatedAttribute($value)
    {
        $this->attributes['updated'] = Carbon::createFromTimestampMs($value);
    }
}
