<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneroRequest;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index(Request $request)
    {
        $generos = Genero::query();

        if ($request->searchQuery != '') {
            $generos = $generos->where('nome', 'like', '%' . $request->searchQuery . '%');
        }
        
        $generos = $generos->latest()->paginate(2);

        return response()->json([
            'generos' => $generos
        ], 200);
    }
    
    public function listGeneros(Request $request)
    {
        $generos = Genero::query();

        $generos = $generos->latest()->get(['id', 'nome']);
        return response()->json([
            'generos' => $generos
        ], 200);
    }

    public function store(StoreGeneroRequest $request)
    {
        $genero = new Genero();

        $genero->nome = $request->nome;

        $genero->save();
    }

    public function edit($id) 
    {
        $genero = Genero::find($id);

        return response()->json([
            'genero' => $genero
        ], 200);
    }

    public function update(StoreGeneroRequest $request, $id)
    {
        $genero = Genero::find($id);

        $genero->nome = $request->nome;

        $genero->save();
    }

    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();
    }
}