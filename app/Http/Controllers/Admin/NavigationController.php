<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavigationController extends Controller
{
    public function home(){

        return view('dashboard');
    }

    public function userList(){

        return view('pages.edit-user');
    }

    public function tableList(){

        return view('pages.table_list');
    }
}
