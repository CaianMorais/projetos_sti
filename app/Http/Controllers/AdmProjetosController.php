<?php

namespace App\Http\Controllers;

use App\Jobs\SendProjetoCriadoEmails;
use App\Models\ContatoArmazenado;
use App\Models\Projetos;
use App\Models\FotosProjeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdmProjetosController extends Controller
{
    public function menu(){
        return view("admin.menu")
            ->with('title', 'Início')
            ->with('urlBack', 'home');
    }

    // LISTA DE PROJETOS
    public function projetos(){
        $projetos = Projetos::orderBy('id','desc')
        ->paginate(20);
        $contagemProjetos = Projetos::count();

        return view('admin.projetos')
        ->with('title','Tabela de projetos')
        ->with('projetos', $projetos)
        ->with('contagem', $contagemProjetos)
        ->with('urlBack', 'admin.menu');
    }

    // CRIAR PROJETO
    public function criar(){
        return view('admin.criar_projeto')
        ->with('title', 'Publicar um projeto')
        ->with('urlBack', 'admin.projetos');
    }

    // POST PARA CRIAR PROJETO
    public function store(Request $request)
    {
        try {

            //Log::info('Tem arquivo?', ['hasFile' => $request->hasFile('img_projetos')]);
            //Log::info('Arquivo recebido:', ['img_projetos' => $request->file('img_projetos')]);

            $request->merge([
                'valor_minimo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_minimo)),
                'valor_maximo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_maximo)),
                'notificar' => filter_var($request->input('notificar'), FILTER_VALIDATE_BOOLEAN),
                'visibilidade' => filter_var($request->input('visibilidade'), FILTER_VALIDATE_BOOLEAN),
                'valor_visibilidade' => filter_var($request->input('valor_visibilidade'), FILTER_VALIDATE_BOOLEAN),
            ]);

            if ($request->get('valor_minimo') > $request->get('valor_maximo')) {
                return redirect()->back()->with('toast_error', 'O valor máximo não pode ser menor que o valor mínimo');
            }


            $validatedData = $request->validate([
                'nome_projeto' => 'required|string|max:255',
                'valor_minimo' => 'required|min:0',
                'valor_maximo' => 'required|min:0|gte:valor_minimo',
                'autor_projeto' => 'required|string|max:255',
                'descricao' => 'required|string',
                'detalhes' => 'nullable|string',
                'status' => 'required|in:AN,PI,CN',
                'visibilidade' => 'required|boolean',
                'valor_visibilidade' => 'required|boolean',
                'notificar' => 'nullable|boolean',
                'img_projetos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8128'
            ]);

            $projeto = Projetos::create([
                'nome_projeto' => $validatedData['nome_projeto'],
                'valor_minimo' => $validatedData['valor_minimo'],
                'valor_maximo' => $validatedData['valor_maximo'],
                'autor_projeto' => $validatedData['autor_projeto'],
                'descricao' => $validatedData['descricao'],
                'detalhes' => $request->input('detalhes'),
                'status' => $validatedData['status'],
                'visibilidade' => $validatedData['visibilidade'],
                'valor_visibilidade' => $validatedData['valor_visibilidade'],
            ]);

            if ($request->hasFile('img_projetos')) {
                foreach ($request->file('img_projetos') as $image) {
                    //Log::info('Imagem recebida:', ['name' => $image->getClientOriginalName(), 'mime' => $image->getClientMimeType()]);

                    $path = $image->store('img', 'public');

                    //Log::info('Imagem salva no caminho:', ['path' => $path]);

                    FotosProjeto::create([
                        'projeto_id' => $projeto->id,
                        'path' => $path,
                    ]);
                }
            }

            if ($request->input('notificar')) {
                $contatos = ContatoArmazenado::pluck('email');
                SendProjetoCriadoEmails::dispatch($projeto, $contatos);

                return redirect()
                    ->route('admin.projetos.editar', $projeto->id)
                    ->with('toast_success', 'Projeto criado com sucesso e as notificações estão sendo enviadas!');
            }

            return redirect()
                ->route('admin.projetos.editar', $projeto->id)
                ->with('toast_success', 'Projeto criado com sucesso!');

        } catch (\Exception $e) {
            Log::error('Erro ao criar projeto', ['error' => $e->getMessage()] + ['request' => $validatedData ?? $request->all()]);
            return redirect()->back()->with('toast_error', 'Erro ao criar o projeto. Por favor, tente novamente.');
        }
    }

    // EDITAR PROJETO
    public function editar_projeto(Request $request, $id){
        $projeto = Projetos::with('fotos')->findOrFail($id);
        return view('admin.editar_projeto', compact('projeto'))
        ->with('title', "Editar o projeto #{$projeto->id}")
        ->with('urlBack', 'admin.projetos');
    }

    // POST DE EDITAR PROJETO
    public function update_projeto(Request $request, $id)
    {
        try {

            $request->merge([
                'valor_minimo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_minimo)),
                'valor_maximo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_maximo)),
            ]);

            if ($request->get('valor_minimo') > $request->get('valor_maximo')) {
                return redirect()->back()->with('toast_error', 'O valor máximo não pode ser menor que o valor mínimo');
            }

            $validatedData = $request->validate([
                'nome_projeto' => 'required|string|max:255',
                'valor_minimo' => 'required|min:0',
                'valor_maximo' => 'required|min:0|gte:valor_minimo',
                'autor_projeto' => 'required|string|max:255',
                'descricao' => 'required|string',
                'detalhes' => 'nullable|string',
                'status' => 'required|in:AN,PI,CN',
                'visibilidade' => 'required|boolean',
                'valor_visibilidade' => 'required|boolean',
                'img_projetos.*' => 'nullable|image|mimes:jpeg,jpg,png|max:8128', // Validação para as imagens
            ]);

            Log::info('Dados validados', ['data' => $validatedData]);

            $projeto = Projetos::findOrFail($id);

            if (!$projeto) {
                Log::error('Projeto não encontrado', ['projeto_id' => $id]);
                return redirect()->route('admin.projetos.index')->with('error', 'Projeto não encontrado!');
            }

            $projeto->update([
                'nome_projeto' => $validatedData['nome_projeto'],
                'valor_minimo' => $validatedData['valor_minimo'],
                'valor_maximo' => $validatedData['valor_maximo'],
                'autor_projeto' => $validatedData['autor_projeto'],
                'descricao' => $validatedData['descricao'],
                'detalhes' => $request->input('detalhes'),
                'status' => $validatedData['status'],
                'visibilidade' => $validatedData['visibilidade'],
                'valor_visibilidade' => $validatedData['valor_visibilidade'],
            ]);

            // Se a imagem foi enviada, tenta salvar
            if ($request->hasFile('img_projetos')) {
                foreach ($request->file('img_projetos') as $image) {
                    try {
                        $path = $image->store('img', 'public');
                        FotosProjeto::create([
                            'projeto_id' => $projeto->id,
                            'path' => $path,
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Erro ao salvar imagem', ['error' => $e->getMessage()]);
                        return redirect()->route('admin.projetos.editar', $projeto->id)
                            ->with('error', 'Erro ao fazer upload da imagem!');
                    }
                }
            }

            // Redirecionamento após sucesso
            Log::info('Redirecionando após atualização', ['projeto_id' => $projeto->id]);
            return redirect()->route('admin.projetos.editar', $projeto->id)
                ->with('toast_success', 'Projeto atualizado com sucesso!');

        }
        catch (\Exception $e) {
            Log::error('Erro ao atualizar projeto', ['error' => $e->getMessage()] + ['request' => $validatedData ?? $request->all()]);
            return redirect()->back()->with('toast_error', 'Erro ao atualizar o projeto. Por favor, tente novamente.');
        }
    }

    // DELETAR FOTO DE DENTRO DO EDITAR PROJETO
    public function destroy_foto($id)
    {
        $foto = FotosProjeto::findOrFail($id);
        Storage::delete('public/' . $foto->path); // Excluir o arquivo físico
        $foto->delete(); // Excluir do banco
        return back()->with('toast_success', 'Imagem excluída com sucesso!');
    }

    // DELETAR PROJETO
    public function destroy_projeto($id)
    {
        $projeto = Projetos::findOrFail($id);
        $fotosPaths = FotosProjeto::where('projeto_id', $id)->pluck('path');

        foreach ($fotosPaths as $path) {
            if (Storage::exists('public/' . $path)) {
                Storage::delete('public/' . $path);
            }
        }

        $projeto->delete();
        return back()->with('toast_success', 'Projeto excluído com sucesso!');
    }
}
