<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_books', function (Blueprint $table) {
            $table->increments('id');
             //book id
             $table->integer('book_id')->unsigned();
             $table->foreign('book_id')
             ->references('id')
             ->on('books')
             ->onDelete('cascade')
             ->onUpdate('cascade');
              //user id
              $table->integer('user_id')->unsigned();
              $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
              $table->string('status');
              $table->dateTime('returnDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_books');
    }
}
