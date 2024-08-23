<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Exception;
use Livewire\Component;

class AddCategoryForm extends Component
{

    public $warning_message;
    public $success_message;
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
        $this->success_message = null;
        $this->warning_message = null;

        $validatedData = $this->validate();

        try {
            Category::create($validatedData);
        } catch (Exception $e) {
            $this->warning_message = __('message.register_failed', [
                'attribute' => 'categoria',
            ]);
            return;
        }

        $this->success_message = __('message.register_success', [
            'attribute' => 'categoria'
        ]);
    }

    public function render()
    {
        return view('livewire.categories.add-category-form')
            ->slot('content');
    }

}
