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
        //
        Schema::create('Utilizador_UnidadeCurricular', function (Blueprint $table) {
            $table->unsignedBigInteger('numeroFuncionario');
            $table->integer('codigoUC');
            $table->string('percentagem');
            $table->foreign('codigoUC')->references('codigo')->on('UnidadeCurricular');
            $table->foreign('numeroFuncionario')->references('numeroFuncionario')->on('users');
            $table->primary(['codigoUC', 'numeroFuncionario']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Utilizador_UnidadeCurricular');
    }
};
