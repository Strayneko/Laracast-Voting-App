<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $category = 1;
    public $description;
    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
    ];

    public function createIdea()
    {
        // check user login status
        if (!auth()->check()) abort(403);

        // validate input
        $this->validate();

        $idea = Idea::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'status_id' => 1,
            'title' => $this->title,
            'description' => $this->description,
        ]);
        $idea->vote(auth()->user());

        // reset form
        $this->reset();
        return redirect()->route('idea.index')->with('success_message', 'Idea was added successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-idea', compact('categories'));
    }
}
