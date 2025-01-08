<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapdaController extends Controller
{
    public function capda()
    {
        return view('main.capda.capda');
    }
}
