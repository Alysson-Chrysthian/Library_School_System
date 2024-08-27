<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Librarian extends User {
    use HasFactory, Authenticatable;

    protected $table = 'librarians';

    protected $fillable = [
        'email',
        'password',
    ];
}
