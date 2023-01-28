<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_direc', function (Blueprint $table) {
            $table->string('cedula_dire')->primary()->comment('cedula del directos');
            $table->string('nombre_dire')->comment('nombres del director');
            $table->string('apelli_dire')->comment('apellidos del director');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_direc');
    }
};
