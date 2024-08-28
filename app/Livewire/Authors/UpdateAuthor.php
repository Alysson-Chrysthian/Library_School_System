<?php

namespace App\Livewire\Authors;

use App\Livewire\Traits\Messages;
use App\Models\Author;
use Exception;
use Livewire\Component;

class UpdateAuthor extends Component
{
    use Messages;

    public $id;
    public $name;

    public function rules() 
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:60', 'unique:authors,name,' . $this->id]
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

    public function mount($id)
    {
        $this->id = $id;
        $author = Author::find($id);

        if ($author == null) {
            return redirect()->back();
        }

        $this->name = $author->name;
    }

    public function update()
    {
        $this->clear_messages();

        $validatedData = $this->validate();

        try {
            Author::where('id', $this->id)->update($validatedData);
        } catch (Exception $e) {
            $this->setMessage(__('message.update_failed', [
                'attribute' => 'autor'
            ]), 'error');
            return;
        } 

        $this->setMessage(__('message.update_success', [
            'attribute' => 'autor',
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.authors.update-author')
            ->slot('content');
    }
}
