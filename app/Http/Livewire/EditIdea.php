<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class EditIdea extends Component
{
    public $idea;
    public $title;
    public $category;
    public $description;


    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',

    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category->id;
        $this->description = $idea->description;
    }

    public function updateIdea()
    {
        if (auth()->guest() || auth()->user()->cannot('update', $this->idea)) abort(403);

        $this->validate();

        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description
        ]);

        $this->emit('ideaWasUpdated');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.edit-idea', compact('categories'));
    }
}
