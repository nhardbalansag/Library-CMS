<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DeleteBook extends Component
{

    public $bookId;

    public function render()
    {
        return view('livewire.admin.delete-book');
    }

    public function delete(){

        $affected = DB::table('books')
                    ->where('id', $this->bookId)
                    ->delete();

        session()->flash('message', 'you have delete book Succesfully');

        return redirect()->to('/book/book-list');
    }
}
