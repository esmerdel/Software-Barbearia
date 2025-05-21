<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Cadastrar Novo Funcionário</h2>

        <form action="{{ route('funcionarios.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" name="cargo" id="cargo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salário</label>
                <input type="number" step="0.01" name="salario" id="salario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <x-botao-voltar href="{{ route('funcionarios.index') }}">Voltar para Início</x-botao-voltar>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</x-app-layout>
