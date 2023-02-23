<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public $status;
    public $category;

    protected $queryString = [
        'status',
        'category',
    ];
    protected $listeners = ['queryStringUpdatedStatus'];

    public function mount()
    {
        $this->status = request()->status ?? 'All';
    }

    public function updatingCategory()
    {
        $this->resetPage(); // reset pagination page on category change

    }

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->resetPage(); // reset pagination page on status change
        $this->status = $newStatus;
    }

    public function render()
    {

        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all();

        // get all idea
        $ideas = Idea::with(['category', 'user', 'status'])
            ->when($this->status && $this->status !== 'All', function ($query) use ($statuses) {
                return $query->where('status_id', $statuses->get($this->status));
            })
            ->when($this->category && $this->category !== 'All Categories', function ($query) use ($categories) {
                return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
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

        return view('livewire.ideas-index', [
            'categories' => $categories,
            'ideas' => $ideas
        ]);
    }
}
