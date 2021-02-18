<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Decline extends Component
{
    public $borrowId, $userId;

    public function render()
    {
        return view('livewire.admin.decline');
    }

    public function decline(){

        $affected = DB::table('borrow_books')
                    ->where('id', $this->borrowId)
                    ->where('user_id', $this->userId)
                    ->update(['status' => "decline"]);


        session()->flash('error', 'you have declined the student');

        return redirect()->to('/one-student-book-borrowed-list/' . $this->userId);
    }
}
