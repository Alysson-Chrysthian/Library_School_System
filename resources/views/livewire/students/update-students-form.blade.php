<div>
    <h1>Editar aluno</h1>

    @livewire('components.message-modal', [
        
    ])

    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" placeholder="Insira seu nome aqui" wire:model.blur="name" value="{{ $student->name }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="class">Serie</label>
            <select name="class" id="class" class="form-select" wire:model.blur="class">
                @foreach ([1 => '1º ano', 2 => '2º ano', 3 => '1º ano'] as $key => $value)
                    @if ($key == $student->class)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                @endforeach
            </select>
            @error('class')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <div class="form-group">
                <label for="course">Turma</label>
                <select name="course" id="course" class="form-select" wire:model.blur="course">
                    @foreach (['A', 'B', 'C', 'D'] as $course)
                        @if ($course == $student->course)
                            <option value="{{ $student->course }}" selected>{{ $student->course }}</option>
                        @else
                            <option value="{{ $course }}">{{ $course }}</option>
                        @endif
                    @endforeach
                </select>
                @error('course')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control" name="phone" placeholder="(xx) xxxx-xxxxx" wire:model.blur="phone" value="{{ $student->phone }}">
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="birthday">Data de nascimento</label>
            <input type="date" class="form-control" name="birthday" wire:model.blur="birthday" value="{{ $student->birthday }}">
            @error('birthday')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-success">
                Atualizar aluno
            </button>
            <Button type="reset" class="btn btn-warning">
                Limpar Campos
            </Button>
        </div>
    </form>
</div>
