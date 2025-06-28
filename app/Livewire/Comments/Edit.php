<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;

class Edit extends Component
{
    public Comment $comment;
    public string $content = '';
    public bool $editing = false;

    protected $rules = [
        'content' => 'required|min:10',
    ];

    protected $messages = [
        'content.required' => 'The comment cannot be empty.',
        'content.min' => 'The comment must be at least 10 characters.',
    ];

    public function mount(Comment $comment)
    {
        $this->content = $comment->content;
    }

    public function startEditing()
    {
        $this->editing = true;
    }

    public function cancelEditing()
    {
        $this->editing = false;
        $this->content = $this->comment->content;
    }

    public function save()
    {
        $this->validate();

        $this->comment->update([
            'content' => $this->content,
        ]);

        $this->editing = false;

        $this->dispatch('comment-updated');
    }

    public function render()
    {
        return view('livewire.comments.edit');
    }
}
