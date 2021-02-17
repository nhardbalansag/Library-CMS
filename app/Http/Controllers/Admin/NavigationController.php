<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavigationController extends Controller
{
    public function home(){

        $data['bookBorrowedCount'] = DB::table('borrow_books')
                                ->where('status', 'borrowed')
                                ->count();

        $data['studentCount'] = DB::table('users')
                            ->where('role', 'student')
                            ->count();

        return view('dashboard', $data);
    }

    public function userList(){

        return view('pages.edit-user');
    }

    public function tableList(){

        return view('pages.table_list');
    }
}
