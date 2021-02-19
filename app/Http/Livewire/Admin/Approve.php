<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Approve extends Component
{

    public $borrowId, $userId, $bookId;

    public function render()
    {
        return view('livewire.admin.approve');
    }

    public function approve(){

        $mutable = Carbon::now();
        $modifiedMutable = $mutable->add(4, 'day');

        $book = DB::table('books')->where('id', $this->bookId)->first();

        if($book->book_inventory_count !== 0){

            $affected = DB::table('borrow_books')
                    ->where('id', $this->borrowId)
                    ->where('user_id', $this->userId)
                    ->update(['status' => "borrowed", "returnDate" => $modifiedMutable]);

            $count = $book->book_inventory_count - 1;

            $affected = DB::table('books')
                    ->where('id', $this->bookId)
                    ->update(['book_inventory_count' => $count]);

            $book = DB::table('books')->where('id', $this->bookId)->first();

            if($book->book_inventory_count === 0){
                $affected = DB::table('books')
                    ->where('id', $this->bookId)
                    ->update(['status' => 'pending']);
            }

            $response = true;
            $message = 'you have approved the student';
            session()->flash('message', $message);
        }else{
            $message = "inventory count for this book is already reached. you cannot approved books anymore.";
            $response = false;

            session()->flash('error', $message);
        }

        return redirect()->to('/one-student-book-borrowed-list/' . $this->userId);
    }
}
