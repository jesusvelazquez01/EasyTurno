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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sala_informatica_id'); // FK
    
            $table->integer('nro_turno');
            $table->string('profesor');
            $table->string('carrera');
            $table->integer('alumnos');
            $table->time('entrada');
            $table->time('salida');
            $table->date('fecha');
    
            $table->timestamps();
    
            // Clave foránea hace refenrencia a la tabla de asala de informatica
            $table->foreign('sala_informatica_id')
                  ->references('id')->on('sala_informaticas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
