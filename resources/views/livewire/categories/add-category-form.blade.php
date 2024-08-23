<x-slot:styles> 
    @vite('resources/css/author/add-author-form.css')
</x-slot:styles>

<div>
    @if (isset($success_message))
        <span class="success_message">{{ $success_message }}</span>
    @endif
    @if (isset($warning_message))
        <span class="error_message">{{ $warning_message }}</span>
    @endif
    <h1>Adicionar categoria</h1>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="category">Categoria</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Insira aqui o nome da nova categoria" wire:model.blur="category">
            @error('category')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Adicionar categoria
            </button>
        </div>
    </form>
</div>
