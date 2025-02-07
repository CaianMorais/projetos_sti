<?php

namespace App\Http\Controllers;

use App\Models\Equipe;

class EquipeController extends Controller
{
    public function equipe()
    {
        $equipe = Equipe::orderBy('nome', 'asc')->get();

        return view('main.equipe.equipe', compact('equipe'));
    }
    
    public function json_equipe($id)
    {
        $equipe = Equipe::findOrFail($id);

        return response()->json($equipe);
    }
}
