<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmEquipeController extends Controller
{
    public function equipe(){
        $equipe = Equipe::orderBy("nome", "asc")->get();

        return view("admin.equipe")
        ->with("equipe", $equipe)
        ->with("title", 'Equipe');
    }

    public function criar(){
        return view("admin.criar_equipe")
        ->with('urlBack', 'admin.equipe')
        ->with("title", 'Cadastrar membro na equipe');
    }

    public function store(Request $request){

        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'telefone' => 'nullable|string|max:15',
                'bio' => 'required|max:100',
                'linkedin' => 'nullable|string',
                'instagram' => 'nullable|string',
                'descricao' => 'required|string',
                'path_foto' => 'required|image|mimes:jpeg,jpg,png|max:8128',
            ]);

            Equipe::create([
                'nome' => $validatedData['nome'],
                'telefone' => $validatedData['telefone'],
                'bio' => $validatedData['bio'],
                'linkedin' => $validatedData['linkedin'],
                'instagram' => $validatedData['instagram'],
                'descricao' => $validatedData['descricao'],
                'path_foto' => $validatedData['path_foto']->store('img', 'public'),
            ]);
            return redirect()->back()->with('toast_success','Membro da equipe cadastrado');
        } catch (Exception $e) {
            $error = "Alguma regra do formulário foi violada: {$e->getMessage()}";
            return redirect()->back()->with('toast_error', $error);
        }
    }

    public function editar($id){
        $membro = Equipe::findOrFail($id);

        return view('admin.editar_equipe', compact('membro'))
        ->with('urlBack', 'admin.equipe')
        ->with('title', "Editar membro da equipe #{$membro->id}");
    }

    public function update(Request $request, $id){
        try {
            $membro = Equipe::findOrFail($id);

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'telefone' => 'nullable|string|max:15',
                'bio' => 'required|max:100',
                'linkedin' => 'nullable|string',
                'instagram' => 'nullable|string',
                'descricao' => 'required|string',
                'path_foto' => 'image|mimes:jpeg,jpg,png|max:8128',
            ]);

            if ($request->hasFile('path_foto')) {
                if ($membro->path_foto && Storage::exists('public/' . $membro->path_foto)) {
                    Storage::delete('public/' . $membro->path_foto);
                }
    
                $validatedData['path_foto'] = $request->file('path_foto')->store('img', 'public');
            } else {
                unset($validatedData['path_foto']);
            }

            $membro->update($validatedData);
            return redirect()->back()->with('toast_success','As informações do membro da equipe foram atualizadas');
        } catch (Exception $e) {
            $error = "Alguma regra do formulário foi violada: {$e->getMessage()}";
            return redirect()->back()->with('toast_error', $error);
        }
    }

    public function destroy($id){
        try{
            $membro = Equipe::findOrFail($id);
            if (Storage::exists('public/' . $membro->path_foto))
            {
                Storage::delete('public/'. $membro->path_foto);
            }
            $membro->delete();
            return redirect()->back()->with('toast_success','O membro foi deletado da equipe.');

        }catch (Exception $e) {
            $error = "Erro ao deletar: {$e->getMessage()}";
            return redirect()->back()->with('toast_error', $error);
        }
    }
}
