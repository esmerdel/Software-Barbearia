<x-app-layout>

    <h5>Editar Venda</h5>

    <form action="/vendatmp/{{ $vendatmp->id }}" method="POST">
        @CSRF
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select name="cliente_id" class="form-select">
                    @foreach ($cliente as $cli)
                        <option value="{{ $cli->id }}" {{ $vendatmp->cliente_id == $cli->id ? 'selected' : '' }}>
                            {{ $cli->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="nome_funcionario" class="form-label">Nome do Funcionário:</label>
                <input type="text" name="nome_funcionario" class="form-control" value="{{ $vendatmp->nome_funcionario }}" required />
            </div>
        </div>

        <!-- Produtos na venda -->
        <div class="row mt-3">
            <h6>Produtos na Venda:</h6>
            @foreach ($vendatmp->produtos as $produto)
                <div class="col-12">
                    <div class="card p-3 mb-2">
                        <h6>{{ $produto->produto->nome }}</h6>
                        <p>Quantidade: {{ $produto->qtde }} | Valor: {{ $produto->valor }}</p>
                        <a href="/vendatmp/{{ $vendatmp->id }}/remove_produto/{{ $produto->id }}" class="btn btn-danger">Remover Produto</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </form>

</x-app-layout>
