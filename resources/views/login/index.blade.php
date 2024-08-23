<x-layout title="Login" login-form="true">
    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset
    <form method="POST">
        @csrf
        <div class="col-3 mt-4 mb-3">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary mt-3">Entrar</button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">Cadastrar-se</a>
    </form>
</x-layout>
