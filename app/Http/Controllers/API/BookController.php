<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function getAvailableBooks($limit){

        $data = DB::table('books')
            ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
            ->select('books.*', 'book_categories.title as bookCategoryTitle')
            ->where('books.status', 'publish')
            ->paginate($limit);

        return response()->json($data, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
