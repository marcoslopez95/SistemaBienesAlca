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
        Schema::table('tab_usuari', function (Blueprint $table) {
            $table->dropColumn('clave_usu');
        });
        Schema::table('tab_usuari', function (Blueprint $table) {
            $table->string('clave_usu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_usuari', function (Blueprint $table) {
            //
        });
    }
};
