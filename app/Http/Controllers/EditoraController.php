<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEditoraRequest;
use App\Http\Requests\UpdateEditoraRequest;
use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{
    public function index(Request $request)
    {
        $editoras = Editora::query();

        if ($request->searchQuery != '') {
            $editoras = $editoras->where('nome', 'like', '%' . $request->searchQuery . '%');
        }
        
        $editoras = $editoras->latest()->paginate(2);

        return response()->json([
            'editoras' => $editoras
        ], 200);
    }
    
    public function listEditoras(Request $request)
    {
        $editoras = Editora::query();

        $editoras = $editoras->latest()->get(['id', 'nome']);
        return response()->json([
            'editoras' => $editoras
        ], 200);
    }

    public function store(StoreEditoraRequest $request)
    {
        $editora = new Editora();

        $editora->nome = $request->nome;

        $editora->save();
    }

    public function edit($id) 
    {
        $editora = Editora::find($id);

        return response()->json([
            'editora' => $editora
        ], 200);
    }

    public function update(UpdateEditoraRequest $request, $id)
    {
        $editora = Editora::find($id);

        $editora->nome = $request->nome;

        $editora->save();
    }

    public function destroy($id)
    {
        $editora = Editora::findOrFail($id);
        $editora->delete();
    }
}