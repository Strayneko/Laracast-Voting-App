<?php

namespace App\Http\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Models\Idea;
use Livewire\Component;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $notifyAllVoters;

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

        $this->emit('statusWasUpdated');

        if ($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);
        }
    }



    public function render()
    {
        return view('livewire.set-status');
    }
}
