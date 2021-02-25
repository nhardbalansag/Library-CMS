<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'borrow_id',
        'rated',
        'book_id'
    ];
}


