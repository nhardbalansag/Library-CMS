<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student\{BorrowBook, RateBook};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function ViewOneBook($id){

        $data = DB::table('books')
            ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
            ->select('books.*', 'book_categories.title as bookCategoryTitle')
            ->where('books.status', 'publish')
            ->where('books.id', $id)
            ->first();

        return response()->json($data, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function getBook(Request $request){

        $mutable = Carbon::now();
        $modifiedMutable = $mutable->add(4, 'day');

        $bookCount  = DB::table('books')->where('id', $request->bookId)->first();

        if($bookCount->book_inventory_count === 0){

            $response = false;

        }else{
            BorrowBook::create([
                'book_id' => $request->bookId,
                'user_id' => Auth::user()->id,
                'status' => 'pending',
                'returnDate' => $modifiedMutable
            ]);

            $response = true;
        }

        return response()->json($response, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function myBooks($limit){

        $data = DB::table('borrow_books')
            ->join('books', 'books.id', '=', 'borrow_books.book_id')
            ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
            ->select('books.*', 'book_categories.title as bookCategoryTitle','borrow_books.id as borrowId', 'borrow_books.status as borrowStatus', 'borrow_books.created_at as dateBorrowed', 'borrow_books.returnDate as dateReturned')
            ->where('borrow_books.user_id', Auth::user()->id)
            ->paginate($limit);

        return response()->json($data, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function searchBooks($limit, $data){

        $result = DB::table('books')
                ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                ->select('books.*', 'book_categories.title as bookCategoryTitle')
                ->where('books.status', 'publish')
                ->where('books.title', 'like', '%' . $data . '%')
                ->paginate($limit);

        return response()->json($result, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

    }

    public function rateBookReturn(Request $request){

        RateBook::create([
            'user_id' => Auth::user()->id,
            'borrow_id' => $request->borrrowId,
            'rated' => true,
            'book_id' => $request->bookId
        ]);

        $response = "thank you for your rating";

        return response()->json($response, 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

}
