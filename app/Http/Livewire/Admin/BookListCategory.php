<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class BookListCategory extends Component
{

    use WithPagination;

    public $booktitle, $BookCategoryId;

    public function render()
    {

        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('book_categories.id', $this->BookCategoryId)
                        ->paginate(10);

        if(!empty($this->booktitle)){
            $data['books'] = $this->searchBooks();
        }

        $this->resetPage();

        return view('livewire.admin.book-list-category', $data);
    }

    public function searchBooks(){

        $data = DB::table('books')
                ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                ->select('books.*', 'book_categories.title as bookCategoryTitle')
                ->where('books.title', 'like', '%' . $this->booktitle . '%')
                ->where('book_categories.id', $this->BookCategoryId)
                ->paginate(10);

        session()->flash('message', 'Your search returned ' . count($data) . ' item(s)');

        return $data;

    }

    public function descending(){

        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('book_categories.id', $this->BookCategoryId)
                        ->orderBy('books.created_at','DESC')
                        ->paginate(10);

        session()->flash('message', 'Descending List');

        return $data;

    }

    public function ascending(){

        $data['books']  = DB::table('books')
                        ->join('book_categories', 'book_categories.id', '=', 'books.BookCategoryId')
                        ->select('books.*', 'book_categories.title as bookCategoryTitle')
                        ->where('book_categories.id', $this->BookCategoryId)
                        ->orderBy('books.created_at','ASC')
                        ->paginate(10);

        session()->flash('message', 'Ascending List');

        return $data;

    }
}


