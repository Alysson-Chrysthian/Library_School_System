<x-slot:styles>
    @vite('resources/css/books/update-book.css')
</x-slot:styles>

<div id="update-book">

    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

    <h1>Editar Livro</h1>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" wire:model.blur="title" value="{{ $book->title }}" >
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <select name="author" class="form-select" wire:model.blur="author_id">
                @foreach ($authors as $author)
                    @if ($author->id == $book->author_id)
                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                    @else
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('author_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category" class="form-select" wire:model.live="category_id">
                @foreach ($categories as $category)
                    @if ($category->id == $book->category_id)
                        <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="sector">Setor do livro</label>
            <select class="form-select" name="sector" id="sector" wire:model.blur="sector">
                @foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'] as $sector)
                    @if ($sector == $book->sector)
                        <option value="{{ $sector }}" selected>{{ $sector }}</option>
                    @else
                        <option value="{{ $sector }}">{{ $sector }}</option>
                    @endif
                @endforeach
            </select>
            @error('sector')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="shelf">Pratileira</label>
            <select name="shelf" class="form-select" wire:model.blur="shelf">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i == $book->shelf)
                        <option value="{{ $i }}" selected>{{ $i }}</option>
                    @else
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
            </select>
            @error('shelf')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bookcase">Estante</label>
            <select name="bookcase" class="form-select" wire:model.blur="bookcase">
                @for ($i = 1; $i <= 34; $i++)
                    @if ($i == $book->bookcase)
                        <option value="{{ $i }}" selected>{{ $i }}</option>
                    @else
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
            </select>
            @error('bookcase')
                <span class="error">{{ $book->bookcase }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="cdd">CDD</label>
            <input type="text" class="form-control" value="{{ $book->cdd }}" wire:model.blur="cdd">
            @error('cdd')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="avaliables">Copias disponiveis</label>
            <input type="text" class="form-control" value="{{ $book->avaliables }}" wire:model.blur="avaliables">
            @error('avaliables')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-success">
                Atualizar livro
            </button>
            <button type="reset" class="btn btn-warning">
                Limpar tudo
            </button>
        </div>
    </form>
</div>
