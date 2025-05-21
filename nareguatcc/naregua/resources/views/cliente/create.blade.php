<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Cadastrar Novo Cliente</h2>

        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Cliente</label>
                <input type="text" name="nome" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" required maxlength="11" />
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <x-botao-voltar href="{{ route('produto.index') }}">Voltar para Início</x-botao-voltar>
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
