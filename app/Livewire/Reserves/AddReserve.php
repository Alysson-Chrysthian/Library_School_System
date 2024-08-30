<?php

namespace App\Livewire\Reserves;

use App\Livewire\Traits\Messages;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reserve;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Livewire\Component;

class AddReserve extends Component
{
    use Messages;

    public $student_registration;
    public $book_id;

    public function rules()
    {
        return [
            'student_registration' => ['required', 'integer', 'digits:7', 'exists:students,registration'],
            'book_id' => ['required', 'integer', 'exists:books,id'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'student_registration' => 'aluno',
            'book_id' => 'livro',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->clear_messages();

        $this->validate();

        try {
            Reserve::create([
                'reserve_date' => Carbon::now(),
                'book_id' => $this->book_id,
                'student_registration' => $this->student_registration,
            ]);
        } catch (Exception $e) {
            $this->setMessage(__('message.register_failed', [
                'attribute' => 'reserva',
            ]), 'error');
            return;
        }

        $this->setMessage(__('message.register_success', [
            'attribute' => 'reserva',
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.reserves.add-reserve', [
            'students' => Student::all(),
            'books' => Book::all(),
        ])
            ->slot('content');
    }
}
