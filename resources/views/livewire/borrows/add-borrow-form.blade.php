<div>
    
    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

    <h1>Emprestar Livro</h1>

    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="student">Aluno</label>
            <select name="student" id="student" class="form-select" wire:model.blur="student">
                <option value="" selected>Selecione o aluno que pegou o livro emprestado</option>
                @foreach ($students as $student)
                    <option value="{{ $student->registration }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="book">Livro</label>
            <select name="book" id="book" class="form-select" wire:model.blur="book">
                <option value="" selected>Selecione o livro que vai ser emprestado</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="return_date">Dia de devolução</label>
            <input type="date" class="form-control" name="return_date" wire:model.blur="return_date">
            @error('return_date')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-success">
                Cadastrar Livros
            </button>
            <Button type="reset" class="btn btn-warning">
                Limpar Campos
            </Button>
        </div>
    </form>

</div>
