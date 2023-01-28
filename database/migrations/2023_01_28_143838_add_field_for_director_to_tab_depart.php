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
        Schema::table('tab_depart', function (Blueprint $table) {
            $table->string('cedula_dire')->nullable()->comment('foranea: cedula del director');
            $table->foreign('cedula_dire')
                ->references('cedula_dire')
                ->on('tab_direc')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_depart', function (Blueprint $table) {
            $table->dropForeign(['cedula_dire']);
            $table->dropColumn('cedula_dire');
        });
    }
};
