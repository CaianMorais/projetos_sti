<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameInstagramToLattesInEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipe', function (Blueprint $table) {
            $table->renameColumn('instagram', 'lattes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipe', function (Blueprint $table) {
            $table->renameColumn('lattes', 'instagram');
        });
    }
}
