<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class IndexBooks extends Component
{
    use WithPagination;
    
    public $search;

    public function delete($id)
    {
        Book::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.books.index-books', [
            'books' => Book::whereHas('author', function ($query) {
                $query->where('name', 'like', '%'. $this->search .'%');
            })
            ->orWhereHas('category', function ($query) {
                $query->where('category', 'like', '%'. $this->search .'%');
            })
            ->orWhereAny([
                'title',
                'cdd',
                'sector',
                'shelf',
                'bookcase',
                'avaliables',
                'author_id',
                'category_id',
            ], 'like', '%'. $this->search .'%')->paginate(10),
        ])
            ->slot('content');
    }
}
