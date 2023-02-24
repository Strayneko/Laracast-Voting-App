<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{

    public $comment;

    protected $listeners = ['setDeleteComment'];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function setDeleteComment($commentId)
    {

        $this->comment = Comment::findOrFail($commentId);

        $this->emit('deleteCommentWasSet');
    }

    public function deleteComment()
    {
        // check user is authenticated and has access rights
        if (auth()->guest() || auth()->user()->cannot('delete', $this->comment)) abort(403);

        $this->comment->delete();

        $this->emit('commentWasDeleted', 'Comment was deleted!');
    }
    public function render()
    {
        return view('livewire.delete-comment');
    }
}
