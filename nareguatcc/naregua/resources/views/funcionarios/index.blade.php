<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Lista de Funcionários</h2>

        @if ($funcionarios->isEmpty())
            <p class="text-muted">Não há funcionários cadastrados.</p>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Salário</th>
                        <th>E-mail</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->cargo }}</td>
                            <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                            <td>{{ $funcionario->email }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" class="form-excluir d-inline">
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

    <!-- SweetAlert2 (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-excluir');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Excluir funcionário?',
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
