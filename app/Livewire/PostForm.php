<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostForm extends Component
{
    public string $title = '';
    public string $content = '';

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:10',
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

        $this->browserEvent('close-post-modal');

    }


    public function render()
    {
        return view('livewire.post-form');
    }
}
