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
        Schema::create('Restricao', function (Blueprint $table) {
            $table->unsignedBigInteger('numeroFuncionario');
            $table->unsignedBigInteger('idBloco');
            $table->foreign('numeroFuncionario')->references('numeroFuncionario')->on('users');
            $table->foreign('idBloco')->references('id')->on('Bloco');
            $table->primary(['numeroFuncionario', 'idBloco']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Restricao');
    }
};
