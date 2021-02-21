<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\Book;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class CreateBook extends Component
{

    use WithFileUploads;

    public $BookCategoryId, $title, $description, $status, $image_path, $book_inventory_count, $language, $editor, $translator, $reviewer, $illustrator, $contributor, $publisher, $publisher_city, $publication_date, $isbn, $author;

    public $formdata = [
        'BookCategoryId'  => 'required|numeric',
        'title'  => 'required',
        'description'  => 'required',
        'language'  => 'required',
        'editor'  => 'required',
        'translator'  => 'required',
        'reviewer'  => 'required',
        'illustrator'  => 'required',
        'contributor'  => 'required',
        'publisher'  => 'required',
        'publisher_city'  => 'required',
        'publication_date'  => 'required',
        'isbn'  => 'required',
        'author'  => 'required',
        'status'  => 'required',
        'image_path'  => 'required|image',
        'book_inventory_count' => 'required|numeric|min:1'
    ];

    public function render()
    {
        $data = DB::table('book_categories')->get();

        return view('livewire.admin.create-book', ["book_category" => $data]);
    }

    public function createBook(){

        $validatedData = $this->validate($this->formdata);

        $thumbnail = $this->image_path->store('photos');

        $formData = [
            'BookCategoryId' =>  $this->BookCategoryId,
            'title' => $this->title,
            'description' => $this->description,
            'language' => $this->language,
            'editor' => $this->editor,
            'translator' => $this->translator,
            'reviewer' => $this->reviewer,
            'illustrator' => $this->illustrator,
            'contributor' => $this->contributor,
            'publisher' => $this->publisher,
            'publisher_city' => $this->publisher_city,
            'publication_date' => $this->publication_date,
            'isbn' => $this->isbn,
            'author' => $this->author,
            'status' => $this->status,
            'image_path' => $thumbnail,
            'book_inventory_count' => $this->book_inventory_count
        ];

        Book::create($formData);

        session()->flash('message', 'Book created successfully');
    }
}
