<?php

namespace App\Http\Controllers;

use App\Models\ContatoArmazenado;
use App\Models\ContatoProjeto;
use App\Models\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjetosController extends Controller
{
    public function projetos()
    {
        $projetos = Projetos::orderBy('id', 'desc')
        ->with('fotos')
        ->paginate(9);

        return view('main.projeto.projetos')
        ->with('projetos', $projetos);
    }

    public function ver_projeto($id)
    {
        $projeto = Projetos::where('id', $id)
        ->with('fotos')
        ->first();

        $projetoId = $projeto->id;
        $hash = hash_hmac('sha256', $projetoId, config('app.key'));

        return view('main.projeto.ver_projeto')
        ->with('projeto', $projeto)
        ->with('hash', $hash);
    }

    public function contato_projeto(Request $request)
    {
        if ($request->input('h-captcha-response') === null) {
            return redirect()->back()->withInput()->with(['toast_error' => 'Por favor, complete o captcha.']);
        }

        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'nullable',
            'mensagem' => 'required',
            'projeto_id' => 'required',
            'h-captcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => env('H_CAPTCHA_SECRETKEY'),
            'response' => $request->input('h-captcha-response'),
        ]);

        if (!$response->json('success')) {
            return redirect()->back()->withInput()->with(['toast_error' => 'A validação do captcha falhou.']);
        }

        $projetoId = $request->input('projeto_id');
        $hash = $request->input('hash');

        $calculatedHash = hash_hmac('sha256', $projetoId, config('app.key'));

        if ($hash !== $calculatedHash) {
            return redirect()->back()->with(['toast_error' => 'Dados inválidos ou adulterados.']);
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
            'lido' => false,
        ]);

        return redirect()->back()->with('toast_success', 'Mensagem enviada com sucesso!');
    }
}
