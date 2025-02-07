<?php

namespace App\Http\Controllers;

use App\Models\ContatoProjeto;
use App\Models\Projetos;

class AdmContatoProjetoController extends Controller
{
    public function todos_contatos()
    {
        $contatos = ContatoProjeto::with('projeto')
        ->orderBy('id', 'desc')
        ->paginate(20);

        $contagem = ContatoProjeto::count();

        return view('admin.todos_contatos', compact('contatos'))
        ->with('title', 'Todos os Contatos via Projetos')
        ->with('contagem', $contagem);
    }

    public function projetos_contato()
    {
        $projetos = Projetos::with(['contatos' => function($query) {
            $query->orderBy('lido')->orderBy('created_at', 'desc');
        }])
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.contatos_por_projeto', 
        compact('projetos'))
        ->with('title', 'Contatos por Projeto');
    }

    public function ver_contato_todos_projetos($id)
    {
        $mensagem = ContatoProjeto::with('projeto')->findOrFail($id);

        if ($mensagem->lido == false)
        {
            $mensagem->update([
                'lido' => true
            ]);

            return redirect()
                ->route('admin.ver_contato_projeto', $id)
                ->with('toast_success', 'A mensagem foi marcada como lida');
        };

        return view('admin.ver_solicitacao_contato', compact('mensagem'))
        ->with('title', "Visualizando a mensagem #{$id}")
        ->with('urlBack', 'admin.todos_contatos');
    }

    public function ver_contato_do_projeto($id)
    {
        $mensagem = ContatoProjeto::with('projeto')->findOrFail($id);

        if ($mensagem->lido == false)
        {
            $mensagem->update([
                'lido' => true
            ]);

            return redirect()
                ->route('admin.ver_contato_do_projeto', $id)
                ->with('toast_success', 'A mensagem foi marcada como lida');
        };

        return view('admin.ver_solicitacao_contato', compact('mensagem'))
        ->with('title', "Visualizando a mensagem #{$id}")
        ->with('urlBack', 'admin.contatos_por_projeto');
    }
}
