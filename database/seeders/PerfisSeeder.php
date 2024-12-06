<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfis')->insert([
            ['nome_perfil' => 'Usuário'],
            ['nome_perfil' => 'Admin'],
            ['nome_perfil' => 'Super-Admin'],
        ]);
    }
}
