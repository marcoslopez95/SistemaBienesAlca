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
        Schema::create('tab_usuari', function (Blueprint $table) {
            $table->increments('codigo_usu')->comment('id del usuario');
            $table->string('cedula_usu',30)->comment('cedula del usuario');
            $table->string('nombre_usu',30)->comment('nombre del usuario');
            $table->string('apelli_usu',30)->comment('apellido del usuario');
            $table->string('telefo_usu',30)->comment('telefono del usuario');
            $table->string('correo_usu',30)->comment('correo del usuario');
            $table->string('direcc_usu',30)->comment('dirección del usuario');
            $table->string('clave_usu',30)->comment('clave del usuario');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_usuari');
    }
};
