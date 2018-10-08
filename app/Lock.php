<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['user:id,name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'lockable_id',
        'lockable_type',
        'user_id',
    ];

    /**
     * Fetch the model that was locked.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function locked()
    {
        return $this->morphTo();
    }

    /**
     * A memo belongs to a user who changed it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
