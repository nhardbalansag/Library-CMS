<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ReturnedBookList extends Component
{

    use WithPagination;

    public $booktitle;

    public function render()
    {
        $data['books'] = DB::table('borrow_books')
                        ->join('books', 'books.id', '=', 'borrow_books.book_id')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*','book_categories.updated_at as returnbookDate',  'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed', 'borrow_books.returnDate as returnDate')
                        ->where('borrow_books.status', 'return')
                        ->paginate(10);

        if(!empty($this->booktitle)){
            $data['books'] = $this->searchBooks();
        }

        $this->resetPage();

        return view('livewire.admin.returned-book-list',$data);
    }

    public function searchBooks(){

        $data = DB::table('borrow_books')
                ->join('books', 'books.id', '=', 'borrow_books.book_id')
                ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                ->select('books.*','book_categories.updated_at as returnbookDate',  'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed', 'borrow_books.returnDate as returnDate')
                ->where('books.title', 'like', '%' . $this->booktitle . '%')
                ->where('borrow_books.status', 'return')
                ->paginate(10);

        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        return $data;

    }

    public function descending(){

        $data['books'] = DB::table('borrow_books')
                        ->join('books', 'books.id', '=', 'borrow_books.book_id')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*','book_categories.updated_at as returnbookDate',  'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed', 'borrow_books.returnDate as returnDate')
                        ->where('borrow_books.status', 'return')
                        ->orderBy('books.created_at','DESC')
                        ->paginate(10);

        session()->flash('message', 'Descending List');

        return $data;

    }

    public function ascending(){

        $data['books'] = DB::table('borrow_books')
                        ->join('books', 'books.id', '=', 'borrow_books.book_id')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*','book_categories.updated_at as returnbookDate',  'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed', 'borrow_books.returnDate as returnDate')
                        ->where('borrow_books.status', 'return')
                        ->orderBy('books.created_at','ASC')
                        ->paginate(10);

        session()->flash('message', 'Ascending List');

        return $data;

    }
}
