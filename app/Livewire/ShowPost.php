<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPost extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post->load([
            'comments' => fn ($q) => $q->whereNull('parent_comment_id')->with('replies.replies')
        ]);
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
