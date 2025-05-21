<?php

namespace App\Http\Controllers;

use App\Models\Vendaproduto;
use App\Models\Produto;
use App\Models\VendaTmp;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VendaprodutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carregar todos os produtos vendidos com a e o cliente da venda
        $vendasProdutos = Vendaproduto::with(['produto', 'venda'])->get();

        return view('vendaproduto.index', compact('vendasProdutos'));
        $dadosVendasPorProduto = Vendaproduto::selectRaw('produtos_id, SUM(qtde) as total_vendido')
            ->groupBy('produtos_id')
            ->with('produto') // Carregar informações do produto
            ->get()
            ->map(function ($item) {
                return [
                    'produto' => $item->produto->nome, // Nome do produto
                    'quantidade_vendida' => $item->total_vendido, // Quantidade vendida
                ];
            });

        return view('grafico-vendas.index', compact('dadosVendasPorProduto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carregar todos os produtos, vendas e clientes disponíveis
        $produtos = Produto::all();
        $vendatmp = VendaTmp::all();
        $clientes = Cliente::all();
        return view('vendaproduto.create', compact('produtos', 'vendatmp', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Criar a associação entre produto e venda
        Vendaproduto::create($request->all());

        return redirect('/vendaproduto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Carregar uma venda de produto específica com os relacionamentos necessários
        $vendaProduto = Vendaproduto::with(['produto', 'venda'])->findOrFail($id);

        return view('vendaproduto.show', compact('vendaProduto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Carregar a venda de produto com os relacionamentos necessários
        $vendaProduto = Vendaproduto::with(['produto', 'venda'])->findOrFail($id);
        $produtos = Produto::all();
        $vendatmp = Vendatmp::all();

        return view('vendaproduto.edit', compact('produtos', 'vendatmp', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Atualizar a venda de produto
        $vendaProduto = Vendaproduto::findOrFail($id);
        $vendaProduto->update($request->all());

        return redirect('/vendaproduto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Excluir uma venda de produto
        $vendaProduto = Vendaproduto::findOrFail($id);
        $vendaProduto->delete();

        return redirect('/vendaproduto');
    }
}
