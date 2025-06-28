<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;

class Item extends Component
{
    public Comment $comment;

    protected $listeners = [
        'comment-added' => '$refresh',
        'comment-updated' => '$refresh',
        'comment-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.comments.item');
    }
}
