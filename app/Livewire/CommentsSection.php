<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CommentsSection extends Component
{
    public Post $post;
    public $comments;

    protected $listeners = ['comment-added' => 'refreshComments'];

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
        return view('livewire.comments-section');
    }
}
