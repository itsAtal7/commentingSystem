<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class Edit extends Component
{
    public Comment $comment;
    public string $content = '';

    protected $rules = [
        'content' => 'required|min:10',
    ];

    public function mount(Comment $comment)
    {
        $this->content = $comment->content;
    }

    public function update()
    {
        $this->validate();

        $this->comment->update([
            'content' => $this->content,
        ]);

        $this->dispatch('comment-updated', id: $this->comment->id);

    }

    public function render()
    {
        return view('livewire.comments.edit');
    }
}
