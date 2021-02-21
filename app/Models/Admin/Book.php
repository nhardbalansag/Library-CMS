<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'BookCategoryId',
        'title',
        'description',
        'language',
        'editor',
        'translator',
        'reviewer',
        'illustrator',
        'contributor',
        'publisher',
        'publisher_city',
        'publication_date',
        'isbn',
        'author',
        'status',
        'image_path',
        'book_inventory_count'
    ];

}
