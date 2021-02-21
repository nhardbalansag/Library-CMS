<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashBoardSideBar extends Component
{

    public $activePage;

    public function render()
    {
        $data['bookCategory'] = DB::table('book_categories')->get();

        return view('livewire.admin.dash-board-side-bar', $data);
    }
}
