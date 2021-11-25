<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Produto;
use App\Http\Resources\Movimento as MovimentoResource;
use App\Http\Controllers\ProdutoController;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovimentoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimento::all();
        return MovimentoResource::collection($movimentacoes);
    }

    public function store(Request $request)
    {
        try{
            $produto = Produto::findOrFail($request->produto_id);
        }
        catch(ModelNotFoundException $e) {
            return MovimentoResource::toMessage(['sucesso' => false, 'mensagem' => "Produto não cadastrado!"]);
        }

        $prodController = new ProdutoController;
        $estoqueAtualizado = $prodController->atualizaProduto($produto->id, $request->quantidade);

        if (!$estoqueAtualizado['sucesso']) {
            return MovimentoResource::toMessage($estoqueAtualizado);
        }
        $saveMov = $this->create($produto, $request->quantidade);
        return MovimentoResource::toMessage($saveMov);
    }

    private function create($produto, $quantidade) {
        $movimento = new Movimento;
        $movimento->produto_id = $produto->id;
        $movimento->SKU = $produto->SKU;
        $movimento->quantidade = $quantidade;
        $movimento->data = date('Y-m-d H:i:s');

        if ($movimento->save()) {
            return ['sucesso' => true, 'mensagem' => "Estoque atualizado"];
        }
        return['sucesso' => false, 'mensagem' => 'Não foi possível atualizar o estoque!'];
    }

}
