<?php

namespace App\Livewire\Borrows;

use App\Livewire\Traits\Messages;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddBorrowForm extends Component
{
    use Messages;

    public $student;
    public $book;
    public $return_date;

    public function rules() 
    {
        return [
            'student' => ['required', 'integer', 'exists:students,registration'],
            'book' => ['required', 'integer', 'exists:books,id'],
            'return_date' => ['required', 'date'],
        ];
    }

    public function validationAttributes() 
    {
        return [
            'student' => 'aluno',
            'book' => 'livro',
            'return_date' => 'dia de devolução',
        ];
    }

    public function updated($propertyName) 
    {
        $this->validateOnly($propertyName);
    }

    public function save() 
    {
        $this->message = null;
        $this->status = null;

        $this->validate();

        $book = Book::find($this->book);

        if ($book->avaliables - $book->borrowed <= 0) {
            return redirect()->back()->with([
                'message' => 'O livro requerido não possui copias disponiveis'
            ]);
        }

        try {
            Borrow::create([
                'student_registration' => $this->student,
                'book_id' => $this->book,
                'return_date' => $this->return_date,
                'librarian_id' => Auth::id(),
            ]);
        } catch (Exception $e) {
            $this->setMessage(__('message.register_failed', [
                'attribute' => 'empréstimo',
            ]), 'error');
            return;
        }

        $book->update([
            'borrowed' => ($book->borrowed += 1),
        ]);

        $this->setMessage(__('message.register_success', [
            'attribute' => 'empréstimo',
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.borrows.add-borrow-form', [
            'students' => Student::all(),
            'books' => Book::all(),
        ])
            ->slot('content');
    }
}
