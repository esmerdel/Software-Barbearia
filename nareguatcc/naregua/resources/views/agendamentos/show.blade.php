<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Detalhes do Agendamento</h2>

        <div class="mb-3">
            <strong>Cliente:</strong> {{ $agendamento->cliente->nome }}
        </div>

        <div class="mb-3">
            <strong>Serviço:</strong> {{ $agendamento->servico->nome }}
        </div>

        <div class="mb-3">
            <strong>Funcionário:</strong> {{ $agendamento->funcionario->nome }}
        </div>

        <div class="mb-3">
            <strong>Data e Hora:</strong> {{ \Carbon\Carbon::parse($agendamento->data_horario)->format('d/m/Y H:i') }}
        </div>

        <x-botao-voltar href="{{ route('agendamentos.index') }}" />
    </div>
</x-app-layout>
