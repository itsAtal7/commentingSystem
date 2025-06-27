<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Edit extends Component
{
    public Post $post;
    public string $title = '';
    public string $content = '';

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:10',
    ];

    protected $messages = [
        'title.required' => 'Title cannot be empty.',
        'post.min' => 'The post must be at least 10 characters.',
        'content.required' => 'Content cannot be empty.',
        'content.min' => 'Content must be at least 10 characters.'
    ];

    public function mount($postId)
    {
        $this->post = Post::findOrFail($postId);
        $this->title = $this->post->title ?? '';
        $this->content = $this->post->content ?? '';
    }

    public function save()
    {
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset();

        $this->dispatch('post-updated');
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
}
