<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function equipe()
    {
        $equipe = Equipe::orderBy('nome', 'asc')->get();

        return view('main.equipe.equipe', compact('equipe'));
    }
}
