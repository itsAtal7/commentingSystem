<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class Delete extends Component
{
    public Comment $comment;

    public function confirmDelete()
    {
        $this->deleteWithChildren($this->comment);
        $this->dispatch('comment-deleted'); // refresh parent comments
        $this->js("toastr.success('Comment deleted successfully.')");
    }

    protected function deleteWithChildren(Comment $comment)
    {
        foreach ($comment->children as $child) {
            $this->deleteWithChildren($child);
        }
        $comment->delete();
    }

    public function render()
    {
        return view('livewire.comments.delete');
    }
}
