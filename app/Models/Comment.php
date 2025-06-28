<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends BaseModel
{
    const MAX_DEPTH = 3;

    protected $fillable = [
        'content',
        'post_id',
        'parent_comment_id',
        'depth'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function canReply()
    {
        return $this->depth < 3;
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public static function booted()
    {
        static::creating(function ($c) {
            if ($c->parent_comment_id) {
                $parent = Comment::find($c->parent_comment_id);
                $c->depth = $parent->depth + 1;
            } else {
                $c->depth = 1;
            }
            if ($c->depth > self::MAX_DEPTH) {
                throw new \Exception("Max depth of ".self::MAX_DEPTH." reached.");
            }
        });
    }
}
