<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-student', [StudentController::class, 'register']);
Route::post('/login-student', [StudentController::class, 'login']);

//AUTH
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/view-all-available-books/{limit}', [BookController::class, 'getAvailableBooks']);
    Route::get('/view-one-available-book/{id}', [BookController::class, 'ViewOneBook']);
    Route::post('/get-book', [BookController::class, 'getBook']);
    Route::get('/get-mybook/{limit}', [BookController::class, 'myBooks']);
});
