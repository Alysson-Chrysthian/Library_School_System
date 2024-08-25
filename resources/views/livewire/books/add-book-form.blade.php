<div id="add_book_form">

    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

    <h1>Adicionar Livro</h1>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Insira o titulo do livro" wire:model.blur="title">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <label for="author">Autor do livro</label>
            <select class="form-select" name="author" id="author" wire:model.blur="author_id">
                <option value="" selected>Selecione um autor</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <label for="category">Categoria do livro</label>
            <select class="form-select" name="category" id="category" wire:model.blur="category_id">
                <option value="" selected> Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="sector">Setor do livro</label>
            <select class="form-select" name="sector" id="sector" wire:model.blur="sector">
                <option value="" selected>Selecione um setor</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
                <option value="K">K</option>
                <option value="L">L</option>
            </select>
            @error('sector')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="shelf">Pratileira do livro</label>
            <select class="form-select" name="shelf" id="shelf" wire:model.blur="shelf">
                <option value="" selected>Selecione uma pratileira</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('shelf')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bookcase">Estante do livro</label>
            <select class="form-select" name="bookcase" id="bookcase" wire:model.blur="bookcase">
                <option value="" selected>Selecione uma estante</option>
                @for ($i = 1; $i <= 34; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('bookcase')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="cdd">CDD do livro</label>
            <input type="text" class="form-control" id="cdd" name="cdd" placeholder="Insira aqui o CDD do livro" wire:model.blur="cdd">
            @error('cdd')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="avaliables">Copias disponiveis</label>
            <input type="text" class="form-control" id="avaliables" name="avaliables" placeholder="Insira aqui a quantidade de copias disponiveis desse livro" wire:model.blur="avaliables">
            @error('avaliables')
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
