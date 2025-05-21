<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Criar Novo Serviço</h2>

        <form action="{{ route('servicos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" name="preco" id="preco" required>
            </div>

            <div class="d-flex justify-content-between">
                <x-botao-voltar href="{{ route('servicos.index') }}" />
                <button type="submit" class="btn btn-success">Criar Serviço</button>
            </div>
        </form>
    </div>
</x-app-layout>
