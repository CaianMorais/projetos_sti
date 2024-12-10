<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function menu(){
        return view("admin.menu")->with('title', 'Selecione um menu para visualizar');
    }

    public function projetos(){
        $projetos = Projetos::orderBy('id','asc')
        ->paginate(20);

        return view('admin.projetos')
        ->with('title','Tabela de projetos')
        ->with('projetos', $projetos);
    }

    public function criar(){
        return view('admin.criar')
        ->with('title','Publicar um projeto');
    }
}
