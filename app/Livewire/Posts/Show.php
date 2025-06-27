<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Show extends Component
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
        return view('livewire.posts.show');
    }

    public function deletePost()
    {
        $this->post->delete();

        return redirect()->route('home')->with('message', 'Post deleted successfully.');
    }
}
