<?php

namespace App\Livewire\Books;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Exception;
use Livewire\Component;

class AddBookForm extends Component
{

    public $success_message;
    public $warning_message;

    public $title;
    public $author_id;
    public $category_id;
    public $sector;
    public $shelf;
    public $bookcase;
    public $cdd;
    public $avaliables;

    public function rules() {
        return [
            'title' => ['required', 'string', 'min:2', 'max:60', 'unique:books,title'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'category_id' => ['required', 'integer', 'max:60', 'exists:categories,id'],
            'sector' => ['required', 'string', 'alpha', 'size:1'],
            'shelf' => ['required', 'numeric'],
            'bookcase' => ['required', 'numeric'],
            'cdd' => ['required', 'numeric'],
            'avaliables' => ['required', 'numeric'],
        ];
    }

    public function validationAttributes() {
        return [
            'title' => 'titulo',
            'author_id' => 'autor',
            'category_id' => 'categoria',
            'sector' => 'setor',
            'shelf' => 'pratileira',
            'bookcase' => 'estante',
            'avaliables' => 'quantidade'
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
            Book::create($validatedData);
        } catch (Exception $e) {
            $this->warning_message = __('message.register_failed', [
                'attribute' => 'livro',
            ]);
            return;
        }

        $this->success_message = __('message.register_success', [
            'attribute' => 'livro',
        ]);
    }

    public function render()
    {
        return view('livewire.books.add-book-form', [
            'authors' => Author::orderBy('name')->get(),
            'categories' => Category::orderBy('category')->get(),
        ])
            ->slot('content');
    }

}