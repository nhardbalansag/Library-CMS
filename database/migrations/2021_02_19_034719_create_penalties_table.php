<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->integer('borrow_books_id')->unsigned();
             $table->foreign('borrow_books_id')
             ->references('id')
             ->on('borrow_books')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')
             ->references('id')
             ->on('users')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->integer('penalty_amount');
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
        Schema::dropIfExists('penalties');
    }
}
