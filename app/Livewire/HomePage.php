<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home-page', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }
}

