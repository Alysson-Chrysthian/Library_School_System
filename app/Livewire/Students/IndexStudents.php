<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class IndexStudents extends Component
{
    use WithPagination;

    public $search;

    public function delete($registration) {
        Student::find($registration)->delete();
    }

    public function render()
    {
        return view('livewire.students.index-students', [
            'students' => Student::whereAny([
                'registration',
                'name',
                'class',
                'course',
                'phone',
                'birthday',
            ], 'like', '%'. $this->search .'%')->paginate(10),
        ])
            ->slot('content');
    }
}
