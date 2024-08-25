<div>

    @livewire('components.message-modal', [
        'message' => $message,
        'status' => $status,
    ])

    <h1>Adicionar aluno</h1>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="registration">Matricula</label>
            <input type="text" class="form-control" name="registration" placeholder="Insira a matricula do aluno aqui" wire:model.blur="registration">
            @error('registration')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" placeholder="Insira seu nome aqui" wire:model.blur="name">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="class">Serie</label>
            <select name="class" id="class" class="form-select" wire:model.blur="class">
                <option value="" selected>Selecione o ano em que o aluno esta</option>
                <option value="1">1º ano</option>
                <option value="2">2º ano</option>
                <option value="3">3º ano</option>
            </select>
            @error('class')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <div class="form-group">
                <label for="course">Turma</label>
                <select name="course" id="course" class="form-select" wire:model.blur="course">
                    <option value="" selected>Selecione a turma do aluno</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                @error('course')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control" name="phone" placeholder="(xx) xxxx-xxxxx" wire:model.blur="phone">
            @error('phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="birthday">Data de nascimento</label>
            <input type="date" class="form-control" name="birthday" wire:model.blur="birthday">
            @error('birthday')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-success">
                Cadastrar aluno
            </button>
            <Button type="reset" class="btn btn-warning">
                Limpar Campos
            </Button>
        </div>
    </form>
</div>
