<x-app-layout>
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gerenciar Clientes</h2>
            <a class="btn btn-primary" href="/cliente/create">
                Novo Cliente
            </a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="d-flex gap-2">
                            <a href="/cliente/{{ $cliente->id }}/edit" class="btn btn-sm btn-outline-primary">Alterar</a>
                            <form action="/cliente/{{ $cliente->id }}" method="POST" class="form-excluir">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-botao-voltar href="{{ route('produto.index') }}">Voltar para Início</x-botao-voltar>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-excluir');

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Excluir cliente?',
                        text: 'Essa ação não poderá ser desfeita.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#1a73e8',   // Azul para confirmar
                        cancelButtonColor: '#6c757d',    // Cinza elegante para cancelar
                        confirmButtonText: 'Sim, excluir',
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
