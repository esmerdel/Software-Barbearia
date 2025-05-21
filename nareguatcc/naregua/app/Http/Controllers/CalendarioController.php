<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('agendamentos.calendario');
    }

    public function eventos()
    {
        $agendamentos = Agendamento::with(['cliente', 'servico', 'funcionario'])->get();

        $eventos = $agendamentos->map(function ($ag) {
            return [
                'id' => $ag->id,
                'title' => "{$ag->cliente->nome} - {$ag->servico->nome} ({$ag->funcionario->nome})",
                'start' => $ag->data_horario,
                'url' => route('agendamentos.edit', $ag->id),
            ];
        });

        return response()->json($eventos);
    }
}
