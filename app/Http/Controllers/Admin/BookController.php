<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function createBookCategory(){
        return view('pages.book-category.create-book-category');
    }

    public function createBook(){
        return view('pages.book.create-book');
    }

    public function bookList(){
        return view('pages.book.book-list');
    }

}
