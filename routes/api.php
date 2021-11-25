<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentoController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('produtos', [ProdutoController::class, 'index']);

Route::get('produto/{id}', [ProdutoController::class, 'show']);

// Create
Route::post('produto', [ProdutoController::class, 'store']);

// Update
Route::put('produto/{id}', [ProdutoController::class, 'update']);

//Delete
Route::delete('produto/{id}', [ProdutoController::class, 'destroy']);

// Movimentacao
Route::get('historico', [MovimentoController::class, 'index']);

Route::post('movimentacao', [MovimentoController::class, 'store']);
