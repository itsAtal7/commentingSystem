<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class Create extends Component
{
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

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset();

        $this->dispatch('post-added');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
