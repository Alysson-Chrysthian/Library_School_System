<?php

namespace App\Livewire\Categories;

use App\Livewire\Traits\Messages;
use App\Models\Category;
use Exception;
use Livewire\Component;

class UpdateCategory extends Component
{
    use Messages;

    public $id;
    public $category;

    public function rules()
    {
        return [
            'category' => ['required', 'string', 'min:2', 'max:60', 'unique:categories,category,' . $this->id],
        ];
    }

    public function validationAttributes()
    {
        return [
            'cateogry' => 'categoria'
        ];
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
            Category::find($this->id)->update($validatedData);
        } catch (Exception $e) {
            $this->setMessage(__('message.update_failed', [
                'attribute' => 'categoria',
            ]), 'error');
            return;
        }

        $this->setMessage(__('message.update_success', [
            'attribute' => 'categoria',
        ]), 'success');
    }

    public function mount($id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return redirect()->back();
        }

        $this->id = $category->id;
        $this->category = $category->category;
    }

    public function render()
    {
        return view('livewire.categories.update-category')
            ->slot('content');
    }
}
