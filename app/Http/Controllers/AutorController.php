<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\StoreLivroRequest;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listAutores(Request $request)
    {
        $autores = Autor::query();

        // dd($autores);

        if ($request->searchQuery != '') {
            $autores = $autores->where('nome', 'like', '%' . $request->searchQuery . '%');
        }
        
        $autores = $autores->latest()->paginate(2);

        return response()->json([
            'autores' => $autores
        ], 200);
    }

    public function store(StoreAutorRequest $request)
    {
        $autor = new Autor();

        $autor->nome = $request->titulo;
        $autor->ano_nascimento = $request->ano_lancamento;
        $autor->sexo = $request->fk_autor;
        $autor->nacionalidade = $request->fk_editora;

        $autor->save();
    }

    public function edit($id) 
    {
        $autor = Autor::with(['autores', 'editoras', 'generos'])->find($id);

        return response()->json([
            'autor' => $autor
        ], 200);
    }

    public function update(StoreLivroRequest $request, $id)
    {
        $autor = Autor::find($id);

        $autor->nome = $request->titulo;
        $autor->ano_nascimento = $request->ano_lancamento;
        $autor->sexo = $request->fk_autor;
        $autor->nacionalidade = $request->fk_editora;

        $autor->save();
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
    }
}