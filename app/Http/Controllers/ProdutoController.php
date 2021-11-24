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

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($request->id);
        $produto->nome = $request->input('nome');
        $produto->quantidade = $request->input('quantidade');

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
