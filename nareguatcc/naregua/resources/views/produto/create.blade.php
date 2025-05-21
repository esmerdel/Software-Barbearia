<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Novo Produto</h2>

        <form action="{{ route('produto.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control" />
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" name="valor" class="form-control" required />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <x-botao-voltar href="{{ route('produto.index') }}">Voltar para Início</x-botao-voltar>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
