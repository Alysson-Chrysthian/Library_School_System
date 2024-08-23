<?php

namespace App\Livewire\Categories;

use App\Livewire\Traits\Messages;
use App\Models\Category;
use Exception;
use Livewire\Component;

class AddCategoryForm extends Component
{
    use Messages;

    public $category;

    public function rules()
    {
        return [
            'category' => ['required', 'string', 'min:2', 'max:60', 'unique:categories,category'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'category' => 'categoria',
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
            Category::create($validatedData);
        } catch (Exception $e) {
            $this->setMessage(__('message.register_failed', [
                'attribute' => 'categoria',
            ]), 'error');
            return;
        }

        $this->setMessage(__('message.register_success', [
            'attribute' => 'categoria'
        ]), 'success');
    }

    public function render()
    {
        return view('livewire.categories.add-category-form')
            ->slot('content');
    }

}
