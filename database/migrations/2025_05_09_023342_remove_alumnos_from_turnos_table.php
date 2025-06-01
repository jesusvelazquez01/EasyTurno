<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->dropColumn('alumnos'); // Eliminamos la columna
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->integer('alumnos')->nullable(); // Si querés que vuelva al hacer rollback
        });
    }
};
