<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Admin\Penalty;

class ViewBorrowedBook extends Component
{

    public $BorrowId;

    public function render()
    {

        $now = Carbon::now();

        $data['book'] = DB::table('borrow_books')
                        ->join('books', 'books.id', '=', 'borrow_books.book_id')
                        ->where('borrow_books.id', $this->BorrowId)
                        ->select('books.*', 'borrow_books.returnDate as returnDate', 'borrow_books.status as borrowStatus')
                        ->first();


        if($data['book']->returnDate === $now){

            $formData = [
                'borrow_books_id' =>  $this->BorrowId,
                'user_id ' => $data['book']->user_id,
                'penalty_amount' => 20
            ];

            Penalty::create($formData);
        }

        return view('livewire.admin.view-borrowed-book', $data);
    }

    public function returnBook(){

        $affected = DB::table('borrow_books')
                    ->where('id', $this->BorrowId)
                    ->update(['status' => 'return']);

        $book = DB::table('borrow_books')
                ->join('books', 'books.id', '=', 'borrow_books.book_id')
                ->where('borrow_books.id', $this->BorrowId)
                ->select('books.*')
                ->first();

        $count = $book->book_inventory_count + 1;

        $affected = DB::table('books')
                    ->where('id', $book->id)
                    ->update(['book_inventory_count' => $count]);

        $message = 'Successfully move book to Return';
        session()->flash('message', $message);
    }
}
