<x-slot:styles>
    @vite('resources/css/author/add-author-form.css')
</x-slot:styles>

<div>
    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

    <h1>Reservar livro</h1>    

    <form wire:submit.blur='save'>
        <div class="form-group" wire:submit.prevent='save'>
            <label for="student">Aluno</label>
            <select name="student" id="student" class="form-select" wire:model.blur='student_registration'>
                <option value="" disable selected>Selecione um aluno, por favor</option>
                @foreach ($students as $student)
                    <option value="{{ $student->registration }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_registration')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="book">Livro</label>
            <select name="book" id="book" class="form-select" wire:model.blur='book_id'>
                <option value="" disable selected>Selecione um livro, por favor</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Adicionar autor
            </button>
        </div>
    </form>
</div>
