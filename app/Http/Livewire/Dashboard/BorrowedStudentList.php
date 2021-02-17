<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BorrowedStudentList extends Component
{
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
                        ->paginate(10);

        return view('livewire.dashboard.borrowed-student-list', $data);
    }
}
