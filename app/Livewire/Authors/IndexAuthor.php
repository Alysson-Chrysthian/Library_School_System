<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class IndexAuthor extends Component
{
    use WithPagination;

    public $search;

    public function delete($id) 
    {
        Author::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.authors.index-author', [
            'authors' => Author::whereAny([
                'id',
                'name',
            ], 'like', '%'. $this->search .'%')->paginate(10),
        ])
            ->slot('content');
    }
}
