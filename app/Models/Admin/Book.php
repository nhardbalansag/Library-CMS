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
        'status',
        'image_path',
        'book_inventory_count'
    ];

}
