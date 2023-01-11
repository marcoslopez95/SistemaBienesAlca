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
        Schema::create('tab_catego', function (Blueprint $table) {
            $table->increments('codigo_cat')->comment('codigo de la categoria');
            $table->string('nombre_cat')->comment('nombre de la categoria');
            $table->string('descri_cat')->comment('descripción de la categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_catego');
    }
};
