<?php

use App\Http\Controllers\LivroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/livros', [LivroController::class, 'store']);
Route::get('/livros', [LivroController::class, 'listLivros']);
Route::get('/livros/{livro}/edit', [LivroController::class, 'edit']);
Route::put('/livros/update/{livro}', [LivroController::class, 'update']);
Route::delete('/livro/{livro}', [LivroController::class, 'destroy']);