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
        Schema::create('tab_bienes', function (Blueprint $table) {
            $table->increments('id_bien')->comment('id del bien e inmueble');
            $table->string('codigo_bien')->comment('codigo del bien e inmueble');
            $table->string('nombre_bien')->comment('nombre del bien e inmueble');
            $table->string('satus_bien')->comment('satus del bien e inmueble');
            $table->string('foto_bien')->comment('foto del bien e inmueble');
            $table->dateTime('fecha_bien')->comment('fecha del bien e inmueble');

            // foreings
            $table->integer('codigo_cat')->unsigned()->comment('codigo de la categoria del bien');
            $table->integer('codigo_usu')->unsigned()->comment('codigo de usuario del bien');
            $table->integer('codigo_dep')->unsigned()->comment('codigo del departamento del bien');

            $table->foreign('codigo_cat')
                    ->references('codigo_cat')
                    ->on('tab_catego')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            $table->foreign('codigo_usu')
                    ->references('codigo_usu')
                    ->on('tab_usuari')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            $table->foreign('codigo_dep')
                    ->references('codigo_dep')
                    ->on('tab_depart')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_bienes');
    }
};
