<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Http\Livewire\Traits\WithAuthRedirects;
use Livewire\Component;
use App\Models\Idea;

class IdeaShow extends Component
{
    use WithAuthRedirects;

    public $idea;
    public $votesCount;
    public $hasVoted;

    protected $listeners = [
        'statusWasUpdated' => 'refresh',
        'ideaWasUpdated' => 'refresh',
        'ideaWasMarkedAsSpam' => 'refresh',
        'ideaWasMarkedAsNotSpam' => 'refresh',
        'commentWasAdded' => 'refresh',
        'commentWasDeleted' => 'refresh',
    ];

    public function mount(Idea $idea, $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function vote()
    {
        // redirect user to login page if user does'nt login yet
        if (auth()->guest()) return $this->redirectToLogin();

        // remove vote when it's been voted
        //  and vote it when the user has not yet voted
        if ($this->hasVoted) {
            try {
                $this->idea->removeVote(auth()->user());
            } catch (VoteNotFoundException $e) {
                // do nothing
            }

            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            try {
                $this->idea->vote(auth()->user());
            } catch (DuplicateVoteException $e) {
                // do nothing
            }

            $this->votesCount++;
            $this->hasVoted = true;
        }
    }


    public function refresh()
    {
        $this->idea->refresh();
    }


    public function render()
    {
        return view('livewire.idea-show');
    }
}
