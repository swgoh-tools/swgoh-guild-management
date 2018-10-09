<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Memo extends Model
{
    use Favoritable, Lockable, RecordsActivity, Revisionable, Searchable, SoftDeletes;

    // protected $revisionEnabled = true;
    // protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    // protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $keepRevisionOf = array(
        'title',
        'body',
        'page_id'
    );
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
    protected $with = ['creator:id,name', 'page:id,title', 'editor:id,name', 'lock'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = ['isSubscribedTo'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'locked' => 'boolean'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // static::deleting(function ($memo) {
        //     $memo->replies->each->delete();
        // });

        static::created(function ($memo) {
            $memo->update(['slug' => $memo->title]);
        });
    }

    /**
     * Get a string path for the memo.
     *
     * @return string
     */
    public function path()
    {
        return route('memos') . "/{$this->slug}";
        // return route('memos') . "/{$this->guild->slug}/{$this->slug}";
        // return "{$this->page->path()}/{$this->slug}";
    }

    /**
     * A memo belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A memo belongs to a user who changed it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'user_id_current');
    }

    /**
     * A memo is assigned a page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // /**
    //  * A memo may have many replies.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function replies()
    // {
    //     return $this->hasMany(Reply::class);
    // }

    // /**
    //  * Add a reply to the memo.
    //  *
    //  * @param  array $reply
    //  * @return Model
    //  */
    // public function addReply($reply)
    // {
    //     $reply = $this->replies()->create($reply);

    //     // event(new ThreadReceivedNewReply($reply));

    //     return $reply;
    // }

    /**
     * Determine if the memo has been updated since the user last read it.
     *
     * @param  User $user
     * @return bool
     */
    public function hasUpdatesFor($user)
    {
        $key = $user->visitedMemoCacheKey($this);

        return $this->updated_at > cache($key);
    }

    /**
     * Get the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Access the body attribute.
     *
     * @param  string $body
     * @return string
     */
    public function getBodyAttribute($body)
    {
        return \Purify::clean($body);
    }

    /**
     * Access the body attribute.
     *
     * @param  string $body
     * @return string
     */
    public function getTitleAttribute($body)
    {
        return \Purify::clean($body);
    }

    // /**
    //  * Access the body attribute.
    //  *
    //  * @param  string $body
    //  * @return string
    //  */
    // public function setBodyAttribute($body)
    // {
    //     if ($body <> $this->attributes['body']) {

    //     }
    //     $this->attributes['body'] = $body;
    // }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Mark the given reply as the best answer.
     *
     * @param Reply $reply
     */
    public function markBestReply(Reply $reply)
    {
        $this->update(['best_reply_id' => $reply->id]);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->toArray() + ['path' => $this->path()];
    }
}
