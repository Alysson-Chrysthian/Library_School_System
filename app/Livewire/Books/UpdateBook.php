<?php

namespace App\Livewire\Books;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Exception;
use Livewire\Component;

class UpdateBook extends Component
{
    public $book;

    public $success_message;
    public $warning_message;

    public $id;

    public $title;
    public $author_id;
    public $category_id;
    public $sector;
    public $shelf;
    public $bookcase;
    public $cdd;
    public $avaliables;


    public function rules()
    {
        $rules = new AddBookForm();
        $rules = $rules->rules();

        $rules['title'] = ['required', 'string', 'min:2', 'max:60', 'unique:books,title,' . $this->id];

        return $rules;
    }

    public function validationAttributes()
    {
        $validationAttributes = new AddBookForm();
        $validationAttributes = $validationAttributes->validationAttributes();

        return $validationAttributes;
    }

    public function mount($id)
    {
        $this->id = $id;

        $this->book = Book::find($id);

        if ($this->book == null) {
            return redirect()->back();
        }

        foreach ($this->book->toArray() as $property => $value) {
            $this->$property = $value;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->success_message = null;
        $this->warning_message = null;

        $validatedData = $this->validate();

        try {
            Book::where('id', $this->book->id)->update($validatedData);
        } catch (Exception $e) {
            $this->warning_message = __('message.update_failed', [
                'attribute' => 'livro',
            ]);
            return;
        }

        $this->success_message = __('message.update_success', [
            'attribute' => 'livro',
        ]);
    }

    public function render()
    {
        return view('livewire.books.update-book', [
            'authors' => Author::orderBy('name')->get(),
            'categories' => Category::orderBy('category')->get(),
        ])
            ->slot('content');
    }
}