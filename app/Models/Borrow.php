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
        'late',
        'book_id',
        'librarian_id',
        'student_registration',
    ];

    protected $casts = [
        'return_date' => 'datetime',
    ];

    public function librarian() 
    {
        return $this->hasOne(Librarian::class, 'id', 'librarian_id');
    }

    public function student() 
    {
        return $this->hasOne(Student::class, 'registration', 'student_registration');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
