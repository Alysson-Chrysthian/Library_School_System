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

        try {
            Borrow::create([
                'student_registration' => $this->student,
                'book_id' => $this->book,
                'return_date' => $this->return_date,
                'borrow_date' => Carbon::now(),
                'librarian_id' => Auth::id(),
            ]);
        } catch (Exception $e) {
            $this->setMessage(__('message.register_failed', [
                'attribute' => 'empréstimo',
            ]), 'error');
            return;
        }

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
