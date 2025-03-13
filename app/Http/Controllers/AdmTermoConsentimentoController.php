<?php

namespace App\Http\Controllers;

use App\Models\TermoConsentimento;
use Illuminate\Http\Request;

class AdmTermoConsentimentoController extends Controller
{
    public function termo()
    {
        return view('admin.termo_consentimento')
            ->with('termo', TermoConsentimento::first())
            ->with('title', 'Termo de consentimento')
            ->with('urlBack', 'admin.menu');
    }

    public function editar_termo()
    {
        return view('admin.editar_termo')
            ->with('termo', TermoConsentimento::first())
            ->with('title', 'Editar termo de consentimento')
            ->with('urlBack', 'admin.termo');
    }

    public function update(Request $request)
    {
        $termo = TermoConsentimento::first();

        $termo->titulo_termo = 'Termo de consentimento';
        $termo->termo = $request->termo;
        $termo->data_vigor = now();
        $termo->save();

        return redirect()->route('admin.termo');
    }
}
