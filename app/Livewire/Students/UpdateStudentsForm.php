<?php

namespace App\Livewire\Students;

use App\Livewire\Traits\Messages;
use App\Models\Student;
use Exception;
use Livewire\Component;

class UpdateStudentsForm extends Component
{
    use Messages;

    public $student;

    public $name;
    public $phone;
    public $class;
    public $course;
    public $birthday;

    public function rules()
    {
        $validationRules = new AddStudentForm();
        $validationRules = $validationRules->rules();
        unset($validationRules['registration']);
        return $validationRules;
    }

    public function validationAttributes()
    {
        $validationAttributes = new AddStudentForm();
        $validationAttributes = $validationAttributes->validationAttributes();
        unset($validationAttributes['registration']);
        return $validationAttributes;
    }

    public function mount($registration)
    {
        $this->student = Student::find($registration);

        $student = $this->student;

        foreach ($student->toArray() as $key => $value) {
            $this->$key = $value;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->clear_messages();
        
        $validatedData = $this->validate();

        try {
            $this->student->update($validatedData);
        } catch (Exception $e) {
            $this->setMessage(__('message.update_failed', [
                'attribute' => 'aluno',
            ]), 'error');
            return;
        }

        $this->setMessage(__('message.update_success', [
            'attribute' => 'aluno',
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.students.update-students-form', [
            'student' => $this->student,
        ])
            ->slot('content');
    }
}
