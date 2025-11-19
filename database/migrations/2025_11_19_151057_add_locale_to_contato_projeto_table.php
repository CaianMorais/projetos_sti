<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocaleToContatoProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contato_projeto', function (Blueprint $table) {
            $table->string('locale')->default('pt_BR')->after('projeto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contato_projeto', function (Blueprint $table) {
            $table->dropColumn('locale');
        });
    }
}
