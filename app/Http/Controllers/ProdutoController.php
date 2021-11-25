<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto as Produto;
use App\Http\Resources\Produto as ProdutoResource;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return ProdutoResource::collection($produtos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->input('nome');
        $produto->SKU = $request->input('SKU');
        $produto->quantidade = $request->input('quantidade');

        if ($produto->save()) {
            return new ProdutoResource($produto);
        }
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }

    public function atualizaProduto($id, $quantidade)
    {
        $produto = Produto::findOrFail($id);
        $quantidadeAtual = $produto->quantidade += $quantidade;
        if ($quantidadeAtual < 0) {
            return ['sucesso' => false, 'mensagem' => "Quantidade informada maior que o estoque disponível"];
        }
        $produto->quantidade = $quantidadeAtual;
        if ($produto->save()) {
            return ['sucesso' => true];
        }
        return ['sucesso' => false, 'mensagem' => "Estoque não atualizado"];
    }


    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->input('nome');

        if ($produto->save()) {
            return new ProdutoResource($produto);
        }
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        if ($produto->delete()){
            return new ProdutoResource($produto);
        }
    }
}
