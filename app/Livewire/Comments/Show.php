<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Post;

class Show extends Component
{
    public Post $post;
    public $comments;

    protected $listeners = [
        'comment-added' => 'refreshComments',
        'comment-updated' => 'refreshComments',
        'comment-deleted' => 'refreshComments',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->refreshComments();
    }

    public function refreshComments()
    {
        $this->comments = $this->post->comments()
            ->whereNull('parent_comment_id')
            ->with('childrenRecursive')
            ->get();
    }

    public function render()
    {
        return view('livewire.comments.show');
    }
}
