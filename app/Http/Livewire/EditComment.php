<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class EditComment extends Component
{

    public $comment;
    public $body;

    protected $listeners = ['setEditComment'];
    protected $rules = ['body' => 'required|min:4'];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function setEditComment($commentId)
    {

        $this->comment = Comment::findOrFail($commentId);
        $this->body = $this->comment->body;

        $this->emit('editCommentWasSet');
    }

    public function updateComment()
    {
        // check user is authenticated and has access rights
        if (auth()->guest() || auth()->user()->cannot('update', $this->comment)) abort(403);
        $this->validate();

        $this->comment->body = $this->body;
        $this->comment->save();

        $this->emit('commentWasUpdated', 'Comment was updated!');
    }
    public function render()
    {
        return view('livewire.edit-comment');
    }
}
