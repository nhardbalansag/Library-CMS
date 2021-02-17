<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function createBookCategory(){
        return view('pages.Book-category.create-book-category');
    }

    public function createBook(){
        return view('pages.Book.create-book');
    }

    public function bookList(){

        return view('pages.Book.book-list');
    }

    public function AvailableBooks(){

        return view('pages.Book.book-list-available');
    }

    public function searchbooks(Request $request){

        $search = $request->input('bookSearch');

        $data['books']   = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->orWhere('books.title', 'like', '%' . $search . '%')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('books.status', 'publish')
                        ->paginate(10);

        return view('pages.Book.book-list-available', $data);
    }

    public function searchbookList(Request $request){

        $search = $request->input('bookSearch');

        $data['books']   = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->orWhere('books.title', 'like', '%' . $search . '%')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->paginate(10);

        return view('pages.Book.book-list', $data);
    }

    public function bookListBorrowed(){

        return view('pages.Book.borrowed-books');
    }

    public function bookListReturned(){

        return view('pages.Book.returned-books');
    }

    public function studentListBorrowed(){

        return view('pages.Book.borrowed-student');
    }


    public function studentBookBorrowed($id){

        return view('pages.Book.student-book-borrowed', ['id' => $id]);
    }
}
