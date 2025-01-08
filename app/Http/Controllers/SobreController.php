<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreController extends Controller
{
    public function sobre()
    {
        return view('main.quem_somos.quem_somos');
    }
}
