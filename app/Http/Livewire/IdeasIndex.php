<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    // use WithPagination;

    public function render()
    {

        $statuses = Status::all()->pluck('id', 'name');

        // get all idea
        $ideas = Idea::with(['category', 'user', 'status'])
            ->when(request()->status && request()->status !== 'All', function ($query) use ($statuses) {
                return $query->where('status_id', $statuses[request()->status]);
            })
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
