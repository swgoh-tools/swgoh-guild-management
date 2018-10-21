<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    
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
    protected $with = ['creator', 'guild'];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($page) {
            $page->memos->each->delete();
        });

        static::created(function ($page) {
            $page->update(['slug' => $page->title]);
        });
    }

    /**
     * Get a string path for the page.
     *
     * @return string
     */
    public function path()
    {
        return route('guild') . "/{$this->guild->slug}/{$this->slug}";
    }

    /**
     * A page belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * A page is assigned a guild.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guild()
    {
        return $this->belongsTo(Guild::class);
    }

    /**
     * A channel consists of memos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memos()
    {
        return $this->hasMany(Memo::class);
    }

    /**
     * Add a memo to the thread.
     *
     * @param  array $memo
     * @return Model
     */
    public function addMemo($memo)
    {
        $memo = $this->memos()->create($memo);

        // event(new ThreadReceivedNewMemo($memo));

        return $memo;
    }

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
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->toArray() + ['path' => $this->path()];
    }
}
