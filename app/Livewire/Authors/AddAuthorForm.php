<?php

namespace App\Livewire\Authors;

use App\Livewire\Traits\Messages;
use App\Models\Author;
use Exception;
use Livewire\Component;
use Illuminate\Support\Str;

class AddAuthorForm extends Component
{
    use Messages;

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
        $this->message = null;
        $this->status = null;

        $validatedData = $this->validate();
        
        try {
            Author::create($validatedData);
        } catch (Exception $e) {
            $this->setMessage(__('message.register_failed', [
                'attribute' => 'autor',
            ]), 'error');
            return;
        }

        $this->setMessage(__('message.register_success', [
            'attribute' => 'autor',
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.authors.add-author-form')
            ->slot('content');
    }

}
