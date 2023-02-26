<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use App\Models\Comment;
use Livewire\Component;
use App\Jobs\NotifyAllVoters;
use App\Notifications\CommentAdded;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $notifyAllVoters;
    public $comment;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) abort(403);

        $this->idea->status_id = $this->status;
        $this->idea->save();

        $this->emit('statusWasUpdated', 'Status was changed to ' . Status::find($this->status)->name);

        if ($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);
        }
        // add commetn
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => $this->status,
            'body'    => $this->comment ?? 'No comment was added.',
            'is_status_update' => true,
        ]);

        // notify the user
        $this->idea->user->notify(new CommentAdded($comment));


        // reset form
        $this->reset('comment');
    }



    public function render()
    {
        return view('livewire.set-status');
    }
}
