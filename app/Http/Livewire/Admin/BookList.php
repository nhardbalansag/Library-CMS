<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BookList extends Component
{
    public function render()
    {
        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->paginate(10);

        return view('livewire.admin.book-list', $data);
    }

    public function sortbyStatus(){

    }

    public function search(){

    }
}
