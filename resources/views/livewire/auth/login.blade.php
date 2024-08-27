<div>
    <h1>Login</h1>

    @if (session()->has('message'))
        <span class="error">{{ session()->get('message') }}</span>
    @endif

    <form wire:submit.prevent="login">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" placeholder="Seu email institucional" wire:model.blur="email">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="text" class="form-control" name="password" placeholder="Sua senha padrão" wire:model.blur="password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">
                Entrar
            </button>
        </div>
    </form>
</div>
