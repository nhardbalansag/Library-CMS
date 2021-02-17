<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            //book id
            $table->integer('BookCategoryId')->unsigned();
            $table->foreign('BookCategoryId')
            ->references('id')
            ->on('book_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('status');
            $table->string('image_path');
            $table->integer('book_inventory_count');
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
        Schema::dropIfExists('books');
    }
}
