<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primaryKey = 'registration';

    protected $fillable = [
        'registration',
        'name',
        'class',
        'phone',
        'birthday',
    ];
}
