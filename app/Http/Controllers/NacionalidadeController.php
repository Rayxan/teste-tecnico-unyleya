<?php

namespace App\Http\Controllers;

use App\Models\Nacionalidade;
use Illuminate\Http\Request;

class NacionalidadeController extends Controller
{
    public function listNacionalidades(Request $request)
    {
        $nacionalidades = Nacionalidade::query();

        $nacionalidades = $nacionalidades->get(['code', 'name']);
        return response()->json([
            'nacionalidades' => $nacionalidades
        ], 200);
    }
}