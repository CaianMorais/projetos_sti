<?php

namespace App\Http\Controllers;

use App\Jobs\SendProjetoCriadoEmails;
use App\Models\ContatoArmazenado;
use App\Models\Projetos;
use App\Models\FotosProjeto;
use App\Models\ProjetosTranslate;
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
        //$projetos = Projetos::orderBy('id','desc')->paginate(20);
        $projetos = ProjetosTranslate::orderBy('projeto_id','desc')
        ->orderBy('id', 'desc')
        ->paginate(20);
        $contagemProjetos = ProjetosTranslate::count();

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

            $projeto_translate = ProjetosTranslate::create([
                'projeto_id' => $projeto->id,
                'locale' => 'pt_BR',
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
                SendProjetoCriadoEmails::dispatch($projeto_translate, $contatos);

                return redirect()
                    ->route('admin.projetos')
                    ->with('toast_success', 'Projeto criado com sucesso e as notificações estão sendo enviadas!');
            }

            return redirect()
                ->route('admin.projetos')
                ->with('toast_success', 'Projeto criado com sucesso!');

        } catch (\Exception $e) {
            Log::error('Erro ao criar projeto', ['error' => $e->getMessage()] + ['request' => $validatedData ?? $request->all()]);
            return redirect()->back()->with('toast_error', 'Erro ao criar o projeto. Por favor, tente novamente.');
        }
    }

    // EDITAR PROJETO
    public function editar_projeto(Request $request, $id){
        $projeto = ProjetosTranslate::findOrFail($id);
        //$projeto = Projetos::where('id', $projeto_editar->projeto_id)->first();
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

            // $validatedData = $request->validate([
            //     'nome_projeto' => 'required|string|max:255',
            //     'valor_minimo' => 'required|min:0',
            //     'valor_maximo' => 'required|min:0|gte:valor_minimo',
            //     'autor_projeto' => 'required|string|max:255',
            //     'descricao' => 'required|string',
            //     'detalhes' => 'nullable|string',
            //     'status' => 'required|in:AN,PI,CN',
            //     'visibilidade' => 'required|boolean',
            //     'valor_visibilidade' => 'required|boolean',
            //     'img_projetos.*' => 'nullable|image|mimes:jpeg,jpg,png|max:8128', // Validação para as imagens
            // ]);
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
            ]);

            Log::info('Dados validados', ['data' => $validatedData]);

            $projeto = ProjetosTranslate::findOrFail($id);

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
            // if ($request->hasFile('img_projetos')) {
            //     foreach ($request->file('img_projetos') as $image) {
            //         try {
            //             $path = $image->store('img', 'public');
            //             FotosProjeto::create([
            //                 'projeto_id' => $projeto->id,
            //                 'path' => $path,
            //             ]);
            //         } catch (\Exception $e) {
            //             Log::error('Erro ao salvar imagem', ['error' => $e->getMessage()]);
            //             return redirect()->route('admin.projetos.editar', $projeto->id)
            //                 ->with('error', 'Erro ao fazer upload da imagem!');
            //         }
            //     }
            // }

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

    public function editar_fotos_projeto(Request $request, $id){

        // TESTAR A FUNCIONALIDADE DE ATUALIZAR FOTOS DO PROJETO

        $projeto_editar = ProjetosTranslate::findOrFail($id);
        $projeto = Projetos::with('fotos')
        ->where('id', $projeto_editar->projeto_id)
        ->first();
        $projetos_id = ProjetosTranslate::all()->where('projeto_id', $projeto->id);
        return view('admin.editar_fotos_projeto', compact('projeto'))
        ->with('title', "Editar fotos do projeto #{$projeto_editar->id}")
        ->with('projetos_id', $projetos_id)
        ->with('projeto_translate', $projeto_editar)
        ->with('urlBack', 'admin.projetos');
    }

    public function update_fotos_projeto(Request $request, $id)
    {
        try
        {
            $validatedData = $request->validate([
                'img_projetos.*' => 'nullable|image|mimes:jpeg,jpg,png|max:8128', // Validação para as imagens
            ]);

            Log::info('Dados validados', ['data' => $validatedData]);

            $projeto = Projetos::findOrFail($id);

            if (!$projeto) {
                Log::error('Projeto não encontrado', ['projeto_id' => $id]);
                return redirect()->route('admin.projetos.index')->with('error', 'Projeto não encontrado!');
            }

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
            return redirect()->route('admin.projetos.fotos', $projeto->id)
                ->with('toast_success', 'Imagens do projeto atualizado com sucesso!');

        }
        catch (\Exception $e) {
            Log::error('Erro ao atualizar imagens do projeto', ['error' => $e->getMessage()] + ['request' => $validatedData ?? $request->all()]);
            return redirect()->back()->with('toast_error', 'Erro ao atualizar o projeto. Por favor, tente novamente.');
        }
    }

    public function definir_capa_projeto($id, $projeto_id, $projeto_translated_id){
        try{
            $fotos_projeto = FotosProjeto::where('projeto_id', $projeto_id)->get();
            foreach($fotos_projeto as $foto)
                if ($foto->capa){
                    $foto->capa = false;
                    $foto->saveOrFail();
                    break;
                }
            $nova_capa = FotosProjeto::where('id', $id)->first();
            if(!$nova_capa->capa){
                $nova_capa->capa = true;
                $nova_capa->saveOrFail();
            }
            return redirect()->route('admin.projetos.fotos', $projeto_translated_id)
                    ->with('toast_success', 'Capa definida com sucesso');
        }
        catch (\Exception $e) {
            Log::error('Erro ao atualizar a capa', ['error' => $e->getMessage()]);
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
        $projeto_translated = ProjetosTranslate::findOrFail($id);
        $projeto_translated->delete();

        $count_projetos = ProjetosTranslate::where('projeto_id', $projeto_translated->projeto_id)->count();
        if ($count_projetos == 0){
            $projeto = Projetos::where('id', $projeto_translated->projeto_id)->firstOrFail();
            $fotosPaths = FotosProjeto::where('projeto_id', $projeto_translated->projeto_id)->pluck('path');

            foreach ($fotosPaths as $path) {
                if (Storage::exists('public/' . $path)) {
                    Storage::delete('public/' . $path);
                }
            }
            $projeto->delete();
        }
        
        return back()->with('toast_success', 'Projeto excluído com sucesso!');
    }

    // DUPLICAR PROJETO EM OUTRO IDIOMA

    public function form_duplicate_projeto($id) {
        $projeto = ProjetosTranslate::findOrFail($id);
        return view('admin.duplicar_projeto')
        ->with('projeto', $projeto)
        ->with('title', 'Duplicar um projeto')
        ->with('urlBack', 'admin.projetos');
    }

    public function duplicate_projeto(Request $request, $id)
    {
        try{
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
                ]);

            $projeto = ProjetosTranslate::findOrFail($id);
            $projetos_duplicados = ProjetosTranslate::all()->where(
                'projeto_id', $projeto->projeto_id);

            if($projeto->locale == $request->input('locale'))
            {
                return back()->with('toast_error', 'O projeto já existe no idioma selecionado!');
            }
            else
            {
                foreach ($projetos_duplicados as $projeto_d){
                    if ($projeto_d->locale == $request->input('locale')){
                        return back()->with('toast_error', 'O projeto já existe no idioma selecionado!');
                    }
                }
            }
            
            ProjetosTranslate::create([
                'projeto_id' => $projeto->projeto_id,
                'locale' => $request->input('locale'),
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
            return redirect()
                ->route('admin.projetos')
                ->with('toast_success', 'Projeto duplicado com sucesso!');
        }
        catch (\Exception $e) {
            Log::error('Erro ao duplicar projeto', ['error' => $e->getMessage()] + ['request' => $validatedData ?? $request->all()]);
            return redirect()->back()->with('toast_error', 'Erro ao duplicar o projeto. Por favor, tente novamente.');
        }
    }
}
