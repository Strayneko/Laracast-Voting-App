<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $category = 1;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'description' => 'required|min:4',
        'category' => 'required|integer',

    ];

    public function createIdea()
    {
        // check user login status
        if (!auth()->check()) abort(403);

        // validate input
        $this->validate();

        Idea::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'status_id' => 1,
            'title' => $this->title,
            'description' => $this->description,
        ]);


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
