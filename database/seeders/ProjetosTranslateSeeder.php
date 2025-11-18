<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projetos;
use App\Models\ProjetosTranslate;

class ProjetosTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projetos = Projetos::all();

        foreach($projetos as $projeto) {
            ProjetosTranslate::create([
                'projeto_id' => $projeto->id,
                'locale' => 'pt_BR',
                'nome_projeto' => $projeto->nome_projeto,
                'valor_minimo' => $projeto->valor_minimo,
                'valor_maximo' => $projeto->valor_maximo,
                'autor_projeto' => $projeto->autor_projeto,
                'descricao' => $projeto->descricao,
                'detalhes' => $projeto->detalhes,
                'status' => $projeto->status,
                'visibilidade' => $projeto->visibilidade,
                'valor_visibilidade' => $projeto->valor_visibilidade,
            ]);
        }
    }
}
