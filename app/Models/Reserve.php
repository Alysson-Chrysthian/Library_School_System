<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserves';

    protected $casts = [
        'reserve_date' => 'datetime'
    ];
    
    protected $fillable = [
        'reserve_date',
        'book_id',
        'student_registration',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'registration', 'student_registration');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
