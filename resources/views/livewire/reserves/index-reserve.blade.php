<x-slot:styles>
    @vite('resources/css/books/index-books.css')
</x-slot:styles>

<div id="show_all_reserves">
    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

    <h1>Reservas cadastradas</h1>

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

    {{ $reserves->onEachSide(1)->links() }}

    <div class="table-responsive">
    @if (count($reserves) > 0) 
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <th scope="col">id</th>
                <th scope="col">Data da reserva</th>
                <th scope="col">Matricula do aluno</th>
                <th scope="col">Nome do aluno</th>
                <th scope="col">Id do livro</th>
                <th scope="col">Titulo do livro</th>
                <th scope="col">Excluir</th>
                <th scope="col">Entregar livro</th>
            </thead>

            <tbody>
                @foreach ($reserves as $reserve)
                    <tr>
                        <td>{{ $reserve->id }}</td>
                        <td>{{ $reserve->reserve_date->format('d/m/Y') }}</td>
                        <td>{{ $reserve->student_registration }}</td>
                        <td>{{ $reserve->student->name }}</td>
                        <td>{{ $reserve->book->id }}</td>
                        <td>{{ $reserve->book->title }}</td>
                        <td
                            wire:click='give_book({{ $reserve }})'
                            wire:confirm='Tem certeza que deseja apagar este autor?'
                        >
                            <ion-icon name="swap-vertical-outline"></ion-icon>
                        </td>
                        <td
                            wire:click='delete({{ $reserve->id }})'
                            wire:confirm='Se voce apagar este autor, todos os livros vinculados ao mesmo serao deletados, tem certeza que deseja continuar?'
                        >
                            <ion-icon name="close-circle-outline"></ion-icon>
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