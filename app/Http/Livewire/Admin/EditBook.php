<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\Book;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class EditBook extends Component
{
    use WithFileUploads;

    public $BookCategoryId, $title, $description, $status, $image_path, $book_inventory_count;

    public $BookId;

    public function render()
    {
        $data['book_category'] = DB::table('book_categories')->get();

        $data['bookInfo']   = DB::table('books')
                            ->where('id', $this->BookId)
                            ->first();

        return view('livewire.admin.edit-book', $data);
    }

    public function createBook(){

        $data['image']   = DB::table('books')
                            ->where('image_path', $this->image_path)
                            ->first();

        if($this->image_path !== $data['image']->image_path){
            $this->image_path = $this->image_path->store('photos');
        }

        $affected = DB::table('books')
                ->where('id', $this->BookId)
                ->update([
                    'BookCategoryId' =>  $this->BookCategoryId,
                    'title' => $this->title,
                    'description' => $this->description,
                    'status' => $this->status,
                    'image_path' => $this->image_path,
                    'book_inventory_count' => $this->book_inventory_count
                ]);

        session()->flash('message', 'Book Edited successfully');
        return redirect()->to('/edit-book/' . $this->BookId);
    }
}
