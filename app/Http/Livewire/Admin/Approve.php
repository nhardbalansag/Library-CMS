<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Approve extends Component
{

    public $borrowId, $userId;

    public function render()
    {
        return view('livewire.admin.approve');
    }

    public function approve(){

        $affected = DB::table('borrow_books')
                    ->where('id', $this->borrowId)
                    ->where('user_id', $this->userId)
                    ->update(['status' => "borrowed"]);


        session()->flash('message', 'you have approved the student');

        return redirect()->to('/one-student-book-borrowed-list/' . $this->userId);
    }
}
