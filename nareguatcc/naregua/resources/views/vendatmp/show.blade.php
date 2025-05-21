<x-app-layout>

    <h5>Visualizar Venda</h5>

    <div class="row">
        <div class="col">
            <label for="cliente" class="form-label">Cliente:</label>
            <input type="text" class="form-control" value="{{ $vendatmp->cliente->nome }}" disabled />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="nome_funcionario" class="form-label">Nome do Funcionário:</label>
            <input type="text" class="form-control" value="{{ $vendatmp->nome_funcionario }}" disabled />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="total" class="form-label">Total:</label>
            <input type="text" class="form-control" value="{{ number_format($vendatmp->total, 2, ',', '.') }}" disabled />
        </div>
    </div>

    <div class="row mt-3">
        <h6>Produtos na Venda:</h6>
        @foreach ($vendatmp->produtos as $produto)
            <div class="col-12">
                <div class="card p-3 mb-2">
                    <h6>{{ $produto->produto->nome }}</h6>
                    <p>Quantidade: {{ $produto->qtde }} | Valor: {{ $produto->valor }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-3">
        <a href="/vendatmp" class="btn btn-secondary">Voltar</a>
    </div>

</x-app-layout>
