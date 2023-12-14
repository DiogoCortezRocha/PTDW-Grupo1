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
        Schema::create('Sala_UnidadeCurricular', function (Blueprint $table) {
            $table->string('numeroSala');
            $table->integer('codigoUC');
            $table->foreign('numeroSala')->references('numero')->on('Sala');
            $table->foreign('codigoUC')->references('codigo')->on('UnidadeCurricular');
            $table->primary(['numeroSala', 'codigoUC']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Sala_UnidadeCurricular');
    }
};
