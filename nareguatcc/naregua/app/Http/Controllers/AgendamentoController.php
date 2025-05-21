<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Funcionario;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class AgendamentoController extends Controller
{
    // Mostrar a lista de agendamentos
    public function index()
    {
        $agendamentos = Agendamento::with('cliente', 'servico', 'funcionario')->get(); // Carrega o relacionamento do cliente, serviço e funcionário
        return view('agendamentos.index', compact('agendamentos'));
    }


    // Mostrar o formulário de criação
    public function create()
    {
        $servicos = Servico::all();
        $funcionarios = Funcionario::all();
        $clientes = Cliente::all();

        return view('agendamentos.create', compact('servicos', 'funcionarios', 'clientes'));
    }

    // Armazenar o agendamento no banco
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'servico_id' => 'required|exists:servicos,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_horario' => 'required|date',
        ]);

        $funcionarioId = $request->funcionario_id;
        $dataHora = Carbon::parse($request->data_horario);

        // Define intervalo de 29 minutos antes e depois
        $inicio = $dataHora->copy()->subMinutes(29);
        $fim = $dataHora->copy()->addMinutes(29);

        // Verifica se já existe agendamento no intervalo para o mesmo funcionário
        $conflito = Agendamento::where('funcionario_id', $funcionarioId)
            ->whereBetween('data_horario', [$inicio, $fim])
            ->exists();

        if ($conflito) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['data_horario' => 'Já existe um agendamento para este funcionário nesse horário ou em um intervalo de 30 minutos.']);
        }

        // Criar o agendamento
        Agendamento::create([
            'cliente_id' => $request->cliente_id,
            'servico_id' => $request->servico_id,
            'funcionario_id' => $request->funcionario_id,
            'data_horario' => $dataHora,
        ]);

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    // Mostrar um agendamento específico
    public function show(Agendamento $agendamento)
    {
        return view('agendamentos.show', compact('agendamento'));
    }

    // Mostrar o formulário de edição
    public function edit(Agendamento $agendamento)
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $funcionarios = Funcionario::all();

        return view('agendamentos.edit', compact('agendamento', 'clientes', 'servicos', 'funcionarios'));
    }


    // Atualizar o agendamento
    public function update(Request $request, Agendamento $agendamento)
    {
        // Validar os dados do formulário
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id', // Usar 'cliente_id' em vez de 'nome_cliente'
            'servico_id' => 'required|exists:servicos,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_horario' => 'required|date',
        ]);

        // Atualizar o agendamento no banco de dados
        $agendamento->update($validated);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    // Deletar o agendamento
    public function destroy(Agendamento $agendamento)
    {
        // Deletar o agendamento do banco de dados
        $agendamento->delete();

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento removido com sucesso!');
    }
    public function calendario()
{
    return view('agendamentos.calendario');
}

    public function eventosJson()
    {

        $agendamentos = Agendamento::with(['cliente', 'servico'])->get();

        $eventos = $agendamentos->map(function ($item) {
            return [
                'title' => $item->cliente->nome . ' - ' . $item->servico->nome,
                'start' => $item->data_horario,
                'end' => \Carbon\Carbon::parse($item->data_horario)->addMinutes(30),
                'color' => '#0d6efd',
            ];
        });
        return response()->json($eventos);
    }
}
