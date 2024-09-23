<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function listLivros(Request $request)
    {
        $livros = Livro::with(['autores', 'editoras', 'generos']);
    
        if ($request->searchQuery != '') {
            $livros = $livros->where('titulo', 'like', '%' . $request->searchQuery . '%');
        }
        
        $livros = $livros->latest()->paginate(2);

        return response()->json([
            'livros' => $livros
        ], 200);
    }

    public function store(StoreLivroRequest $request)
    {
        $livro = new Livro();

        $livro->titulo = $request->titulo;
        $livro->ano_lancamento = $request->ano_lancamento;
        $livro->fk_autor = $request->fk_autor;
        $livro->fk_editora = $request->fk_editora;
        $livro->fk_genero = $request->fk_genero;

        $livro->save();
    }

    public function edit($id) 
    {
        $livro = Livro::with(['autores', 'editoras', 'generos'])->find($id);

        return response()->json([
            'livro' => $livro
        ], 200);
    }

    public function update(UpdateLivroRequest $request, $id)
    {
        $livro = Livro::find($id);

        $livro->titulo = $request->titulo;
        $livro->ano_lancamento = $request->ano_lancamento;
        $livro->fk_autor = $request->fk_autor;
        $livro->fk_editora = $request->fk_editora;
        $livro->fk_genero = $request->fk_genero;

        $livro->save();
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
    }
}
