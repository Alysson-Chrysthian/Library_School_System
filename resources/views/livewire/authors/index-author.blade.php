<x-slot:styles>
    @vite('resources/css/books/index-books.css')
</x-slot:styles>

<div id="show_all_books">
    <h1>Autores Cadastrados</h1>

    <form wire:submit.prevent="$refresh">
        <div class="row">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Pesquisar" wire:model="search">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control"><ion-icon name="search-outline" style="font-size: 1em"></ion-icon></button>
            </div>
        </div>
    </form>

    {{ $authors->onEachSide(1)->links() }}

    <div class="table-responsive">
    @if (count($authors) > 0) 
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Excluir</th>
                <th scope="col">Editar</th>
            </thead>

            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td
                            wire:click='delete({{ $author->id }})'
                            wire:confirm='Se voce apagar este autor, todos os livros vinculados ao mesmo serao deletados, tem certeza que deseja continuar?'
                        >
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </td>
                        <td>
                            <a href="{{ route('author.edit', $author->id) }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <p style="text-align: center;">Nenhum autor cadastrado</p>
    @endif
    </div>
</div>