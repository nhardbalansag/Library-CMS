<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\Book;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class CreateBook extends Component
{

    use WithFileUploads;

    public $BookCategoryId, $title, $description, $status, $image_path;

    public $formdata = [
        'BookCategoryId'  => 'required|numeric',
        'title'  => 'required',
        'description'  => 'required',
        'status'  => 'required',
        'image_path'  => 'required|image'
    ];

    public function render()
    {
        $data = DB::table('book_categories')->get();

        return view('livewire.admin.create-book', ["book_category" => $data]);
    }

    public function createBook(){

        $validatedData = $this->validate($this->formdata);

        $formData = [
            'BookCategoryId' =>  $this->BookCategoryId,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'image_path' => $this->image_path->store('photos')
        ];

        Book::create($validatedData);

        session()->flash('message', 'Book created successfully');
    }
}
