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
        Schema::create('tab_tipous', function (Blueprint $table) {
            $table->increments('codigo_tus')->comment('codigo de tipo de usuario');
            $table->string('nombre_tus')->comment('nombre del tipo de usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_tipous');
    }
};
