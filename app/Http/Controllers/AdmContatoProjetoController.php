<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use Illuminate\Http\Request;

class AdmContatoProjetoController extends Controller
{

    public function contatos_ou_projetos()
    {
        return view('admin.escolha')->with('title', 'Escolher como ver as mensagens');
    }

    public function projetos_contato()
    {
        $projetos = Projetos::withCount('contatos')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.contatos_por_projeto', 
        compact('projetos'))
        ->with('title', 'Contatos por Projeto')
        ->with('urlBack', 'admin.escolha');
    }
}
