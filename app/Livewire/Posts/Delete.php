<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Delete extends Component
{
    public Post $post;

    public function delete()
    {
        $this->post->delete();

        return redirect()->route('home')->with('message', 'Post deleted successfully.');
    }

    public function render()
    {
        return view('livewire.posts.delete');
    }
}
