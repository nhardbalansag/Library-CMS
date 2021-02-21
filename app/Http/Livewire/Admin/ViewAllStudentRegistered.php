<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ViewAllStudentRegistered extends Component
{

    use WithPagination;

    public $student;

    public function render()
    {

        $data['studentInfo'] = DB::table('users')
                        ->where('role', 'student')
                        ->paginate(10);

        if(!empty($this->student)){
            $data['studentInfo'] = $this->searchStudent();
        }

        $this->resetPage();

        return view('livewire.admin.view-all-student-registered', $data);
    }

    public function searchStudent(){

        $data = DB::table('users')
                        ->where('role', 'student')
                        ->where('id_number', 'like', '%' . $this->student . '%')
                        ->paginate(10);

        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        return $data;

    }

    public function descending(){

        $data['studentInfo'] = DB::table('users')
                            ->where('role', 'student')
                            ->orderBy('created_at','DESC')
                            ->paginate(10);

        session()->flash('message', 'Descending List');

        return $data;

    }

    public function ascending(){

        $data['studentInfo'] = DB::table('users')
                            ->where('role', 'student')
                            ->orderBy('created_at','ASC')
                            ->paginate(10);

        session()->flash('message', 'Ascending List');

        return $data;

    }
}
