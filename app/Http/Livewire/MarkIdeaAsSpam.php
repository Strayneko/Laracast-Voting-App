<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Idea;

class MarkIdeaAsSpam extends Component
{
    public $idea;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function markAsSpam()
    {
        if (auth()->guest()) abort(403);

        $this->idea->spam_reports++;
        $this->idea->save();

        $this->emit('ideaWasMarkedAsSpam');
    }

    public function render()
    {
        return view('livewire.mark-idea-as-spam');
    }
}
