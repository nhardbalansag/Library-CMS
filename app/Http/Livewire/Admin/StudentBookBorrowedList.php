<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class StudentBookBorrowedList extends Component
{

    use WithPagination;

    public $booktitle, $userId;

    public function render()
    {

        $data['books'] = DB::table('borrow_books')
                        ->join('books', 'books.id', '=', 'borrow_books.book_id')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->join('users', 'users.id', '=', 'borrow_books.user_id')
                        ->select(
                            'books.*',
                            'book_categories.title as bookCategoryTitle',
                            'borrow_books.id as borrowId',
                            'borrow_books.status as borrowStatus',
                            'borrow_books.created_at as dateBorrowed',
                            'users.first_name as first_name',
                            'users.last_name as last_name',
                            'users.id_number as id_number',
                            'users.id as userId'
                            )
                        ->where('users.id', $this->userId)
                        ->paginate(10);

        if(!empty($this->booktitle)){
            $data['books'] = $this->searchBooks();
        }

        $this->resetPage();

        return view('livewire.admin.student-book-borrowed-list', $data);
    }

    public function searchBooks(){

        $data = DB::table('borrow_books')
                ->join('books', 'books.id', '=', 'borrow_books.book_id')
                ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                ->select('books.*', 'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed')
                ->join('users', 'users.id', '=', 'borrow_books.user_id')
                ->select(
                    'books.*',
                    'book_categories.title as bookCategoryTitle',
                    'borrow_books.id as borrowId',
                    'borrow_books.status as borrowStatus',
                    'borrow_books.created_at as dateBorrowed',
                    'users.first_name as first_name',
                    'users.last_name as last_name',
                    'users.id_number as id_number',
                    'users.id as userId'
                    )
                ->where('books.title', 'like', '%' . $this->booktitle . '%')
                ->where('users.id', $this->userId)
                ->get();

        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        return $data;

    }

}
