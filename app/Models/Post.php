<?php

namespace App\Models;

use App\Models\BaseModel;

class Post extends BaseModel
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_comment_id');
    }
}
