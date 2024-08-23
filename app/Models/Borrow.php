<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';

    protected $fillable = [
        'return_date',
        'borrow_date',
        'late',
        'book_id',
        'librarian_id',
        'student_registration',
    ];
}
