<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'cdd',
        'sector',
        'shelf',
        'bookcase',
        'avaliables',
        'author_id',
        'category_id',
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function loans() 
    {
        return $this->hasMany(Borrow::class);
    }
}
