<x-app-layout>
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Serviços</h2>
            <a href="{{ route('servicos.create') }}" class="btn btn-primary">Novo Serviço</a>
        </div>

        @if ($servicos->isEmpty())
            <p class="text-muted">Não há serviços cadastrados.</p>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicos as $servico)
                        <tr>
                            <td>{{ $servico->nome }}</td>
                            <td>{{ $servico->descricao }}</td>
                            <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                                <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" class="form-excluir d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <x-botao-voltar href="{{ route('dashboard') }}" />
    </div>

    <!-- SweetAlert2 para confirmar exclusão -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-excluir');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Excluir serviço?',
                        text: 'Essa ação não poderá ser desfeita.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sim, excluir',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
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
