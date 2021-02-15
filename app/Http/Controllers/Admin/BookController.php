<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function createBookCategory(){
        return view('pages.book-category.create-book-category');
    }

    public function createBook(){
        return view('pages.book.create-book');
    }

    public function bookList(){

        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->paginate(10);

        return view('pages.book.book-list', $data);
    }

    public function AvailableBooks(){

        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('books.status', 'publish')
                        ->paginate(10);

        return view('pages.book.book-list-available', $data);
    }

    public function searchbooks(Request $request){

        $search = $request->input('bookSearch');

        $data['books']   = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->orWhere('books.title', 'like', '%' . $search . '%')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('books.status', 'publish')
                        ->paginate(10);

        return view('pages.book.book-list-available', $data);
    }

    public function searchbookList(Request $request){

        $search = $request->input('bookSearch');

        $data['books']   = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->orWhere('books.title', 'like', '%' . $search . '%')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->paginate(10);

        return view('pages.book.book-list', $data);
    }
}
