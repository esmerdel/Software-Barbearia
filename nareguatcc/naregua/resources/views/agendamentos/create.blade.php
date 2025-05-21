<x-app-layout>
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Agendar Atendimento</h2>
            <a href="{{ route('agendamentos.index') }}" class="btn btn-outline-secondary">
                Ver Agendamentos
            </a>
        </div>

        <form action="{{ route('agendamentos.store') }}" method="POST">
            @csrf


            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Selecione o Cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="servico_id" class="form-label">Serviço</label>
                <select name="servico_id" id="servico_id" class="form-select @error('servico_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Selecione o Serviço</option>
                    @foreach ($servicos as $servico)
                        <option value="{{ $servico->id }}" {{ old('servico_id') == $servico->id ? 'selected' : '' }}>{{ $servico->nome }}</option>
                    @endforeach
                </select>
                @error('servico_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="funcionario_id" class="form-label">Funcionário</label>
                <select name="funcionario_id" id="funcionario_id" class="form-select @error('funcionario_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Selecione o Funcionário</option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ old('funcionario_id') == $funcionario->id ? 'selected' : '' }}>{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
                @error('funcionario_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Data e Hora -->
            <div class="mb-4">
                <label for="data_horario" class="form-label">Data e Hora</label>
                <input type="datetime-local" name="data_horario" id="data_horario" class="form-control @error('data_horario') is-invalid @enderror" value="{{ old('data_horario') }}" required>
                @error('data_horario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <x-botao-voltar href="{{ route('agendamentos.index') }}" />
                <button type="submit" class="btn btn-primary">Agendar</button>
            </div>
        </form>
    </div>
</x-app-layout>
