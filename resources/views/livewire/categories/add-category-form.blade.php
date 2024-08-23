<x-slot:styles> 
    @vite('resources/css/author/add-author-form.css')
</x-slot:styles>

<div>

    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

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
