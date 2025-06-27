<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class HomePage extends Component
{
    use WithPagination;

    public $showPostModal = false;
    public $editingPostId = null;

    protected $listeners = [
        'editPost',
        'post-updated' => 'closeModal'
    ];

    public function editPost($postId)
    {
        $this->editingPostId = $postId;
        $this->showPostModal = true;
    }

    #[On('post-added')]
    #[On('post-updated')]
    public function closeModal()
    {
        $this->showPostModal = false;
        $this->editingPostId = null;
    }

    public function render()
    {
        return view('livewire.home-page', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }
}

