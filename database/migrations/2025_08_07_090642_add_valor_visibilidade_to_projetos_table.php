<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValorVisibilidadeToProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projetos', function (Blueprint $table) {
            $table->boolean('valor_visibilidade')->default(0)->after('visibilidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projetos', function (Blueprint $table) {
            $table->dropColumn('valor_visibilidade');
        });
    }
}
