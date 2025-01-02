<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
    public function projetos()
    {
        $projetos = Projetos::orderBy('id', 'desc')
        ->with('fotos')
        ->paginate(20);

        return view('main.projeto.projetos')
        ->with('projetos', $projetos);
    }

    public function ver_projeto($id)
    {
        $projeto = Projetos::where('id', $id)
        ->with('fotos')
        ->first();

        return view('main.projeto.ver_projeto')
        ->with('projeto', $projeto);
    }
}
