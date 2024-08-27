<x-slot:styles>
    @vite('resources/css/books/index-books.css')
</x-slot:styles>

<div>
    <h1>Empréstimos cadastrados</h1>

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

    {{ $loans->onEachSide(1)->links() }}

    <div class="table-responsive">
    @if (count($loans) > 0) 
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Id do livro</th>
                <th scope="col">Titulo do livro</th>
                <th scope="col">Id do monitor</th>
                <th scope="col">Matricula do aluno</th>
                <th scope="col">Dia do empréstimo</th>
                <th scope="col">Dia para devolução</th>
                <th scope="col">Atrasado</th>
                <th scope="col">Devolver</th>
            </thead>

            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->book->id }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->librarian->id }}</td>
                        <td>{{ $loan->student->registration }}</td>
                        <td>{{ $loan->created_at->format('d/m/Y') }}</td>
                        <td>{{ $loan->return_date->format('d/m/Y') }}</td>
                        <td>{{ $loan->late ? 'sim' : 'não' }}</td>
                        <td
                            wire:click="return({{ $loan->id }})"
                            wire:confirm="Tem certeza que deseja realizar a devoluçao deste livro"
                        >
                            <ion-icon name="refresh-outline"></ion-icon>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @else
        <p style="text-align: center;">Nenhum um registro feito</p>
    @endif
    </div>
</div>
