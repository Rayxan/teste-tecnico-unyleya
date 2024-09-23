<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditoraController;
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

Route::post('/autores', [AutorController::class, 'store']);
Route::get('/autores', [AutorController::class, 'index']);
Route::get('/autores/list', [AutorController::class, 'listAutores']);
Route::get('/autores/{autor}/edit', [AutorController::class, 'edit']);
Route::put('/autores/update/{autor}', [AutorController::class, 'update']);
Route::delete('/autor/{autor}', [AutorController::class, 'destroy']);

Route::post('/editoras', [EditoraController::class, 'store']);
Route::get('/editoras', [EditoraController::class, 'index']);
Route::get('/editoras/list', [EditoraController::class, 'listEditoras']);
Route::get('/editoras/{editor}/edit', [EditoraController::class, 'edit']);
Route::put('/editoras/update/{editor}', [EditoraController::class, 'update']);
Route::delete('/editora/{editora}', [EditoraController::class, 'destroy']);

// Route::post('/generos', [GeneroController::class, 'store']);
// Route::get('/generos', [GeneroController::class, 'index']);
// Route::get('/generos/list', [GeneroController::class, 'listGeneros']);
// Route::get('/generos/{genero}/edit', [GeneroController::class, 'edit']);
// Route::put('/generos/update/{genero}', [GeneroController::class, 'update']);
// Route::delete('/genero/{genero}', [GeneroController::class, 'destroy']);