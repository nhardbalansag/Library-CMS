<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\{NavigationController, BookController};



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('user:admin')->group(function(){

        Route::get('/home', [NavigationController::class, 'home'])->name('home');
        Route::get('/user', [NavigationController::class, 'userList']);
        Route::get('/table-list', [NavigationController::class, 'tableList'])->name('table');

        // create book category
        Route::get('/book/add-book-category', [BookController::class, 'createBookCategory']);
        // create book
        Route::get('/book/add-book', [BookController::class, 'createBook']);
        // book List
        Route::get('/book/book-list', [BookController::class, 'bookList']);
        // book List available
        Route::get('/book/book-list-available', [BookController::class, 'AvailableBooks']);
        // book List available
        Route::get('/search-available-books', [BookController::class, 'searchbooks']);
        // borrowed books List
        Route::get('/book-list-borrowed', [BookController::class, 'bookListBorrowed']);
        // returned books List
        Route::get('/book-list-returned', [BookController::class, 'bookListReturned']);
        // student borrow list
        Route::get('/student-list-borrowed', [BookController::class, 'studentListBorrowed']);
        // one student book list
        Route::get('/one-student-book-borrowed-list/{id}', [BookController::class, 'studentBookBorrowed']);
        //registered student list
        Route::get('/view-all-registered-student', [BookController::class, 'registeredStudentList']);
        //generate QR
        Route::get('/view-all-registered-student/generate-Qr/{id}', [BookController::class, 'generateQr']);


        Route::get('notifications', function () {
            return view('pages.notifications');
        })->name('notifications');

        Route::get('typography', function () {
            return view('pages.typography');
        })->name('typography');
    });
});


Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

