<x-slot:styles>
    @vite('resources/css/author/add-author-form.css')
</x-slot:styles>

<div id="add_author_form">
    @if (isset($success_message))
        <span class="success_message">{{ $success_message }}</span>
    @endif
    @if (isset($warning_message))
        <span class="error_message">{{ $warning_message }}</span>
    @endif
    <h1>Adicionar autor</h1>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Insira aqui o nome do autor do qual deseja adicionar" wire:model.blur="name">
            @error('name')
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
