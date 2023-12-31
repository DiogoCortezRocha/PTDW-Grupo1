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
        Schema::create('UnidadeCurricular', function (Blueprint $table) {
            $table->integer('codigo');
            $table->string('name');
            $table->string('acn');
            $table->integer('horas');
            $table->boolean('LaboratorioObrigatorio')->nullable();
            $table->boolean('LaboratorioPreferencial')->nullable();
            $table->string('software')->nullable();
            $table->string('salaAvaliacao')->nullable();
            $table->primary('codigo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('UnidadeCurricular');
    }
};
