<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendaTmp;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Funcionario;
use App\Models\VendaProduto;

class VendaTmpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carrega todas as vendas com os relacionamentos cliente, funcionario e produtos
        $vendatmp = VendaTmp::with(['cliente', 'funcionario', 'vendaprodutos.produto'])->get();

        // Soma de todos os totais das vendas
        $totalGeral = $vendatmp->sum('total');

        // Envia os dados pra view
        return view('vendatmp.index', compact('vendatmp', 'totalGeral'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        // Passar as variáveis para a view
        return view('vendatmp.create', compact('clientes', 'produtos', 'funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Criar a venda
        $vendaTmp = VendaTmp::create([
            'cliente_id' => $request->input('cliente_id'),
            'funcionarios_id' => $request->input('funcionarios_id'),
            'total' => $request->input('total'),
        ]);

        // Aqui, pegamos os produtos, as quantidades e valores do request
        $produtosIds = $request->input('produtos_id'); // Array de ids de produtos
        $quantidades = $request->input('qtde'); // Array de quantidades
        $valores = $request->input('valor'); // Array de valores

        // Para cada produto, associamos à venda
        foreach ($produtosIds as $key => $produtoId) {
            Vendaproduto::create([
                'vendatmps_id' => $vendaTmp->id,      // ID da venda registrada
                'produtos_id' => $produtoId,          // ID do produto
                'qtde' => $quantidades[$key],         // Quantidade do produto
                'valor' => $valores[$key],            // Valor do produto
            ]);
        }
        return redirect('/vendatmp'); // Ou redirecionar para a página desejada
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendatmp = VendaTmp::with('cliente')->findOrFail($id);
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:

        return view('vendatmp.show', compact('vendatmp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendatmp = VendaTmp::with('cliente')->findOrFail($id);
        //Encadear o método WITH CASO tenha relacionamento com mais de uma model
        //Exemplo:

        $cliente = Cliente::all();
        return view('vendatmp.edit', compact('vendatmp', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendatmp = VendaTmp::findOrFail($id);
        $vendatmp->update($request->all());
        return redirect('/vendatmp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 1. Encontrar a venda
        $venda = VendaTmp::findOrFail($id);

        // 2. Excluir os produtos associados à venda
        Vendaproduto::where('vendatmps_id', $venda->id)->delete();

        // 3. Excluir a venda
        $venda->delete();

        // 4. Redirecionar com mensagem
        return redirect()->route('vendatmp.index')->with('success', 'Venda estornada com sucesso.');
    }

}
