<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $autores = Autor::query();

        if ($request->searchQuery != '') {
            $autores = $autores->where('nome', 'like', '%' . $request->searchQuery . '%');
        }
        
        $autores = $autores->latest()->paginate(2);

        return response()->json([
            'autores' => $autores
        ], 200);
    }

    public function listAutores(Request $request)
    {
        $autores = Autor::query();

        $autores = $autores->latest()->get(['id', 'nome']);
        return response()->json([
            'autores' => $autores
        ], 200);
    }

    public function store(StoreAutorRequest $request)
    {
        $autor = new Autor();

        $autor->nome = $request->nome;
        $autor->ano_nascimento = $request->ano_nascimento;
        $autor->sexo = $request->sexo;
        $autor->nacionalidade = $request->nacionalidade;

        $autor->save();
    }

    public function edit($id) 
    {
        $autor = Autor::find($id);

        return response()->json([
            'autor' => $autor
        ], 200);
    }

    public function update(UpdateAutorRequest $request, $id)
    {
        $autor = Autor::find($id);

        $autor->nome = $request->nome;
        $autor->ano_nascimento = $request->ano_nascimento;
        $autor->sexo = $request->sexo;
        $autor->nacionalidade = $request->nacionalidade;

        $autor->save();
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
    }
}