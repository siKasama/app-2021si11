<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Produto;
use App\Http\Resources\Movimento as MovimentoResource;
use App\Http\Controllers\ProdutoController;

class MovimentoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimento::all();
        return MovimentoResource::collection($movimentacoes);
    }


    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->produto_id);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
