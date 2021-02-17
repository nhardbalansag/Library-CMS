<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ReturnedBooksList extends Component
{
    public function render()
    {

        $data['booksborrowed'] = DB::table('borrow_books')
        ->join('books', 'books.id', '=', 'borrow_books.book_id')
        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
        ->select('books.*', 'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed')
        ->where('borrow_books.status', 'returned')
        ->paginate(10);

        return view('livewire.dashboard.returned-books-list', $data);
    }
}
