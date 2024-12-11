<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use App\Models\FotosProjeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        ->with('title', 'Publicar um projeto');
    }

    public function store(Request $request)
    {

        Log::info('Tem arquivo?', ['hasFile' => $request->hasFile('img_projetos')]);
        Log::info('Arquivo recebido:', ['img_projetos' => $request->file('img_projetos')]);

        // Converter valores numéricos para o formato correto
        $request->merge([
            'valor_minimo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_minimo)),
            'valor_maximo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_maximo)),
        ]);
        
        // Validação
        $validatedData = $request->validate([
            'nome_projeto' => 'required|string|max:255',
            'valor_minimo' => 'required|min:0',
            'valor_maximo' => 'required|min:0|gte:valor_minimo',
            'autor_projeto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'detalhes' => 'nullable|string',
            'status' => 'required|in:AN,PI,CN',
            'img_projetos.*' => 'nullable|image|mimes:jpeg,jpg,png|max:8128', // Cada imagem deve seguir os requisitos
        ]);

        // Salvar projeto
        $projeto = Projetos::create([
            'nome_projeto' => $validatedData['nome_projeto'],
            'valor_minimo' => $validatedData['valor_minimo'],
            'valor_maximo' => $validatedData['valor_maximo'],
            'autor_projeto' => $validatedData['autor_projeto'],
            'descricao' => $validatedData['descricao'],
            'detalhes' => $request->input('detalhes'),
            'status' => $validatedData['status'],
        ]);

        // Salvar imagens, se houver
        if ($request->hasFile('img_projetos')) {
            foreach ($request->file('img_projetos') as $image) {
                // Logando informações sobre o arquivo
                Log::info('Imagem recebida:', ['name' => $image->getClientOriginalName(), 'mime' => $image->getClientMimeType()]);
        
                $path = $image->store('img', 'public');
                
                // Logando caminho da imagem salva
                Log::info('Imagem salva no caminho:', ['path' => $path]);
        
                FotosProjeto::create([
                    'projeto_id' => $projeto->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('toast_success', 'Projeto criado com sucesso!');
    }

    public function editar_projeto(Request $request, $id){
        $projeto = Projetos::with('fotos')->findOrFail($id);
        return view('admin.editar_projeto', compact('projeto'))
        ->with('title', "Editar o projeto #{$projeto->id}");
    }

    public function update_projeto(Request $request, $id)
    {
        Log::info('Iniciando atualização do projeto', ['projeto_id' => $id]);

        // Acessa os arquivos enviados no campo 'img_projetos'
        if ($request->hasFile('img_projetos')) {
            foreach ($request->file('img_projetos') as $image) {
                Log::info('Imagem recebida no request', [
                    'original_name' => $image->getClientOriginalName(),
                    'mime_type' => $image->getMimeType(),
                    'size' => $image->getSize()
                ]);
            }
        } else {
            Log::info('Nenhuma imagem enviada');
        }
        // Preenche o valor de minimo e maximo corretamente
        $request->merge([
            'valor_minimo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_minimo)),
            'valor_maximo' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->valor_maximo)),
        ]);

        $validatedData = $request->validate([
            'nome_projeto' => 'required|string|max:255',
            'valor_minimo' => 'required|min:0',
            'valor_maximo' => 'required|min:0|gte:valor_minimo',
            'autor_projeto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'detalhes' => 'nullable|string',
            'status' => 'required|in:AN,PI,CN',
            'img_projetos.*' => 'nullable|image|mimes:jpeg,jpg,png|max:8128', // Validação para as imagens
        ]);

        // Verificando os dados validados
        Log::info('Dados validados', ['data' => $validatedData]);

        $projeto = Projetos::findOrFail($id);

        if (!$projeto) {
            Log::error('Projeto não encontrado', ['projeto_id' => $id]);
            return redirect()->route('admin.projetos.index')->with('error', 'Projeto não encontrado!');
        }

        // Log antes de atualizar
        Log::info('Atualizando projeto', ['projeto_id' => $id, 'dados' => $request->all()]);

        // Atualizando o projeto
        $projeto->update([
            'nome_projeto' => $validatedData['nome_projeto'],
            'valor_minimo' => $validatedData['valor_minimo'],
            'valor_maximo' => $validatedData['valor_maximo'],
            'autor_projeto' => $validatedData['autor_projeto'],
            'descricao' => $validatedData['descricao'],
            'detalhes' => $request->input('detalhes'),
            'status' => $validatedData['status'],
        ]);

        // Log após atualização
        Log::info('Projeto atualizado com sucesso', ['projeto_id' => $projeto->id]);

        // Se a imagem foi enviada, tenta salvar
        if ($request->hasFile('img_projetos')) {
            foreach ($request->file('img_projetos') as $image) {
                try {
                    $path = $image->store('img', 'public');
                    FotosProjeto::create([
                        'projeto_id' => $projeto->id,
                        'path' => $path,
                    ]);
                    Log::info('Imagem adicionada ao projeto', ['projeto_id' => $projeto->id, 'path' => $path]);
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



    public function destroy_foto($id)
    {
        $foto = FotosProjeto::findOrFail($id);
        Storage::delete('public/' . $foto->path); // Excluir o arquivo físico
        $foto->delete(); // Excluir do banco
        return back()->with('toast_success', 'Imagem excluída com sucesso!');
    }
}
