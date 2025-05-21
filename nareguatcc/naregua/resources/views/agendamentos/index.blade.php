<x-app-layout>
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Agendamentos</h2>
            <a href="{{ route('agendamentos.create') }}" class="btn btn-success">Novo Agendamento</a>
        </div>

        @if ($agendamentos->isEmpty())
            <p class="text-muted">Não há agendamentos cadastrados.</p>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Funcionário</th>
                        <th>Data e Hora</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamentos as $agendamento)
                        <tr>
                            <td>{{ $agendamento->id }}</td>
                            <td>{{ $agendamento->cliente->nome }}</td>
                            <td>{{ $agendamento->servico->nome }}</td>
                            <td>{{ $agendamento->funcionario->nome }}</td>
                            <td>{{ \Carbon\Carbon::parse($agendamento->data_horario)->format('d/m/Y H:i') }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('agendamentos.show', $agendamento->id) }}" class="btn btn-sm btn-outline-info">Visualizar</a>
                                <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                                <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" class="form-excluir d-inline">
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

    <!-- SweetAlert2 para confirmação de exclusão -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-excluir');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Excluir agendamento?',
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
