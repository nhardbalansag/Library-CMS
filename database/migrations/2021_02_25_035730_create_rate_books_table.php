<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_books', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('borrow_id')->unsigned();
            $table->foreign('borrow_id')
            ->references('id')
            ->on('borrow_books')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')
            ->references('id')
            ->on('books')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('rated');
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
        Schema::dropIfExists('rate_books');
    }
}
