<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Exception;
use Livewire\Component;

class AddAuthorForm extends Component
{
    public $success_message;
    public $warning_message;
    public $name;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:60', 'unique:authors,name'],
        ];
    }
    
    public function validationAttributes()
    {
        return [
            'name' => 'nome',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save() 
    {    
        $this->success_message = null;
        $this->warning_message = null;

        $validatedData = $this->validate();
        
        try {
            Author::create($validatedData);
        } catch (Exception $e) {
            $this->warning_message = __('message.register_failed', [
                'attribute' => 'autor',
            ]);
            return;
        }

        $this->success_message = __('message.register_success', [
            'attribute' => 'autor',
        ]);
    }

    public function render()
    {
        return view('livewire.authors.add-author-form')
            ->slot('content');
    }

}
