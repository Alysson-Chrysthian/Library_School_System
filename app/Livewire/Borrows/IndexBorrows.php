<?php

namespace App\Livewire\Borrows;

use App\Livewire\Traits\Messages;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reserve;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IndexBorrows extends Component
{
    use WithPagination, Messages;

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

    public function give($id)
    {
        $loan = Borrow::find($id);
        $reserve = Reserve::where('book_id', $loan->book_id)->first();
        $book = Book::find($loan->book_id);

        try {
            Borrow::create([
                'return_date' => Carbon::now()->addWeeks(2),
                'late' => 0,
                'book_id' => $loan->book_id,
                'librarian_id' => Auth::id(),
                'student_registration' => $reserve->student->registration,
            ]);

            $loan->delete();
            $reserve->delete();
        } catch (Exception $e) {
            $this->setMessage('A operação não pode ser concluida', 'error');
            return;
        }

        $this->setMessage('A operação foi concluida com sucesso', 'success');
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
