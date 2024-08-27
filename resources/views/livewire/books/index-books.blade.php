<x-slot:styles>
    @vite('resources/css/books/index-books.css')
</x-slot:styles>

<div id="show_all_books">
    <h1>Livros cadastrados</h1>

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

    {{ $books->onEachSide(1)->links() }}

    <div class="table-responsive">
    @if (count($books) > 0) 
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Autor</th>
                <th scope="col">CDD</th>
                <th scope="col">Setor</th>
                <th scope="col">Estante</th>
                <th scope="col">Pratileira</th>
                <th scope="col">Copias disponiveis</td>
                <th scope="col">Copias emprestadas</td>
                <th scope="col">Total de copias</td>
                <th>Excluir</th>
                <th>Editar</th>
            </thead>

            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->category->category }}</td>
                        <td>{{ $book->cdd }}</td>
                        <td>{{ $book->sector }}</td>
                        <td>{{ $book->bookcase }}</td>
                        <td>{{ $book->shelf }}</td>
                        <td>
                            {{ ($book->avaliables - count($book->loans)) == 0 ? "indisponivel" : $book->avaliables - count($book->loans) }}
                        </td>
                        <td>{{ $book->borrowed }}</td>
                        <td>{{ $book->avaliables }}</td>
                        <td 
                            wire:click="delete({{ $book->id }})" wire:confirm="Se você deletar este livro todos os empréstimos e reservas associados a ele tambem serao excluidos, tem certeza de que deseja continuar?"
                        >
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </td>
                        <td>
                            <a href="{{ route('book.edit', $book->id) }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <p style="text-align: center;">Nenhum um livro cadastrado</p>
    @endif
    </div>
</div>