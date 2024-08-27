<?php

namespace App\Livewire\Borrows;

use App\Models\Book;
use App\Models\Borrow;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class IndexBorrows extends Component
{
    use WithPagination;

    public $search;

    public function return($id)
    {
        $loan = Borrow::find($id);
        $book = Book::find($loan->book_id);
        
        try {
            $loan->delete();
            $book->update([
                'borrowed' => ($book->borrowed -= 1)
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with([
                'message' => 'Não foi possivel fazer a devolução deste livro por favor tente novamente'
            ]);
        }
    }

    public function render()
    {
        $loans = Borrow::whereHas('book', function ($query) {
            $query->whereAny([
                'title',
                'cdd',
                'sector',
                'shelf',
                'bookcase',
                'avaliables',
            ], 'like', '%'. $this->search .'%');
        })->orWhereHas('librarian', function ($query) {
            $query->whereAny([
                'email',
                'password',
            ], 'like', '%'. $this->search .'%');
        })->orWhereHas('student', function ($query) {
            $query->whereAny([
                'registration',
                'name',
                'class',
                'phone',
                'birthday',
            ], 'like', '%'. $this->search .'%');
        })->orWhereAny([
            'return_date',
            'book_id',
            'librarian_id',
            'student_registration',
        ], 'like', '%'. $this->search .'%')->paginate(10);

        return view('livewire.borrows.index-borrows', [
            'loans' => $loans,
        ])
            ->slot('content');
    }
}
