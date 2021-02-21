<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class BorrowedStudentList extends Component
{

    use WithPagination;

    public $studentNumber;

    public function render()
    {
        $data['books'] = DB::table('borrow_books')
                        ->join('users', 'users.id', '=', 'borrow_books.user_id')
                        ->select(
                            'users.first_name as first_name',
                            'users.last_name as last_name',
                            'users.id_number as id_number',
                            'users.id as userId'
                            )
                        ->groupBy(
                            'first_name',
                            'last_name',
                            'id_number',
                            'userId'
                        )
                        ->paginate(10);

        if(!empty($this->studentNumber)){
            $data['books'] = $this->searchBooks();
        }

        $this->resetPage();

        return view('livewire.admin.borrowed-student-list', $data);
    }

    public function searchBooks(){

        $data = DB::table('borrow_books')
                ->join('users', 'users.id', '=', 'borrow_books.user_id')
                ->select(
                    'users.first_name as first_name',
                    'users.last_name as last_name',
                    'users.id_number as id_number',
                    'users.id as userId'
                    )
                ->where('users.id_number', $this->studentNumber)
                ->groupBy(
                    'first_name',
                    'last_name',
                    'id_number',
                    'userId'
                )
                ->paginate(10);

        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        return $data;

    }
}
