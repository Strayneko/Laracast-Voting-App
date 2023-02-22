<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public function render()
    {
        // get all idea
        $ideas = Idea::with(['category', 'user', 'status'])
            // subquery to get vote id that voted by current authenticated user
            ->addSelect([
                'voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
            ])
            // ordering from latest data / latest()
            ->orderByDesc('id')
            ->withCount('votes')
            ->simplePaginate(Idea::PAGINATION_COUNT);
        return view('livewire.ideas-index', compact('ideas'));
    }
}
