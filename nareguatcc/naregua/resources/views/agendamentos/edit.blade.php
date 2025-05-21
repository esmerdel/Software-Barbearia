<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Editar Agendamento</h2>

        <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Cliente -->
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $agendamento->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Serviço -->
            <div class="mb-3">
                <label for="servico_id" class="form-label">Serviço</label>
                <select name="servico_id" id="servico_id" class="form-select @error('servico_id') is-invalid @enderror" required>
                    @foreach ($servicos as $servico)
                        <option value="{{ $servico->id }}" {{ $agendamento->servico_id == $servico->id ? 'selected' : '' }}>
                            {{ $servico->nome }}
                        </option>
                    @endforeach
                </select>
                @error('servico_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Funcionário -->
            <div class="mb-3">
                <label for="funcionario_id" class="form-label">Funcionário</label>
                <select name="funcionario_id" id="funcionario_id" class="form-select @error('funcionario_id') is-invalid @enderror" required>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ $agendamento->funcionario_id == $funcionario->id ? 'selected' : '' }}>
                            {{ $funcionario->nome }}
                        </option>
                    @endforeach
                </select>
                @error('funcionario_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Data e Hora -->
            <div class="mb-4">
                <label for="data_horario" class="form-label">Data e Hora</label>
                <input type="datetime-local" name="data_horario" id="data_horario"
                    class="form-control @error('data_horario') is-invalid @enderror"
                    value="{{ \Carbon\Carbon::parse($agendamento->data_horario)->format('Y-m-d\TH:i') }}" required>
                @error('data_horario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <x-botao-voltar href="{{ route('agendamentos.index') }}" />
                <button type="submit" class="btn btn-primary">Atualizar Agendamento</button>
            </div>
        </form>
    </div>
</x-app-layout>
