<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class IndexCategory extends Component
{
    public $search;

    public function delete($id)
    {
        Category::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.categories.index-category', [
            'categories' => Category::whereAny([
                'id',
                'category',
            ], 'like', '%'. $this->search .'%')->paginate(10),
        ])
            ->slot('content');
    }
}
