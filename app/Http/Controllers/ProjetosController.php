<?php

namespace App\Http\Controllers;

use App\Models\ContatoArmazenado;
use App\Models\ContatoProjeto;
use App\Models\Projetos;
use App\Models\ProjetosTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjetosController extends Controller
{
    public function projetos()
    {
        $projetos = Projetos::orderBy('id', 'desc')
        ->with('traducaoAtual')
        ->with('fotos')
        ->where('visibilidade', true)
        ->paginate(9);

        return view('main.projeto.projetos')
        ->with('projetos', $projetos);
    }

    public function ver_projeto($id)
    {
        $projeto_translate = ProjetosTranslate::where('id', $id)->first();
        $projeto = Projetos::with('fotos')->find($id);

        if ($projeto_translate){
            
            $projeto = Projetos::with('fotos')->find($projeto_translate->projeto_id);
        }
        elseif (!$projeto_translate && $projeto) {
            $projeto = Projetos::with('fotos')->find($id);
        }
        elseif (!$projeto_translate && !$projeto) {
            return redirect()->route('projetos')->with('toast_error', __('toasts.projeto.nao_encontrado'));
        }

        if (!$projeto || !$projeto->visibilidade) {
            return redirect()->route('projetos')->with('toast_error', __('toasts.projeto.nao_encontrado'));
        }

        $projeto_idioma = $projeto->traducaoAtual()->first();
        
        if (!$projeto_idioma || !$projeto_idioma->visibilidade) {
            return redirect()->route('projetos')->with('toast_error', __('toasts.projeto.nao_disponivel'));
        }

        $projeto->setRelation('traducaoAtual', $projeto_idioma);
        $hash = hash_hmac('sha256', $projeto->id, config('app.key'));

        return view('main.projeto.ver_projeto')
        ->with('projeto', $projeto)
        ->with('hash', $hash);
    }

    public function contato_projeto(Request $request)
    {
        if ($request->input('h-captcha-response') === null) {
            return redirect()->back()->withInput()->with(['toast_error' => __('toasts.projeto.captcha_vazio')]);
        }

        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'nullable',
            'mensagem' => 'required',
            'projeto_id' => 'required',
            'h-captcha-response' => 'required',
        ]);

        //PARA TESTAR NO LOCALHOST
        //COMENTE DAQUI
        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => env('H_CAPTCHA_SECRETKEY'),
            'response' => $request->input('h-captcha-response'),
        ]);

        if (!$response->json('success')) {
            return redirect()->back()->withInput()->with(['toast_error' => __('toasts.projeto.captcha_invalido')]);
        }
        //ATÉ AQUI

        $projetoId = $request->input('projeto_id');
        $hash = $request->input('hash');

        $calculatedHash = hash_hmac('sha256', $projetoId, config('app.key'));

        if ($hash !== $calculatedHash) {
            return redirect()->back()->with(['toast_error' => __('toasts.projeto.dados_invalidados')]);
        }

        $projeto = Projetos::where('id', '=', $projetoId)
        ->first();

        if($request->input('autorizacao') == true &&
        !ContatoArmazenado::where('email', $validatedData['email'])->exists())
        {
            ContatoArmazenado::create([
                'name' => $validatedData['nome'],
                'email' => $validatedData['email'],
            ]);
        }

        ContatoProjeto::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'telefone' => $validatedData['telefone'],
            'mensagem' => $validatedData['mensagem'],
            'projeto_id' => $validatedData['projeto_id'],
            'locale' => app()->getLocale(),
            'lido' => false,
        ]);

        return redirect()->back()->with('toast_success', __('toasts.projeto.mensagem_enviada'));
    }
}
