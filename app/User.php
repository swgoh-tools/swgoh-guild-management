<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use App\Jobs\CheckNewAllyCode;

class User extends Authenticatable
{
    use HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'email',
        'password',
        'email_verified_at',
        'avatar_path',
        'confirmed',
        'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'confirmed' => 'boolean'
    ];

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        // return 'name';
        return 'id';
    }

    public function guilds()
    {
        return $this->hasMany(Guild::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * A user has multiple sanctions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }


    /**
     * Fetch all threads that were created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    /**
     * Fetch the last published reply for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    /**
     * Get all activity for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Mark the user's account as confirmed.
     */
    public function confirm()
    {
        $this->confirmed = true;
        $this->confirmation_token = null;

        $this->save();
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return in_array($this->id, [1, 'JohnDoe', 'JaneDoe']);
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isOfficer()
    {
        if ($this->isAdmin()) {
            return true;
        }
        return in_array($this->id, [1, 'JohnDoe', 'JaneDoe']);
    }

    /**
     * Record that the user has read the given thread.
     *
     * @param Thread $thread
     */
    public function read($thread)
    {
        cache()->forever(
            $this->visitedThreadCacheKey($thread),
            Carbon::now()
        );
    }

    /**
     * Get the path to the user's avatar.
     *
     * @param  string $avatar
     * @return string
     */
    public function getAvatarPathAttribute($avatar)
    {
        if ($avatar && Storage::disk('avatars')->exists($avatar)) {
            return Storage::disk('avatars')->url($avatar);
        }
        return asset('images/avatars/default.png');
    }

    /**
     * Set the path to the user's avatar.
     *
     * @param  string $avatar
     * @return string
     */
    // public function setAvatarPathAttribute($avatar)
    // {
    //     $id = explode('/', $avatar);
    //     return array_pop($id);
    // }

    /**
     * Set the ally code and check if guild already exists.
     *
     * @param  string $code
     * @return string
     */
    public function setCodeAttribute($code)
    {
        if ($code == '000000000' || !$code) {
            return $this->attributes['code'] = null;
        }

        if ($this->confirmed && $this->code <> $code) {
            CheckNewAllyCode::dispatch($this, $code)
            ->onQueue('default');
        }

        return $this->attributes['code'] = $code;
    }

    /**
     * Set the confirmed and check if guild already exists.
     *
     * @param  boolean $confirmed
     * @return boolean
     */
    public function setConfirmedAttribute($confirmed)
    {
        if (!$this->confirmed && $confirmed) {
            CheckNewAllyCode::dispatch($this, $this->code)
            ->onQueue('default');
        }
        return $this->attributes['confirmed'] = $confirmed;
    }

    /**
     * Get the cache key for when a user reads a thread.
     *
     * @param  Thread $thread
     * @return string
     */
    public function visitedThreadCacheKey($thread)
    {
        return sprintf("users.%s.visits.%s", $this->id, $thread->id);
    }

    /**
     * Get the cache key for when a user reads a thread.
     *
     * @param  Memo $memo
     * @return string
     */
    public function visitedMemoCacheKey($memo)
    {
        return sprintf("users.%s.visits.%s", $this->id, $memo->id);
    }
}
