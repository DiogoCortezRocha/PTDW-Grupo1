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
        Schema::create('curso_unidade_curricular', function (Blueprint $table) {
            $table->integer('codigocurso');
            $table->integer('codigoUc');
            $table->foreign('codigoUC')->references('codigo')->on('UnidadeCurricular');
            $table->foreign('codigocurso')->references('codigo')->on('curso');
            $table->primary(['codigoUC', 'codigocurso']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('curso_unidade_curricular');
    }
};
