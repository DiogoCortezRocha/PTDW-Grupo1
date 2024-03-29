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
        Schema::create('observacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('numeroFuncionario');
            $table->text('obsDocente')->nullable();
            $table->text('obsComissaoHorarios')->nullable();
            $table->timestamps();
            $table->foreign('numeroFuncionario')->references('numeroFuncionario')->on('users')->onDelete('cascade');
            $table->primary(['numeroFuncionario']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observacoes');
    }
};
