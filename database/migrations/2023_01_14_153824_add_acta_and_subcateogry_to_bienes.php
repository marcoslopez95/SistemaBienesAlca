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
        Schema::table('tab_bienes', function (Blueprint $table) {
            $table->dropForeign(['codigo_cat']);
        });
        Schema::table('tab_bienes', function (Blueprint $table) {
            $table->integer('codigo_subcat')->unsigned()->comment('Codigo de la sub categoria');
            $table->foreign('codigo_subcat')
                ->references('codigo_subcat')
                ->on('tab_subcat')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->string('acta_bien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_bienes', function (Blueprint $table) {
            //
        });
    }
};