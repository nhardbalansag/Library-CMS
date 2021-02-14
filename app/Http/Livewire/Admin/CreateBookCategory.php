<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\BookCategory;
use Illuminate\Support\Facades\DB;

class CreateBookCategory extends Component
{
    public $title, $description, $status;

    public $formdata = [
        'title'  => 'required|min:5|max:50',
        'description'  => 'required|max:200',
        'status'  => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.create-book-category');
    }

    public function createBookCategory(){

        $validatedData = $this->validate($this->formdata);

        BookCategory::create($validatedData);

        session()->flash('message', 'Book category created successfully');
    }
}
