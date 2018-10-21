<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Lockable
{
    /**
     * Boot the trait.
     */
    protected static function bootLockable()
    {
        static::deleting(function ($model) {
            $model->lock()->delete();
        });
    }

    /**
     * A model can be locked.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function lock()
    {
        return $this->morphOne(Lock::class, 'lockable');
    }

    /**
     * Lock the current model.
     *
     * @return Model
     */
    public function dolock()
    {
        $lock = $this->lock()->first();

        $attributes = ['user_id' => auth()->id()];

        if (! $lock) {
            return $this->lock()->create($attributes);
        }

        if ($lock->user_id == auth()->id()) {
            return $lock->touch();
        }
    }

    /**
     * Unlock the current model.
     */
    public function unlock()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->lock()->where($attributes)->get()->each->delete();

        return ! $this->isLocked();
    }

    /**
     * Determine if the current model has been locked.
     *
     * @return boolean
     */
    public function isLocked()
    {
        return (boolean) $this->lock()->first();
    }

    // /**
    //  * Fetch the locked status as a property.
    //  *
    //  * @return bool
    //  */
    // public function getIsLockedAttribute()
    // {
    //     return $this->isLocked();
    // }

}
