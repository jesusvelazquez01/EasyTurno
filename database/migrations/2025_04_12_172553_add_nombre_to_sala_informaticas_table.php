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
        Schema::table('sala_informaticas', function (Blueprint $table) {
            $table->string('nombre')->after('id');
        });
    }
    
    public function down()
    {
        Schema::table('sala_informaticas', function (Blueprint $table) {
            $table->dropColumn('nombre');
        });
    }
    
};
