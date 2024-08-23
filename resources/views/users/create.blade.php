<x-layout title="Novo Usuário">
    <form method="POST">
        @csrf
        <div class="col-3 mt-4 mb-3">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
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
        <div class="col-3 mb-3">
            <div class="form-group">
                <label for="password_confirmation">Confirme a senha:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary mt-3">Registrar</button>
    </form>
</x-layout>
