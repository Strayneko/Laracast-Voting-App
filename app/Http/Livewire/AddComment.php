<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Comment;
use App\Models\Idea;
use App\Notifications\CommentAdded;
use Livewire\Component;

class AddComment extends Component
{
    use WithAuthRedirects;

    public Idea $idea;
    public $comment;

    protected $rules = ['comment' => 'required|min:4'];

    public function addComment()
    {
        // abort if user not athenticated
        if (auth()->guest()) abort(403);

        // validate inpit
        $this->validate();

        // add commetn
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => 1,
            'body'    => $this->comment,
        ]);

        // clear input
        $this->reset('comment');

        // notify the user
        $this->idea->user->notify(new CommentAdded($comment));

        $this->emit('commentWasAdded', 'Comment was posted!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
