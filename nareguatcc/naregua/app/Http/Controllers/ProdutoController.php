<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Mostrar a lista de produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', compact('produtos'));
    }

    // Mostrar o formulário de criação
    public function create()
    {

        return view('produto.create');
    }

    // Armazenar o produto no banco
    public function store(Request $request)
    {
        // Validar os dados
        $validated = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'valor' => 'required|numeric',
        ]);

        // Criar o produto no banco de dados com os dados validados
        Produto::create($validated);

        // Redirecionar com sucesso
        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');

    }

    // Mostrar um produto específico
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    // Mostrar o formulário de edição
    public function edit(Produto $produto)
    {
        return view('produto.edit', compact('produto'));
    }

    // Atualizar o produto no banco
    public function update(Request $request, Produto $produto)
    {
        // Validar os dados
        $validated = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'valor' => 'required|numeric',
        ]);

        // Atualizar o produto com os dados validados
        $produto->update($validated);

        // Redirecionar com sucesso
        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Deletar o produto
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index')->with('success', 'Produto removido com sucesso!');
    }
}
