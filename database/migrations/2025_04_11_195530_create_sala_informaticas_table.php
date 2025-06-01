<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sala_informaticas', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');
            $table->string('equipos'); // o integer si es solo número de equipos
            $table->string('disponibilidad'); // o boolean si querés solo sí/no
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sala_informaticas');
    }
};
