<?php

namespace App\Http\Controllers;

use App\Models\SolicitacaoContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContatoController extends Controller
{
    public function contato()
    {
        return view('main.contato');
    }
    public function store(Request $request)
    {
        if ($request->input('h-captcha-response') === null) {
            return redirect()->back()->withInput()->with(['toast_error' => 'Por favor, complete o captcha.']);
        }

        $validatedData = $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email',
            'telefone' => 'nullable',
            'assunto' => 'required|max:100',
            'mensagem' => 'required|max:1000',
            'h-captcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => env('H_CAPTCHA_SECRETKEY'),
            'response' => $request->input('h-captcha-response'),
        ]);

        if (!$response->json('success')) {
            return redirect()->back()->withInput()->with(['toast_error' => 'A validação do captcha falhou.']);
        }

        SolicitacaoContato::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'telefone' => $validatedData['telefone'],
            'assunto' => $validatedData['assunto'],
            'mensagem' => $validatedData['mensagem'],
            'lido' => false,
        ]);

        return redirect()
        ->back()
        ->with('toast_success', 'Sua mensagem foi enviada com sucesso!');
    }
}
