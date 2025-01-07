<?php

namespace App\Http\Controllers;

use App\Models\ContatoArmazenado;
use Illuminate\Http\Request;

class AdmContatosArmazenadosController extends Controller
{
    public function dados()
    {
        $dados = ContatoArmazenado::orderBy('name', 'asc')->get();

        return view('admin.dados_armazenados', compact('dados'))
        ->with('title', 'Dados Armazenados');
    }

    public function destroy($id)
    {
        $dados = ContatoArmazenado::find($id);
        $dados->delete();

        return redirect()->route('admin.dados_armazenados')
        ->with('toast_success', 'Dedos do contato deletado com sucesso!');
    }
}
