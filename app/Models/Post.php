<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends BaseModel
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_comment_id');
    }
}
