<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public ?Post $post = null;
    public ?Comment $parent = null;
    public string $content = '';

    protected $rules = [
        'content' => 'required|min:10'
    ];

    protected $messages = [
        'content.required' => 'The comment cannot be empty.',
        'content.min' => 'The comment must be at least 10 characters.'
    ];

    public function save()
    {
        $this->validate();

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
        $this->js("toastr.success('Comment created successfully.')");
    }

    public function render()
    {
        return view('livewire.comments.create');
    }
}
