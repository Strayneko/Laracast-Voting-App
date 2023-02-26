<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;

    public $idea;

    protected $listeners = [
        'commentWasAdded',
        'commentWasDeleted',
        'statusWasUpdated' => 'commentWasAdded',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => $this->idea->comments()->with(['user', 'status'])->paginate()->withQueryString(),
        ]);
    }

    public function commentWasAdded()
    {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }
    public function commentWasDeleted()
    {
        $this->idea->refresh();
        $this->gotoPage(1);
    }
}
