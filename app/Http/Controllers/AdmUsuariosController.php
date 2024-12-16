<?php

namespace App\Http\Controllers;

use App\Models\Perfis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AdmUsuariosController extends Controller
{
    public function usuarios()
    {
        $usuarios = User::orderBy('id', 'desc')->get();

        return view('admin.usuarios')
            ->with('usuarios', $usuarios)
            ->with('title', 'Usuários cadastrados')
            ->with('urlBack', 'admin.menu');
    }
    public function sendResetLink($id)
    {
        // Busca o usuário pelo ID
        $user = User::findOrFail($id);

        // Envia o link de redefinição de senha
        $status = Password::sendResetLink(['email' => $user->email]);

        // Verifica se o link foi enviado com sucesso
        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->back()->with('toast_success', 'Link de redefinição enviado para ' . $user->email);
        } else {
            return redirect()->back()->with('toast_error', 'Erro ao enviar o link de redefinição');
        }
    }

    public function criar()
    {
        $perfis = Perfis::all();
        return view('admin.criar_usuario')
            ->with('title', 'Criar novo usuário')
            ->with('urlBack', 'admin.usuarios')
            ->with('perfis', $perfis);
    }

    public function store(Request $request)
    {
        $usuarioExistente = User::where('name', $request->name)
        ->orWhere('email', $request->email)
        ->first();

        if ($usuarioExistente)
        {
            return redirect()->back()
            ->with('toast_error','Já existe um usuário com esse nome ou e-mail')
            ->withInput();
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'perfil' => 'required|exists:perfis,id',
        ]);

        $user = User::create([
            'name'=> $validatedData['name'],
            'email'=> $validatedData['email'],
            'perfil_id' => $validatedData['perfil'],
            'password' => bcrypt(Str::random(10)),
        ]);

        Password::sendResetLink(['email'=> $user->email]);

        return redirect()->route('admin.usuarios')
            ->with('toast_success',"Usuário criado com sucesso! Um-email foi enviado para {$user->email} para configurar a senha.");
    }
    public function editar($id)
    {
        $user = User::findOrFail($id);
        $perfis = Perfis::all();
        return view("admin.editar_usuario", compact("user"))
            ->with('title', "Editar o usuário #{$user->id}")
            ->with("urlBack","admin.usuarios")
            ->with('perfis', $perfis);;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'perfil' => 'required|exists:perfis,id',
        ]);

        $usuarioExistente = User::where('id', '!=', $id)
        ->where(function ($query) use ($validatedData) {
            $query->where('name', $validatedData['name'])
                  ->orWhere('email', $validatedData['email']);
        })
        ->exists();

        if ($usuarioExistente) {
            return redirect()->back()
                ->with('toast_error', 'Já existe outro usuário com o mesmo nome ou e-mail, impossível atualizar.')
                ->withInput();
        }

        $user = User::findOrFail($id);


        $user->update([
            'name'=> $validatedData['name'],
            'email'=> $validatedData['email'],
            'perfil_id' => $validatedData['perfil'],
        ]);

        return redirect()->route('admin.usuarios')
            ->with('toast_success',"Usuário atualizado com sucesso!");
    }
}
