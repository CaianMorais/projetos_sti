<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos_translate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projeto_id')
                ->constrained('projetos')
                ->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('nome_projeto');
            $table->decimal('valor_minimo', 15, 2);
            $table->decimal('valor_maximo', 15, 2);
            $table->string('autor_projeto');
            $table->string('descricao');
            $table->longText('detalhes');
            $table->string('status');
            $table->boolean('visibilidade')->default(0);
            $table->boolean('valor_visibilidade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos_translate');
    }
}
