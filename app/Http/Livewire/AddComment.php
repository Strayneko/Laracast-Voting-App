<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Livewire\Component;

class AddComment extends Component
{
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
        Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'body'    => $this->comment,
        ]);

        // clear input
        $this->reset('comment');

        $this->emit('commentWasAdded', 'Comment was posted!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
