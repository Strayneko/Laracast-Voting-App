<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{
    public Comment $comment;
    public $ideaUserId;


    public function mount($ideaUserId)
    {
        $this->ideaUserId = $ideaUserId;
    }
    public function render()
    {
        return view('livewire.idea-comment');
    }
}
