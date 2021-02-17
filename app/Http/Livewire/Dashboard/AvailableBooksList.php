<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AvailableBooksList extends Component
{
    public function render()
    {

        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('books.status', 'publish')
                        ->paginate(10);

        return view('livewire.dashboard.available-books-list', $data);
    }
}
