<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    // Exibir a lista de serviços
    public function index()
    {
        $servicos = Servico::all(); // Pega todos os serviços
        return view('servicos.index', compact('servicos'));
    }

    // Mostrar o formulário de criação
    public function create()
    {
        return view('servicos.create');
    }

    // Armazenar o serviço no banco
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
        ]);

        Servico::create($validated);

        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso!');
    }

    // Exibir um serviço específico
    public function show(Servico $servico)
    {
        return view('servicos.show', compact('servico'));
    }

    // Mostrar o formulário de edição
    public function edit(Servico $servico)
    {
        return view('servicos.edit', compact('servico'));
    }

    // Atualizar o serviço
    public function update(Request $request, Servico $servico)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
        ]);

        $servico->update($validated);

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    // Deletar o serviço
    public function destroy(Servico $servico)
    {
        $servico->delete();

        return redirect()->route('servicos.index')->with('success', 'Serviço removido com sucesso!');
    }
}
