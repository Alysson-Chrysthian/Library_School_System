<x-slot:styles>
    @vite('resources/css/books/index-books.css')
    <style>
        td {
            text-wrap: nowrap;
        }
    </style>
</x-slot:styles>

<div>
    <h1>Alunos cadastrados</h1>

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

    {{ $students->onEachSide(1)->links() }}

    @if (count($students) > 0) 
    <div class="table-responsive">
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Serie</th>
                <th scope="col">Turma</th>
                <th scope="col">Telefone</th>
                <th scope="col">Nascimento</th>
                <th>Excluir</th>
                <th>Editar</th>
            </thead>
            
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->registration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->birthday }}</td>
                        <td
                            wire:click="delete({{ $student->registration }})"
                            wire:confirm="Tem certeza que deseja continuar?"    
                        >
                            <ion-icon name="close-circle-outline">
                        </td>
                        <td>
                            <a href="{{ route('student.edit', $student->registration) }}">
                                <ion-icon name="create-outline">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    @else
        <p style="text-align: center">Não ha nenhum aluno cadastrado</p>
    @endif
</div>
