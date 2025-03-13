<?php

namespace App\Http\Controllers;

use App\Models\SolicitacaoContato;

class AdmSolicitacaoContatosController extends Controller
{
    public function solicitacoes()
    {
        $solicitacoes = SolicitacaoContato::orderBy('id', 'desc')
        ->paginate(20);

        $contagem = SolicitacaoContato::count();

        return view('admin.solicitacoes_contato')
            ->with('solicitacoes', $solicitacoes)
            ->with('contagem', $contagem)
            ->with('urlBack', 'admin.menu')
            ->with('title', 'Solicitações de contato');
    }

    public function ver($id)
    {
        $mensagem = SolicitacaoContato::findOrFail($id);

        if ($mensagem->lido == false)
        {
            $mensagem->update([
                'lido' => true
            ]);

            return redirect()
                ->route('admin.ver_solicitacao_contato', $id)
                ->with('toast_success', 'A mensagem foi marcada como lida');
        };

        return view('admin.ver_solicitacao_contato')
            ->with('mensagem', $mensagem)
            ->with('urlBack', 'admin.solicitacoes_contato')
            ->with('title', "Visualizando a mensagem #{$mensagem->id}");
    }
}
