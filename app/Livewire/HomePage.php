<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'posts' => Post::latest()->get(),
        ]);
    }
}

