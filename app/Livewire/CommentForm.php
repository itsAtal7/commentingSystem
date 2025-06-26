<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentForm extends Component
{
    public ?Post $post = null;
    public ?Comment $parent = null;
    public string $content = '';

    public function save()
    {
        $depth = $this->parent ? $this->parent->depth + 1 : 1;

        if ($depth > 3) {
            return;
        }

        Comment::create([
            'post_id' => $this->post->id,
            'parent_comment_id' => $this->parent?->id,
            'content' => $this->content,
            'depth' => $depth,
        ]);

        $this->content = '';
        $this->dispatch('comment-added');
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
