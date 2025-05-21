<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-danger">Excluir Produto</h2>

        <p class="text-muted">Você tem certeza que deseja excluir este produto? Esta ação não poderá ser desfeita.</p>

        <form action="/produto/{{ $produto->id }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}" disabled />
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control" value="{{ $produto->descricao }}" disabled />
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" name="valor" class="form-control" value="{{ $produto->valor }}" disabled />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <x-botao-voltar href="{{ route('produto.index') }}">Cancelar</x-botao-voltar>
                <button type="submit" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>
</x-app-layout>
