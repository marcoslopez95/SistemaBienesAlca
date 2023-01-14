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
        Schema::create('tab_subcat', function (Blueprint $table) {
            $table->increments('codigo_subcat')->comment('codigo de la subcategoria');
            $table->string('nombre_subcat')->comment('nombre de la subcategoria');
            $table->string('descri_subcat')->comment('descripción de la subcategoria');

            $table->integer('codigo_cat')->unsigned()->comment('codigo de la categoria');

            $table->foreign('codigo_cat')
                    ->references('codigo_cat')
                    ->on('tab_catego')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_subcat');
    }
};
