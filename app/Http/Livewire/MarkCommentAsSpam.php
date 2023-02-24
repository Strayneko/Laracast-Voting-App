<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class MarkCommentAsSpam extends Component
{

    public $comment;

    protected $listeners = ['setMarkAsSpamComment'];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function setMarkAsSpamComment($commentId)
    {

        $this->comment = Comment::findOrFail($commentId);

        $this->emit('markSpamCommentWasSet');
    }

    public function markAsSpam()
    {
        // check user is authenticated and has access rights
        if (auth()->guest()) abort(403);

        $this->comment->spam_reports++;
        $this->comment->save();

        $this->emit('commentWasMarkedAsSpam', 'Comment was marked as spam!');
    }

    public function render()
    {
        return view('livewire.mark-comment-as-spam');
    }
}
