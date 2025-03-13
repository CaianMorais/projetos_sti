<?php

namespace App\Http\Controllers;

use App\Models\TermoConsentimento;
use Illuminate\Http\Request;

class TermoConsentimentoController extends Controller
{
    public function termo()
    {
        return view('main.termo_consentimento.termo_consentimento')
        ->with('termo', TermoConsentimento::first());
    }
}
