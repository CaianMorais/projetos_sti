<?php

namespace App\Http\Controllers;

use App\Models\Perfis;
use Illuminate\Http\Request;

class AdmPerfisController extends Controller
{
    public function perfis()
    {
        $perfis = Perfis::all();
        return view("admin.perfis", compact("perfis"));
    }
}
