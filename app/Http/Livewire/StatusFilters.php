<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status = 'All';
    public $status_count;

    protected $queryString = [
        'status',
    ];


    public function mount()
    {
        $this->status_count = Status::getCount();


        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function setStatus(string $status)
    {

        $this->status = $status;

        // only redirect page in show page
        // if ($this->getPreviousRouteName() === 'idea.show') {
        return redirect()->route('idea.index', [
            'status' => $this->status,
        ]);
        // }
    }

    private function getPreviousRouteName()
    {
        // get previous route name
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
