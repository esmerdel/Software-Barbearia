<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Editar Serviço</h2>

        <form action="{{ route('servicos.update', $servico->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $servico->nome }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" required>{{ $servico->descricao }}</textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" name="preco" id="preco" value="{{ $servico->preco }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <x-botao-voltar href="{{ route('servicos.index') }}" />
                <button type="submit" class="btn btn-primary">Atualizar Serviço</button>
            </div>
        </form>
    </div>
</x-app-layout>
