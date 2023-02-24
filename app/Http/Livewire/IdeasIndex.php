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
    public $filter;
    public $search;

    protected $queryString = [
        'status',
        'category',
        'filter',
        'search'
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

    public function updatingSearch()
    {

        $this->resetPage(); // reset pagination page on category change

    }
    public function updatingFilter()
    {
        $this->resetPage(); // reset pagination page on category change

    }

    public function updatedFilter()
    {
        if ($this->filter === 'My Ideas' && !auth()->check()) return redirect()->route('login');
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

        // filter closure
        $StatusFilter = fn ($query) => $query->where('status_id', $statuses->get($this->status));
        $CategoryFilter = fn ($query) =>  $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));

        $OtherFilters = function ($query, $filter = 'No Filter') {
            if ($filter === 'Top Voted') return $query->orderByDesc('votes_count');
            if ($filter === 'My Ideas') return $query->where('user_id', auth()->user()->id);
            if ($filter === 'Spam Ideas') return $query->where('spam_reports', '>', 0)->orderByDesc('spam_reports');
        };

        $Search = fn ($query) => $query->where('title', 'like', '%' . $this->search . '%');
        // subquery to get vote id that voted by current authenticated user
        $subSelect = [
            'voted_by_user' => Vote::select('id')
                ->where('user_id', auth()->id())
                ->whereColumn('idea_id', 'ideas.id')
        ];


        // get all idea
        $ideas = Idea::with(['category', 'user', 'status'])
            ->when($this->status && $this->status !== 'All', $StatusFilter)
            ->when($this->category && $this->category !== 'All Categories', $CategoryFilter)
            ->when($this->filter && $this->filter === 'Top Voted', fn ($query) => $OtherFilters($query, $this->filter))
            ->when($this->filter && $this->filter === 'My Ideas', fn ($query) => $OtherFilters($query, $this->filter))
            ->when($this->filter && $this->filter === 'Spam Ideas', fn ($query) => $OtherFilters($query, $this->filter))
            ->when(strlen($this->search) >= 3, $Search)
            ->addSelect($subSelect)
            ->orderByDesc('id')   // ordering from latest data / latest()
            ->withCount('votes')
            ->withCount('comments')
            ->simplePaginate()
            ->withQueryString();

        return view('livewire.ideas-index', [
            'categories' => $categories,
            'ideas' => $ideas
        ]);
    }
}
