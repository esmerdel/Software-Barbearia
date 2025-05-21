<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario; // Importar o modelo

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::all(); // Pega todos os funcionários
        return view('funcionarios.index', compact('funcionarios')); // Passa para a view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionarios.create'); // Retorna o formulário de criação
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Valida os dados enviados no formulário
    $request->validate([
        'nome' => 'required|string|max:255',
        'cargo' => 'required|string|max:255',
        'salario' => 'required|numeric',
        'email' => 'required|email|unique:funcionarios,email',
    ]);

    // Cria um novo funcionário no banco de dados
    Funcionario::create($request->all());

    // Redireciona para a página de listagem de funcionários
    return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario')); // Passa o funcionário específico para edição
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //$funcionario = Funcionario:: findOrFail($id);
        //$funcionario ->update($request ->all());

        $funcionario->update($request->all()); // Atualiza o funcionário
        return redirect()->route('funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario) // Use o model binding
    {
        //$funcionario = Funcionario:: findOrFail($id);
        //$funcionario->delete();
        $funcionario->delete(); // Exclui o funcionário
        return redirect()->route('funcionarios.index'); // Redireciona para a listagem
    }
}
