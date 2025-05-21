<x-app-layout>
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gerenciar Vendas</h2>
            <a class="btn btn-primary" href="/vendatmp/create">
                Nova Venda
            </a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Cliente</th>
                    <th>Nome do Funcionário</th>
                    <th>Produtos</th>
                    <th>Total</th>
                    <th class="text-center">Ações</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($vendatmp as $venda)
                    <tr>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->funcionario->nome }}</td>
                        <td>
                            @foreach ($venda->vendaprodutos as $produto)
                                <p class="mb-1">
                                    {{ $produto->produto->nome }} ({{ $produto->qtde }} x R$ {{ number_format($produto->valor, 2, ',', '.') }})
                                </p>
                            @endforeach
                        </td>
                        <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <form action="{{ route('vendatmp.destroy', $venda->id) }}" method="POST" class="form-estornar d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Estornar</button>
                            </form>
                </td>
            </tr>
        @endforeach
    </tbody>
        <tfoot>
        <tr>
            <td colspan="3" class="text-end fw-bold">Total Geral:</td>
            <td class="fw-bold">R$ {{ number_format($totalGeral, 2, ',', '.') }}</td>
            <td></td> <!-- Coluna de ações vazia -->
        </tr>
    </tfoot>

</table>

        <x-botao-voltar href="{{ route('dashboard') }}">Voltar para início</x-botao-voltar>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-estornar');
        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Estornar venda?',
                    text: 'Esta ação irá remover permanentemente a venda e seus produtos.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sim, estornar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-3',
                        confirmButton: 'px-4 py-2',
                        cancelButton: 'px-4 py-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    });
</script>

</x-app-layout>
