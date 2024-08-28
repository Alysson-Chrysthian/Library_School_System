<?php

namespace App\Livewire\Students;

use App\Livewire\Traits\Messages;
use App\Models\Student;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddStudentForm extends Component
{
    use Messages;

    public $registration;
    public $name;
    public $class;
    public $course;
    public $phone;
    public $birthday;

    public function rules()
    {
        return [
            'registration' => ['required', 'integer', 'digits:7', 'unique:students,registration'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'class' => ['required', 'numeric', 'digits:1', Rule::in(['1', '2', '3'])],
            'course' => ['required', 'alpha', 'string', 'size:1', Rule::in(['A', 'B', 'C', 'D'])],
            'phone' => ['required', 'string', 'regex:/^\(([0-9]{2})\)\s?([0-9]{4,5})\-([0-9]{4,5})$/'],
            'birthday' => ['required', 'date'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'registration' => 'matricula',
            'name' => 'nome',
            'class' => 'serie',
            'course' => 'turma',
            'phone' => 'telefone',
            'birthday' => 'data de nascimento',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->clear_messages();

        $validatedData = $this->validate();

        $validatedData['phone'] = str_replace(' ', '', $validatedData['phone']);

        try {
            Student::create($validatedData);
        } catch (Exception $e) {
            $this->setMessage(__('message.register_failed', [
                'attribute' => 'aluno',
            ]), 'error');
            return;
        }

        $this->setMessage(__('message.register_success', [
            'attribute' => 'aluno',
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.students.add-student-form')
            ->slot('content');
    }
}
