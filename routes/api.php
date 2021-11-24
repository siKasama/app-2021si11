<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

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
Route::delete('produto/{id}', [ProdutoController::class, 'detroy']);
